<?php



namespace App\Http\Controllers;

use App\Models\appointments;
use App\Models\departments;
use App\Models\doctors;
use App\Models\userInitialAppoinmentModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Session;



class appointmentController extends Controller
{
    function appointmentPage()
    {
        $allUserInitialAppInfo = userInitialAppoinmentModel::all();
        $alldoctorInfo = doctors::all();
        $alldepartmentInfo = departments::all();
        $totalFees = userInitialAppoinmentModel::where("Fees", "!=", null)->sum("Fees");
        return view("apppointmentPage", [
            'alldoctorInfo' => $alldoctorInfo,
            'alldepartmentInfo' => $alldepartmentInfo,
            'allUserInitialAppInfo' => $allUserInitialAppInfo,
            'totalFees' => $totalFees,
        ]);
    }


    function appointmentPageDepartInfo(Request $req)
    {

        $option =  '<option value="">--Select--</option>';

        $allDoctorinfo = doctors::where("department_id", $req->department_id)->get();


        foreach ($allDoctorinfo as $Doctorinfo) {
            $option .= '<option value="' . $Doctorinfo->id . '">' . $Doctorinfo->name . '</option>';
        }

        echo $option;
    }

    function doctor_satusInfo(Request $req)
    {



        $DoctorStatusinfo = doctors::where("id", $req->doctor_info)->first()->status;




        echo $DoctorStatusinfo;
    }

    function doctor_PaysInfo(Request $req)
    {



        $doctor_PaysInfo = doctors::where("id", $req->doctor_info)->first()->fee;



        echo $doctor_PaysInfo;
    }






    function appoimentVerfication(Request $req)
    {





        userInitialAppoinmentModel::insert([

            'App_date' => $req->appointDate,

            'Doctor' => $req->doctor,
            'Fees' => $req->doctorFess,
            'created_at' => Carbon::now(),





        ]);

        return back();
    }

    function userInitialAppDelete($id)
    {
        userInitialAppoinmentModel::find($id)->delete();

        return back();
    }



    function finalSubmission(Request $req)
    {

        if ($req->totalFee == 0 && ($req->totalFee < $req->paidAmount)) {
            return back()->with("Failed", "Please, You did not booked any appoinment or You have to paid full amount");
        } else {

            $req->validate([

                'hiddenAppDate' => "required",
                'hiddenDoctorId' => "required",
                'patientName' => "required",
                'patientNum' => "required",
                'totalFee' => "required",
                'paidAmount' => "required",

            ]);

            appointments::insert([

                'appointment_no' => rand(),
                'appointment_date' => $req->hiddenAppDate,
                'doctor_id' => $req->hiddenDoctorId,
                'patient_name' => $req->patientName,
                'patient_phone' => $req->patientNum,
                'total_fee' => $req->totalFee,
                'paid_amount' => $req->paidAmount,
                'created_at' => Carbon::now(),

            ]);

            return back()->with("success", "You booked your doctor appointment successfully");
        }
    }
}

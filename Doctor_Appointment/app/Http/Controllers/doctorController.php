<?php

namespace App\Http\Controllers;

use App\Models\doctors;
use Illuminate\Http\Request;

class doctorController extends Controller
{
    function doctorPage(){
        $alldoctorInfo = doctors::latest()->get();
        return view("doctorPage",[
            'alldoctorInfo' => $alldoctorInfo,
        ]);
    }

    function doctorStatus(Request $req)
    {

        $explode_part = explode(",", $req->stutusButton);



        doctors::where("id", $explode_part[0])->update([
            'status' => $explode_part[1],
        ]);

        return back()->with('updateSuccess', "update success!!");
    }


    function doctorDelete($id){

        doctors::find($id)->delete();
        return back();

    }  
    
    
    function doctorEdit($id){

       $allDoctorInfo =  doctors::where("id",$id)->get();

        return view("doctorEditPage",[
            'allDoctorInfo' => $allDoctorInfo
        ]);

        

    }

    function doctorUpdate(Request $req){
        doctors::find($req->doctor_id)->update([
            'name' => $req->name,
            'phone' => $req->phone,
            'fee' => $req->fees,
        ]);

        return back();
    }
}

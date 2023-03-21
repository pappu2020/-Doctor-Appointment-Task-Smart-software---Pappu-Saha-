<?php

namespace App\Http\Controllers;

use App\Models\doctors;
use Illuminate\Http\Request;

class doctorController extends Controller
{
    function doctorPage(){
        $alldoctorInfo = doctors::all();
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
}

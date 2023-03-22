<?php

namespace App\Http\Controllers;

use App\Models\appointments;
use App\Models\finalAppointment;
use Illuminate\Http\Request;

class homeController extends Controller
{
    function homePage(){
        $allAppointment = finalAppointment::latest()->get();
        return view("homePage",[
            'allAppointment' => $allAppointment,
        ]);
    }
}

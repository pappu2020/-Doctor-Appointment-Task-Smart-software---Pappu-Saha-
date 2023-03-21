<?php

namespace App\Http\Controllers;

use App\Models\appointments;
use Illuminate\Http\Request;

class homeController extends Controller
{
    function homePage(){
        $allAppointment = appointments::latest()->get();
        return view("homePage",[
            'allAppointment' => $allAppointment,
        ]);
    }
}

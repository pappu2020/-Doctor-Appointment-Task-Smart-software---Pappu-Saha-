<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class finalAppointment extends Model
{
    protected $guarded = ["id"];
    function rel_to_doctor()
    {
        return $this->belongsTo(doctors::class, "doctor_id");
    }
    use HasFactory;
}

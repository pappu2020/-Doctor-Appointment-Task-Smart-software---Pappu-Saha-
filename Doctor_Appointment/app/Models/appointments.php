<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class appointments extends Model
{
    use HasFactory;
    protected $guarded = ["id"];
    function rel_to_doctor()
    {
        return $this->belongsTo(doctors::class, "doctor_id");
    }

}

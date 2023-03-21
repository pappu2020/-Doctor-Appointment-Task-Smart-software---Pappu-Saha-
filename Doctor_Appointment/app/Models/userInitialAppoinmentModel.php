<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class userInitialAppoinmentModel extends Model
{
    use HasFactory;
    function rel_to_doctor()
    {
        return $this->belongsTo(doctors::class, "Doctor");
    }
}

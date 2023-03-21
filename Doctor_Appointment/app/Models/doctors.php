<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class doctors extends Model
{
    use HasFactory;
    protected $guarded = ["id"];
    function rel_to_department(){
        return $this->belongsTo(departments::class, "department_id");
    }
}

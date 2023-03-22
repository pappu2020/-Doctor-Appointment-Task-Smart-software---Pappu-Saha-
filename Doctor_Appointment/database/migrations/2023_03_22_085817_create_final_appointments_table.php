<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('final_appointments', function (Blueprint $table) {
            $table->id();
            $table->integer("appointment_no");
            $table->date("appointment_date");
            $table->integer("doctor_id");
            $table->string("patient_name")->nullable();
            $table->string("patient_phone")->nullable();
            $table->integer("total_fee")->nullable();
            $table->integer("paid_amount")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('final_appointments');
    }
};

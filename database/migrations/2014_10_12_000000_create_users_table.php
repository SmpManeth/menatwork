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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('whatsapp_number');
            $table->string('photo_path')->nullable();
            $table->string('passport_copy_path')->nullable();
            $table->string('police_report_path')->nullable();
            $table->string('employee_agreement')->nullable();
            $table->string('tc')->nullable();
            $table->string('visa_proof')->nullable();
            $table->string('cv_path')->nullable();
            $table->string('email')->unique();
            $table->string('user_type')->nullable();
            $table->string('status')->nullable();
            $table->string('workpormit')->nullable();
            $table->string('employee_agreement_user')->nullable();
            $table->string('termsandcondition_user')->nullable();
            $table->string('date')->nullable()->default('00/00/0000');
            $table->string('time')->nullable()->default('00:00 AM');
            $table->string('sc')->nullable();
            $table->string('offerletter')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};

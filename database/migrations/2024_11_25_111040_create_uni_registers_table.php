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
        Schema::create('uni_registers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained()->onDelete('cascade');
            $table->string('current_attendance_year')->nullable();
            $table->integer('year_of_attendance');
            $table->string('major')->nullable();
            $table->string('get_university')->nullable();
            $table->string('current_desk_symbol')->nullable();
            $table->integer('current_desk_no')->nullable();
            $table->boolean('assignment_a')->default(false);
            $table->boolean('assignment_b')->default(false);
            $table->boolean('is_win')->nullable();
            $table->text('remark')->nullable();
            $table->boolean('draft')->default(true);
            $table->unsignedInteger('created_by')->nullable();
            $table->unsignedInteger('updated_by')->nullable();
            $table->unsignedInteger('deleted_by')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('uni_registers');
    }
};

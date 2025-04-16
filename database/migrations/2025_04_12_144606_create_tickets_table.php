<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['sales', 'enquire', 'maintenance']);
            $table->string('customer_name');
            $table->string('customer_mobile');
            $table->string('customer_address');
            $table->unsignedBigInteger(column: 'employee_id')->nullable()->default(null);
            $table->unsignedBigInteger('created_by');
            $table->string('note');
            $table->dateTime('closed_at')->nullable()->default(null);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};

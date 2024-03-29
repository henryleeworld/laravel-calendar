<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->datetime('start_time')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
};

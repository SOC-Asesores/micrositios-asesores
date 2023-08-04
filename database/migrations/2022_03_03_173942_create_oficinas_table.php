<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOficinasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('oficinas', function (Blueprint $table) {
            $table->bigIncrements('id_office');
            
            $table->string('office_name')->nullable();
            $table->string('office_reference')->unique();

            // Logotipos
            $table->string('office_widget')->nullable();
            $table->string('office_link')->nullable();

            // Links del sitios
            $table->string('office_white_logo')->nullable();
            $table->string('office_logo')->nullable();

            $table->text('office_address')->nullable();
            $table->text('office_map')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('oficinas');
    }
}

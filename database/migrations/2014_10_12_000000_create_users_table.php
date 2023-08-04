<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            // Datos de contacto
            $table->string('email')->unique();
            $table->string('phone')->nullable();
            $table->string('whatsapp')->nullable();

            // Imagen de perfil
            $table->string('main_image')->nullable();

            // Imagen de perfil
            $table->string('subtitle')->nullable();
            $table->text('description')->nullable();

            // Slug o identificador amigable
            $table->string('url');

            // Servicios
            $table->text('servicios')->nullable();

            // Certificaciones
            $table->text('badges')->nullable();
            $table->text('statistics')->nullable();

            // Información de oficina
            $table->integer('id_office')->nullable();

            // Redes sociales
            $table->string('twitter')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();

            # $table->string('geo_location');
            # $table->string('direccion');
            
            // Tipo de micrositio
            $table->string('level')->nullable();
            
            # $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            # $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSelectedUlasansTable extends Migration
{
    public function up()
    {
        Schema::create('selected_ulasans', function (Blueprint $table) {
            $table->bigIncrements('id_ulasan'); // Sesuai struktur di phpMyAdmin
            $table->tinyInteger('rating');
            $table->longText('text');
            $table->string('author_name', 255);
            $table->tinyInteger('id_displayed')->default(0);
            $table->timestamps(); // Akan membuat created_at dan updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('selected_ulasans');
    }

};

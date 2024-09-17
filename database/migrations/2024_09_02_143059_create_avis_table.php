<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAvisTable extends Migration
{
    public function up()
    {
        Schema::create('avis', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('tel');
            $table->text('detail_message');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedTinyInteger('nbre_etoile');
            $table->unsignedBigInteger('professionnel_id')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            $table->foreign('professionnel_id')->references('id')->on('professionnels')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::dropIfExists('avis');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MakeLibraryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('library', function (Blueprint $table) {
            $table->id();
            $table->string('u_id');
            $table->string('title');
            $table->string('writer');
            $table->string('contributor')->nullable();
            $table->string('publisher')->nullable();
            $table->string('collection_type');
            $table->longText('abstract')->nullable();
            $table->string('visibility')->default('pending');
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
        //
    }
}

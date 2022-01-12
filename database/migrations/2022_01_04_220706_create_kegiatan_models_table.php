<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKegiatanModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kegiatan_models', function (Blueprint $table) {
            $table->id();
            $table->string('kegiatan');
            $table->integer('value');
            $table->integer('harga');
            $table->integer('total');
            $table->unsignedBigInteger('spb_id')->nullable();
            $table->timestamps();

            $table->foreign('spb_id')
                    ->references('id')->on('spb_models')
                    ->cascadeOnUpdate()
                    ->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kegiatan_models');
    }
}

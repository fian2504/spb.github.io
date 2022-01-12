<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpbModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spb_models', function (Blueprint $table) {
            $table->id();
            $table->string('no_surat');
            $table->unsignedBigInteger('kepada')->nullable();
            $table->unsignedBigInteger('penerima')->nullable();
            $table->date('tgl_pengiriman');
            $table->date('tgl_pembuatan');
            $table->unsignedBigInteger('pengesahan1')->nullable();
            $table->unsignedBigInteger('pengesahan2')->nullable();
            $table->timestamps();

            $table->foreign('kepada')
                    ->references('id')->on('rekanan_models')
                    ->cascadeOnUpdate()
                    ->nullOnDelete();
            $table->foreign('penerima')
                    ->references('id')->on('pejabat_models')
                    ->cascadeOnUpdate()
                    ->nullOnDelete();
            $table->foreign('pengesahan1')
                    ->references('id')->on('pejabat_models')
                    ->cascadeOnUpdate()
                    ->nullOnDelete();
            $table->foreign('pengesahan2')
                    ->references('id')->on('pejabat_models')
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
        Schema::dropIfExists('spb_models');
    }
}

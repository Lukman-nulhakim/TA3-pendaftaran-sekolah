<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiswasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siswas', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->dateTimeTz('tanggal_lahir');
            $table->string('jenis_kelamin');
            $table->text('alamat');
            $table->unsignedBigInteger('kecamatan_id');
            $table->unsignedBigInteger('kota_id');
            $table->string('agama');
            $table->string('ijazah');
            $table->string('skhun');
            $table->timestamps();

            $table->foreign('kecamatan_id')->references('id')->on('kecamatans')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('kota_id')->references('id')->on('kotas')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('siswas');
    }
}

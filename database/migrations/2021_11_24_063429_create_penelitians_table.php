<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenelitiansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penelitians', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users');
            $table->string('anggota_1');
            $table->string('anggota_2');
            $table->string('jenis_program');
            $table->string('judul_program');
            $table->string('nama_file');
            $table->enum('status', ['Submit','Accept','Reject'])->default('Submit');
            $table->string('link_jurnal');
            $table->string('judul_jurnal');
            $table->string('link_luaran_1')->nullable();
            $table->string('link_luaran_2')->nullable();
            $table->string('pesan')->nullable();
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
        Schema::dropIfExists('penelitians');
    }
}

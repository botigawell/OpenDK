<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablePesan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('das_pesan', function (Blueprint $table) {
            $table->increments('id');
            $table->string('judul', 255);
            $table->unsignedInteger('das_data_desa_id');
            $table->enum('jenis', ['Pesan Masuk', 'Pesan Keluar']);
            $table->boolean('sudah_dibaca')->default(0);
            $table->boolean('diarsipkan')->default(0);
            $table->foreign('das_data_desa_id')
                ->references('id')
                ->on('das_data_desa')
                ->onDelete('cascade')
                ->onUpdate('cascade');
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
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('das_pesan');
        Schema::enableForeignKeyConstraints();
    }
}

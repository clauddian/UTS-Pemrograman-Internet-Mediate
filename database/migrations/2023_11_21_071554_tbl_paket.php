<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_paket', function (Blueprint $table) {
            $table->bigIncrements('id_paket');
            $table->string('kd_paket', 15);
            $table->string('nm_paket', 50);
            $table->string('jenis_paket', 30);
            $table->string('nm_konsumen', 30);
            $table->text('tujuan');
            $table->string('nm_penerima', 30);
            $table->text('foto_resi');
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
        Schema::dropIfExists('tbl_paket');
    }
};

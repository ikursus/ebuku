<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTempahanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tempahan', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('booklist_id');
            $table->string('nama_pelanggan');
            $table->string('email_pelanggan');
            $table->string('telefon_pelanggan');
            $table->decimal('kuantiti');
            $table->decimal('jumlah_bayaran', 8,2);
            $table->date('tarikh_bayaran')->nullable();
            $table->time('masa_bayaran')->nullable();
            $table->string('bukti_bayaran')->nullable();
            $table->string('status');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tempahan');
    }
}

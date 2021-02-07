<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCargoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cargo', function (Blueprint $table) {
            $table->id();
            $table->string('productName');
            $table->string('customerName');
            $table->string('phone');
            $table->string('il');
            $table->string('ilce');
            $table->string('postaKodu');
            $table->string('kargoFirmasi');
            $table->string('gonderimSekli');
            $table->string('tahsilatTutari');
            $table->string('kargoTipi');
            $table->text('adres');
            $table->text('desi');
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
        Schema::dropIfExists('cargo');
    }
}

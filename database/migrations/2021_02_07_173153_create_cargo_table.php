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
            $table->string('productName')->nullable();
            $table->string('customerName')->nullable();
            $table->string('phone')->nullable();
            $table->string('il')->nullable();
            $table->string('ilce')->nullable();
            $table->string('postaKodu')->nullable();
            $table->string('kargoFirmasi')->nullable();
            $table->string('gonderimSekli')->nullable();
            $table->string('tahsilatTutari')->nullable();
            $table->string('kargoTipi')->nullable();
            $table->text('adres')->nullable();
            $table->text('desi')->nullable();
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

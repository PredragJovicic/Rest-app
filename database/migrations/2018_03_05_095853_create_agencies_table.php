<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgenciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agencies', function (Blueprint $table) {
            $table->increments('id');
			$table->string('name');
			$table->string('address');
			$table->string('city');
			$table->string('countri');
			$table->string('phone');
			$table->string('email');
			$table->string('web');
            $table->timestamps();
        });
    }

    /**Address, City (Two dependant dropdowns of existing countries and cities from DB), Phone numbers, Email, Web
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('agencies');
    }
}

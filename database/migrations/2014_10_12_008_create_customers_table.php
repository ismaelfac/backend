<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
      public function up()
      {
            Schema::create('customers', function (Blueprint $table) {
                  $table->engine = 'InnoDB';
                  $table->id();
                  $table->foreignId('person_id')->references('id')->on('people')->onUpdate('cascade');
                  $table->enum('state_customer', ['Activo', 'Inactivo', 'Suspendido'])->default('Inactivo');
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
            Schema::dropIfExists('customers');
      }
}

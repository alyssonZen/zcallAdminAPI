<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Clientes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('clientes', function (Blueprint $table) {
          $table->increments('id');
          $table->string('cliente', 200);
          $table->string('cpf_cnpj', 20);
          $table->string('insc_estadual', 20)->nullable(true);
          $table->string('servidor', 150)->default('127.0.0.1');
          $table->string('login', 20)->default('mudar');
          $table->string('senha', 20)->default('mudar');
          $table->string('banco', 20)->default('mudar');
          $table->integer('porta')->default(3306);
          $table->dateTime('ultimo_acesso')->nullable(true);
          $table->string('versao_banco', 20)->nullable(true);
          $table->string('cidade', 20)->nullable(true);
          $table->decimal('latitude', 11, 8)->nullable(true);
          $table->decimal('longitude', 11, 8)->nullable(true);
          $table->string('localidade', 50)->nullable(true);
          $table->string('id_teamveiwer', 50)->nullable(true);
          $table->string('senha_teamveiwer', 50)->nullable(true);
          $table->boolean('instalacao')->default(0);
          $table->boolean('backup')->default(1);
          $table->boolean('get_parados')->default(1);
          $table->boolean('get_prospeccao')->default(1);
          $table->boolean('app_mostrar_btn_ligar')->default(1);
          $table->integer('id_siac')->nullable(true);
          $table->integer('id_cliente_siac')->nullable(true);
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
        Schema::dropIfExists('clientes');
    }
}

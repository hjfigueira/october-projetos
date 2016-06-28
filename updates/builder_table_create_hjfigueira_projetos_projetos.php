<?php namespace Hjfigueira\Projetos\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateHjfigueiraProjetosProjetos extends Migration
{
    public function up()
    {
        Schema::create('hjfigueira_projetos_projetos', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('titulo', 250);
            $table->text('descricao')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('hjfigueira_projetos_projetos');
    }
}
<?php namespace Hjfigueira\Projetos\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateHjfigueiraProjetosProjetos extends Migration
{
    public function up()
    {
        Schema::table('hjfigueira_projetos_projetos', function($table)
        {
            $table->text('slug');
        });
    }
    
    public function down()
    {
        Schema::table('hjfigueira_projetos_projetos', function($table)
        {
            $table->dropColumn('slug');
        });
    }
}

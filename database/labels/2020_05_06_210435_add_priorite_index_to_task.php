<?php

use Vinelab\NeoEloquent\Facade\Neo4jSchema;
use Vinelab\NeoEloquent\Schema\Blueprint;
use Vinelab\NeoEloquent\Migrations\Migration;

class AddPrioriteIndexToTask extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Neo4jSchema::label('tasks', function(Blueprint $label)
        {
            $label->index('task_priority');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Neo4jSchema::label('tasks', function(Blueprint $label)
        {
            $label->dropIndex('task_priority');
        });
    }

}

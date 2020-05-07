<?php

use Vinelab\NeoEloquent\Facade\Neo4jSchema;
use Vinelab\NeoEloquent\Schema\Blueprint;
use Vinelab\NeoEloquent\Migrations\Migration;

class AddStateIndexToUser1sLabel extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Neo4jSchema::label('tasks', function(Blueprint $label)
        {
            $label->index('tstate');
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
            $label->dropIndex('tstate');
        });
    }

}

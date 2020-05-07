<?php

use Vinelab\NeoEloquent\Facade\Neo4jSchema;
use Vinelab\NeoEloquent\Schema\Blueprint;
use Vinelab\NeoEloquent\Migrations\Migration;

class AddDescriptionIndexToTask extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Neo4jSchema::label('tasks', function(Blueprint $label)
        {
            $label->index('description');
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
            $label->dropIndex('description');
        });
    }

}

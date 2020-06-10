<?php

use Vinelab\NeoEloquent\Schema\Blueprint;
use Vinelab\NeoEloquent\Migrations\Migration;

class AddUpdatedTasksIndexToUser extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Neo4jSchema::label('user1s', function(Blueprint $label)
        {
            //updated_tasks
            $label->index('updated_tasks');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Neo4jSchema::label('user1s', function(Blueprint $label)
        {
            $label->dropIndex('updated_tasks');
        });
    }

}

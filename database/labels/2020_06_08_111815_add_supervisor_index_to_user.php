<?php

use Vinelab\NeoEloquent\Schema\Blueprint;
use Vinelab\NeoEloquent\Migrations\Migration;

class AddSupervisorIndexToUser extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Neo4jSchema::label('user1s', function(Blueprint $label)
        {
            $label->index('supervisor');
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
            $label->dropIndex('supervisor');
        });
    }

}

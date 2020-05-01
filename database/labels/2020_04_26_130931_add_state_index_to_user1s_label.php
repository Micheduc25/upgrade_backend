<?php

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
        Neo4jSchema::label('user1s', function(Blueprint $label)
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
        Neo4jSchema::label('user1s', function(Blueprint $label)
        {
            $label->dropIndex('tstate');
        });
    }

}

<?php

use Vinelab\NeoEloquent\Schema\Blueprint;
use Vinelab\NeoEloquent\Migrations\Migration;

class AddSunchronizedIndexToTask extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Neo4jSchema::label('tasks', function(Blueprint $label)
        {
            $label->index('synchronized');
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
            $label->dropIndex('synchronized');
        });
    }

}

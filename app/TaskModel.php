<?php

namespace App;


use Vinelab\NeoEloquent\Eloquent\Model  as NeoEloquent;

class TaskModel extends NeoEloquent{
    protected $label = 'tasks';//array('task', 'Person'); // or array('User', 'Fan')
    protected $table = 'tasks';
    protected $fillable = ['title', 'description', 'tstate'];

    public function user1(){
        return $this->hasOne('App\User1', 'task for');
    }


}

//$taskModel = TaskModel::create(['title'=>'my task']);

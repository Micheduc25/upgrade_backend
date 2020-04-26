<?php

namespace App;


use Vinelab\NeoEloquent\Eloquent\Model  as NeoEloquent;

class TaskModel extends NeoEloquent{
    protected $label = 'tasks';//array('task', 'Person'); // or array('User', 'Fan')
    protected $table = 'tasks';
    protected $fillable = ['title'];
}

//$taskModel = TaskModel::create(['title'=>'my task']);

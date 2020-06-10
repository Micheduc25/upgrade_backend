<?php

namespace App;

use Vinelab\NeoEloquent\Eloquent\Model  as NeoEloquent;

class User1 extends NeoEloquent{
    protected $label = 'user1s';//array('task', 'Person'); // or array('User', 'Fan')
    protected $table = 'user1s';
    protected $fillable = ['username', 'password', 'role', 'supervisor', 'deleted_tasks', 'updated_tasks'];
    static public $currentUser = null;

    /**
     * Get the task record associated with the user.
     */
    public function task()
    {
        return $this->hasMany('App\TaskModel', 'todo');
    }
    public function supervise(){
        return $this->hasMany('App\User1', 'supervise');
    }
    public function superviser_par(){
        return $this->hasOne('App\User1', 'superviser par');
    }



}

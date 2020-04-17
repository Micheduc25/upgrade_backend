<?php

namespace App;

use Illuminate\Database\Eloquent\Model;



class Task extends Model{
    protected $table = 'task';
    protected $primaryKey = 'taskid';
    public $timestamps = false;
    public $fillable = ['userid', 'description', 'state'];
}
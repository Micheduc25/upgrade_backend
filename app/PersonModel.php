<?php

namespace App;

use Vinelab\NeoEloquent\Eloquent\Model  as NeoEloquent;

class PersonModel extends NeoEloquent
{
    protected $label = 'person_models'; //array('task', 'Person'); // or array('User', 'Fan')
    protected $table = 'person_models';
    protected $fillable = ['name', 'age'];


    /**
     * Get the post record associated with the person.
     */
    public function post()
    {
        return $this->hasManyThrough('App\PostModel', 'App\CommentModel');
        return $this->hasOneThrough('App\PostModel', 'App\CommentModel');
        //return $this->hasMany('App\PostModel', 'person a post');
    }
}

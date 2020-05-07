<?php

namespace App;

use Vinelab\NeoEloquent\Eloquent\Model  as NeoEloquent;

class PostModel extends NeoEloquent
{
    protected $label = 'post_models'; //array('task', 'Person'); // or array('User', 'Fan')
    protected $table = 'post_models';
    protected $fillable = ['post_content'];
}

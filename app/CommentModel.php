<?php

namespace App;

use Vinelab\NeoEloquent\Eloquent\Model  as NeoEloquent;

class CommentModel extends NeoEloquent
{
    protected $label = 'comment_models'; //array('task', 'Person'); // or array('User', 'Fan')
    protected $table = 'comment_models';
    protected $fillable = ['comment_content'];
}

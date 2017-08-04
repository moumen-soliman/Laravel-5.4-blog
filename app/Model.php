<?php

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Model extends Eloquent
{
    protected $guarded = []; //this to secure fields and can use it in any app model , check App\Post
}

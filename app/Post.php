<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['body' , 'user_id' ];

    public $rules = ['body' => 'required|min:3|max:255'];

    public function user()
    {
       return $this->belongsTo('App\User');
    }

    public function likes()
    {
        return $this->hasMany('App\Like');
    }

    
}

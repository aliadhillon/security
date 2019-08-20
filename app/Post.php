<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'body',
    ];

    /**
     * This will return the user model with owns this post
     * @param void
     * @return Model
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

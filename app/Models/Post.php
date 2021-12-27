<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    // protected $primayKey = 'id';

      /**
        * Get the user that owns the Post
        *
        * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
        */
       public function categories()
       {
           return $this->belongsTo(Category::class, 'category_id', 'id');
       }

       /**
        * Get the user that owns the Post
        *
        * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
        */
       public function user()
       {
           return $this->belongsTo(User::class, 'author_id', 'id');
       }

       /**
        * Get all of the comments for the Post
        *
        * @return \Illuminate\Database\Eloquent\Relations\HasMany
        */
       public function comments(): HasMany
       {
           return $this->hasMany(Comment::class, 'post_id', 'id');
       }

}

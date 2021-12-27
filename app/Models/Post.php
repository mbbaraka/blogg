<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    protected $primayKey = 'id';

      /**
        * Get the user that owns the Post
        *
        * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
        */
       public function categories(): BelongsTo
       {
           return $this->belongsTo(Category::class, 'category_id', 'id');
       }

       /**
        * Get the user that owns the Post
        *
        * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
        */
       public function user(): BelongsTo
       {
           return $this->belongsTo(User::class, 'author_id', 'id');
       }

}

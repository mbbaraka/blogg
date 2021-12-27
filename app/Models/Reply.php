<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Reply extends Model
{
    /**
     * Get the comment that owns the Reply
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function comment(): BelongsTo
    {
        return $this->belongsTo(Comment::class, 'comment_id', 'id');
    }

    /**
     * Get the comment that owns the Reply
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id', 'id');
    }
}

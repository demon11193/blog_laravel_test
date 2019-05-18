<?php

namespace App\Blog;

use App\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Comment
 * @package App\Blog
 * @property int $id
 * @property int $post_id
 * @property int|null $user_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class Comment extends Model
{

    function post() {
        return $this->belongsTo(Post::class);
    }

    function user() {
        return $this->belongsTo(User::class);
    }

}

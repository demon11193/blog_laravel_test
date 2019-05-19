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
 * @property string $comment
 * @property int|null $user_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 */
class Comment extends Model
{

    protected $fillable = [
        'post_id', 'comment', 'user_id'
    ];

    function post() {
        return $this->belongsTo(Post::class);
    }

    function user() {
        return $this->belongsTo(User::class);
    }

}

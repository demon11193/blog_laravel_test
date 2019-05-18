<?php

namespace App\Blog;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PostStatus
 * @package App\Blog
 *
 * @property int $id
 * @property string $name
 */
class PostStatus extends Model
{

    const STATUS_DELETED = -1;
    const STATUS_CREATED = 0;
    const STATUS_PUBLISHED = 1;

    function posts() {
        return $this->hasMany(Post::class);
    }

}

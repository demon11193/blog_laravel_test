<?php

namespace App\Blog;

use App\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Revision
 * @package App\Blog
 * @property int $id
 * @property int $post_id
 * @property int $rubric_id
 * @property string $name
 * @property string $context
 * @property int|null $user_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class Revision extends Model
{

    use SoftDeletes;

    function user() {
        return $this->belongsTo(User::class);
    }

    function rubric() {
        return $this->belongsTo(Rubric::class);
    }

    function post() {
        return $this->belongsTo(Post::class);
    }

    function tags() {
        return $this->belongsToMany(Tag::class);
    }

}

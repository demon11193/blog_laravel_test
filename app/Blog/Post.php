<?php

namespace App\Blog;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Post
 * @package App\Blog
 * @property int $id
 * @property string $link
 * @property int $post_status_id
 * @property int $actual_revision_id Актуальная в данный момент ревизия
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class Post extends Model
{

    function postStatus() {
        return $this->belongsTo(PostStatus::class);
    }

    function actualRevision() {
        return $this->belongsTo(Revision::class, 'actual_revision_id');
    }

    function revisions() {
        return $this->hasMany(Revision::class);
    }

    function tags() {
        return $this->belongsToMany(
            Tag::class,
            'revision_tag',
            'revision_id',
            'tag_id',
            'actual_revision_id'
        );
    }

    function comments() {
        return $this->hasMany(Comment::class);
    }

}

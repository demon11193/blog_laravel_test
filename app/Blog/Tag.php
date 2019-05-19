<?php

namespace App\Blog;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Tag
 * @package App\Blog
 * @property int $id
 * @property string $name
 */
class Tag extends Model
{

    protected $fillable = [
        'name',
    ];

    public $timestamps = false;

    function revisions() {
        return $this->belongsToMany(Revision::class);
    }

}

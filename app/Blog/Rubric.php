<?php

namespace App\Blog;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Rubric
 * @package App\Blog
 * @property int $id
 * @property string $name
 * @property int $rubric_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 */
class Rubric extends Model
{

    protected $fillable = [
        'name',
    ];

    function revisions() {
        return $this->hasMany(Revision::class);
    }

}

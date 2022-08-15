<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;
use Orbit\Concerns\Orbital;

class Document extends Model
{
    use Orbital;

    protected $fillable = [
        'title',
        'slug',
        'content',
    ];

    public static function schema(Blueprint $table)
    {
        $table->string('title');
        $table->string('slug')->unique();
        $table->text('content')->nullable();
        // $table->string('category_slug')->nullable();
    }

    public function getKeyName()
    {
        return 'slug';
    }

    public function getIncrementing()
    {
        return false;
    }

    public function scopeTitleLike($query, $title)
    {
        return $query->where('title', 'like', '%'.$title.'%');
    }
}

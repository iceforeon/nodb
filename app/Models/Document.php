<?php

namespace App\Models;

use App\Traits\Hashid;
use App\Traits\Sluggable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Str;
use Orbit\Concerns\Orbital;

class Document extends Model
{
    use Hashid;
    use Sluggable;
    use Orbital;

    public $timestamps = false;

    protected $fillable = [
        'title',
        'slug',
        'content',
    ];

    public function getKeyName()
    {
        return 'hashid';
    }

    public function getIncrementing()
    {
        return false;
    }

    public static function schema(Blueprint $table)
    {
        $table->id();
        $table->string('hashid');
        $table->string('title');
        $table->string('slug');
        $table->text('content')->nullable();
        // $table->string('category_slug')->nullable();
    }

    protected function title(): Attribute
    {
        return Attribute::set(fn ($value) => ucfirst($value));
    }

    protected function titleTruncate(): Attribute
    {
        return Attribute::get(fn () => Str::of($this->title)->limit(50, '...'));
    }

    protected function slugTruncate(): Attribute
    {
        return Attribute::get(fn () => Str::of($this->slug)->limit(50, '...'));
    }

    public function scopeTitleLike($query, $title)
    {
        return $query->where('title', 'like', '%'.$title.'%');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Orbit\Concerns\Orbital;

class User extends Authenticatable
{
    use Notifiable;
    use Orbital;

    protected $fillable = [
        'name',
        'username',
        'password',
    ];

    protected $hidden = [
        'password',
    ];

    public static function schema(Blueprint $table)
    {
        $table->string('name');
        $table->string('username')->unique();
        $table->string('password');
    }

    public function getKeyName()
    {
        return 'username';
    }

    public function getIncrementing()
    {
        return false;
    }
}

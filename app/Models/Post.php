<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title',
        'content',
    ];

    public static function run(): void
    {
        self::create([
            'title' => 'First Post',
            'content' => 'This is my first post.',
        ]);
    }
}

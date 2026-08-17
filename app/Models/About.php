<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    /** @use HasFactory<\Database\Factories\AboutFactory> */
    use HasFactory;

    protected $fillable = [
        'title',
        'short_description',
        'description',
        'image',
        'video',
        'is_published',

    ];
    protected function casts(): array
    {
        return [
            'is_published' => 'boolean',

        ];
    }
}

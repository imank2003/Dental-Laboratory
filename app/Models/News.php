<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class News extends Model
{
    /** @use HasFactory<\Database\Factories\NewsFactory> */
    use HasFactory, SoftDeletes;


    protected $fillable = [

        'title',
        'slug',
        'description',
        'image',
        'is_published',
        'short_description',
    ];

    protected function casts(): array
    {
        return [
            'is_published' => 'boolean',

        ];
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    /** @use HasFactory<\Database\Factories\ArticleFactory> */
    use HasFactory, SoftDeletes;



    protected $fillable = [
        'slug',
        'title',
        'image',
        'description',
        'is_published',
        'short_description',
    ];
    protected function casts(): array
    {
        return [
            'is_published' => 'boolean',

        ];
    }
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}

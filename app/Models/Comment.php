<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    /** @use HasFactory<\Database\Factories\CommentFactory> */
    use HasFactory;

    protected $fillable = [
        'full_name',
        'email',
        'content',
        'is_approved',
    ];


    protected function casts(): array
    {
        return [
            'is_approved' => 'boolean',
        ];
    }
}

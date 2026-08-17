<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
    /** @use HasFactory<\Database\Factories\ServiceFactory> */
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'title',
        'short_description',
        'description',
        'image',
        'is_published',
        'slug'
    ];
    protected function casts(): array
    {
        return [
            'is_published' => 'boolean',

        ];
    }

    public function portfolios()
    {
        return $this->hasMany(Portfolio::class);
    }
}

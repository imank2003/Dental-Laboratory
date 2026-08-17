<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Portfolio extends Model
{
    /** @use HasFactory<\Database\Factories\PortfolioFactory> */
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'title',
        'service_id',
        'image',
        'video',
        'description',
        'is_published',
        'short_description',
        'slug',
    ];
    protected function casts(): array
    {
        return [
            'is_published' => 'boolean',

        ];
    }
    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}

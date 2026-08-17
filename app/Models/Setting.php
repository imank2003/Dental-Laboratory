<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    /** @use HasFactory<\Database\Factories\SettingFactory> */
    use HasFactory;
    protected $fillable = [
        'phone',
        'email',
        'instagram',
        'telegram',
        'whatsapp',
        'address',
        'logo',
        'footer_text',
    ];
}

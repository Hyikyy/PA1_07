<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'slug',
        'title',
        'icon_class',
        'summary',
        'route_name',
        'order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}

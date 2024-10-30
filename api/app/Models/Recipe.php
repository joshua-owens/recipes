<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string $url
 * @property string $image
 * @property array $ingredients
 * @property array $instructions
 * @property array $nutrients
 * @property string $title
 * @property int $total_time
 * @property string $yields
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 */
class Recipe extends Model
{
    use HasFactory;

    protected $fillable = [
        'url',
        'image',
        'ingredients',
        'instructions',
        'nutrients',
        'title',
        'total_time',
        'yields',
    ];

    protected $casts = [
        'ingredients' => 'array',
        'instructions' => 'array',
        'nutrients' => 'array',
    ];
}

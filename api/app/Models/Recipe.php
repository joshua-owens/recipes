<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

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
    use Searchable;

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

    /**
     * Get the indexable data array for the model.
     *
     * @return array<string, mixed>
     */
    public function toSearchableArray()
    {
        return array_merge($this->toArray(),[
            'id' => (string) $this->id,
            'created_at' => $this->created_at->timestamp,
        ]);    
    }
}

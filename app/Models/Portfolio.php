<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Portfolio extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'type',
        'image',
        'link',
        'is_active',
        'order',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'order' => 'integer',
    ];

    /**
     * Get the image URL
     */


     protected $appends = [ 'image_url'];

    public function getImageUrlAttribute()
    {
        if ($this->image) {
            return asset('storage/portfolio/' . $this->image);
        }
        return null;
    }

    /**
     * Get the type in readable format
     */
    public function getTypeLabelAttribute()
    {
        return match($this->type) {
            'desarrollo_web' => 'Desarrollo Web',
            'aplicacion' => 'Aplicación',
            default => 'Desarrollo Web'
        };
    }

    /**
     * Scope for active portfolios
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope for ordering by order field
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('order', 'asc');
    }
} 
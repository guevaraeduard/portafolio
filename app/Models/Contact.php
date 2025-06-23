<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'email',
        'telefono',
        'servicio_interes',
        'detalles_proyecto',
        'leido'
    ];

    protected $casts = [
        'leido' => 'boolean',
    ];

    public function scopeNoLeidos($query)
    {
        return $query->where('leido', false);
    }

    public function scopeLeidos($query)
    {
        return $query->where('leido', true);
    }
} 
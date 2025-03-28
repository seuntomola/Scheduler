<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $fillable = [
        'name',
        'description',
        'capacity',
        'is_active',
        
    ];

    // For custom logic, e.g. scope for "active only"
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}

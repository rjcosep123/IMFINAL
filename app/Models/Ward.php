<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ward extends Model
{
    protected $fillable = [
        'ward_name',
        'location',
        'total_beds',
        'occupied_beds',
        'extension_number'
    ];

    public function getAvailableBedsAttribute()
    {
        return $this->total_beds - $this->occupied_beds;
    }
}

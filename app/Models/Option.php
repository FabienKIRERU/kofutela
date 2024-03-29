<?php

namespace App\Models;

use App\Models\Property;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Option extends Model
{
    use HasFactory;

    
    protected $fillable = [
        'name',
    ];

    public function properties(){
        return $this->belongsToMany(Property::class);
    }
    
}

<?php

namespace App\Models;

use App\Models\Quarter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Area extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
    ];
    
    public function quarters(): HasMany{
        return $this->hasMany(Quarter::class);
    }
}

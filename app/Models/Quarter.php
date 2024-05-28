<?php

namespace App\Models;

use App\Models\Area;
use App\Models\Property;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Quarter extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'erea_id',
    ];
    public function area(): BelongsTo{
        return $this->belongsTo(Area::class);
    }
    public function properties(): HasMany{
        return $this->hasMany(Property::class);
    }

}

<?php

namespace App\Models;

use App\Models\Area;
use App\Models\User;
use App\Models\Option;
use App\Models\Picture;
use App\Models\Quarter;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\UploadedFile;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Property extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'title',
        'description',
        'surface',
        'rooms',
        'bedrooms',
        'floor',
        'price',
        'address',
        'sold',
    ];
        
    public function quarter(){
        return $this->belongsTo(Quarter::class);
    }
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function options(){
        return $this->belongsToMany(Option::class);
    }
    public function getSlug(): string{
        return Str::slug($this->title);
    }
    public function pictures(): HasMany{
        return $this->hasMany(Picture::class);
    }
    public function user(): BelongsTo{
        return $this->belongsTo(User::class);
    }
    /**
     * Undocumented function
     *
     * @param UploadedFile[] $files
     */
    public function attachFiles(array $files){
        $pictures = [];
        foreach ($files as $file) {
            if ($file->getError()) {
                continue;
            }
            $filename = $file->store('properties/'. $this->id, 'public');
            $pictures[] = [
                'filename' => $filename,
            ];
        }
        if(count($pictures) > 0){
            $this->pictures()->createMany($pictures);
        }
    }
    public function getPicture(): ?Picture {
        return $this->pictures[0] ?? null ;
    }

    public function scopeAvailable(Builder $builder) : Builder{
        return $builder->where('sold', false);
    }
    public function scopeRecent(Builder $builder) : Builder{
        return $builder->orderBy('updated_at', 'desc');
    }
}

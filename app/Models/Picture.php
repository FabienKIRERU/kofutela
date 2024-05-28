<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use League\Glide\Urls\UrlBuilderFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Picture extends Model
{
    use HasFactory;
    protected $fillable = [
        'filename',
    ];

    protected static function booted():void
    {
        static::deleting(function(Picture $picture){
            Storage::delete($picture->filename);
        });
    }
    public function getImageUrl(?int $width = null, ?int $heigth = null):string{
        if ($width == null) {
            return Storage::url($this->filename);
        }
        $urlBuilder = UrlBuilderFactory::create('/images/', config('glide.key'));
        return $urlBuilder->getUrl($this->filename, [ 'w' => $width, 'h' => $heigth, 'fit' => 'crop']);
        // return Storage::disk('public')->url($this->filemane);
    }

    public function property() : BelongsTo {
        return $this->belongsTo(Property::class);
    }
}

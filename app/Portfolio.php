<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class Portfolio extends Model implements HasMedia
{
    use SoftDeletes, HasMediaTrait;

    public $table = 'portfolios';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    const TYPE_RADIO = [
        'small' => 'Small',
        'large' => 'Large',
    ];

    const TEXT_COLOUR_RADIO = [
        'white' => 'White',
        'black' => 'Black',
    ];

    protected $fillable = [
        'link',
        'name',
        'type',
        'order',
        'client',
        'pinned',
        'created_at',
        'updated_at',
        'deleted_at',
        'text_colour',
        'description',
    ];

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')->width(50)->height(50);
    }

    public function getImageAttribute()
    {
        $file = $this->getMedia('image')->last();

        if ($file) {
            $file->url = $file->getUrl();
        }

        return $file;
    }
}

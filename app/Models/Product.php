<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $appends = ['image_url'];

    //rel
    public function alternatives(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'alternatives', 'product_id', 'alternative_id');
    }


    public function getImageUrlAttribute(): string
    {
        if ($this->product_image != null) {
            return url('/storage/'.$this->product_image);
        }else{
            return Storage::url('no-image.png');
        }
    }
}

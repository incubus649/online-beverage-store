<?php

namespace App\Models;

use Attribute;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'brand', 'country', 'price', 'size', 'alcohol_vlm', 'stock', 'image', 'description', 'user_id'];

    public function scopeFilter($query, array $filters)
    {
        if ($filters['search'] ?? false) {
            $query->where('name', 'like', '%' . request('search') . '%');
        }

        if ($filters['brand'] ?? false) {
            $query->where('brand', 'like', '%' . request('brand') . '%');
        }

        if ($filters['alcohol_vlm'] ?? false) {
            $query->where('alcohol_vlm', 'like', '%' . request('alcohol_vlm') . '%');
        }

        if ($filters['size'] ?? false) {
            $query->where('size', 'like', '%' . request('size') . '%');
        }

        if ($filters['country'] ?? false) {
            $query->where('country', 'like', '%' . request('country') . '%');
        }
        
    }

    public function scopeOrderByPrice($query, $direction = 'asc')
    {
        return $query->orderBy('price', $direction);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class)->withPivot('quantity');
    }

    public function wishlist()
    {
        return $this->hasMany(Wishlist::class);
    }
}

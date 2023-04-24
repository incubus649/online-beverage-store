<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;
    use Sluggable;
    protected $fillable = ['name', 'slug', 'parent_id'];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(static::class, foreignKey: 'parent_id');
    }
    
    public function children(): HasMany
    {
        return $this->hasMany(static::class, foreignKey: 'parent_id');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
    
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;


class Category extends Model
{
    use Sluggable;
    protected $guarded = ['id'];

    public function getRouteKeyName(){
        return 'slug_category';
    }

    public function sluggable(): array
    {
        return [
            'slug_category' => [
                'source' => 'name_category'
            ]
        ];
    }

    public function product(){
        return $this->hasMany(product::class,);
    }
}

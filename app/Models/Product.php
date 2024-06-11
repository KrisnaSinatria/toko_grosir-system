<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;


class Product extends Model
{
    use Sluggable;
    protected $guarded = ['id'];

    public function getRouteKeyName(){
        return 'slug_product';
    }

    public function sluggable(): array
    {
        return [
            'slug_product' => [
                'source' => 'name_product'
            ]
        ];
    }

    public function category(){
        return $this->belongsTo(Category::class, 'id_category' , 'id');
    }

    public function transactions()
    {
        return $this->belongsToMany(Transaction::class, 'transaction_items', 'id_product', 'id_transaction')
        ->withPivot('quantity', 'price');
    }

    public function transactionItems()
    {
        return $this->hasMany(TransactionItem::class);
    }
}

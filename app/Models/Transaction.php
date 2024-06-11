<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $guarded = ['id'];

    public function items()
    {
        return $this->hasMany(TransactionItem::class, 'id_transaction');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'transaction_items', 'id_transaction', 'id_product')
                    ->withPivot('quantity');
    }

    public function transactionItems()
    {
        return $this->belongsToMany(Product::class, 'transaction_items', 'id_transaction', 'id_product')
                    ->withPivot('quantity', 'price')
                    ->withTimestamps();
    }

    
}

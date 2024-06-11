<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionItem extends Model
{
    protected $guarded = ['id'];

    public function product()
    {
        return $this->belongsTo(Product::class, 'id_product');
    }
    public function transaction()
    {
        return $this->belongsTo(Transaction::class, 'id_transaction');
    }
}

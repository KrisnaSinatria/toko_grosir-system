<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    protected $guarded = ['id'];

    public function product(){
        return $this->belongsTo(Product::class, 'id_product' , 'id');
    }

    public function supplier(){
        return $this->belongsTo(Supplier::class, 'id_supplier' , 'id');
    }
    
    public function stock(){
        return $this->belongsTo(Supplier::class, 'id_stock' , 'id');
    }
}

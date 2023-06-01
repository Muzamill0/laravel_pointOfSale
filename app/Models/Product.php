<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'categories_id',
        'name',
        'description',
        'quantity',
        'cost_price',
        'sale_price',
        'total_price',
        'image',
    ];

    public function categories() {
        return $this->belongsTo(Category::class);
    }

    public function suppliers(){
        return $this->hasMany(Supplier::class);
    }

    public function customers(){
        return $this->hasMany(Customer::class);
    }

    public function purchases(){
        return $this->hasMany(Purchase::class);
    }

    public function sales(){
        return $this->hasMany(Sale::class);
    }
}

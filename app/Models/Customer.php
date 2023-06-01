<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'name',
        'email',
        'contact',
        'address',
    ];

    public function product() {
        return $this->belongsTo(Product::class);
    }

    public function sales() {
        return $this->hasMany(Sale::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    // guarded property
    protected $guarded = [];

    // relationship
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    
    // product class
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}

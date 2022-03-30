<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    use HasFactory;

    protected $fillable = [
        'num_items',
        'total',
    ];

    public function items(){
        return $this->hasMany(SaleItems::class);
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'qty',
        'total',
        'sales_id',
        'item_id',
    ];

    public function sale(){
        return $this->belongsTo(Sales::class, 'sales_id');
    }
}

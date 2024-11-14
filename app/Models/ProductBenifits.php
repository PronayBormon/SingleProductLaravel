<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductBenifits extends Model
{
    use HasFactory;
    protected $table = 'product_benifits';
    protected $fillable = [
        'benifits',
        'status',
    ];
}

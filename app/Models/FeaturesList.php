<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeaturesList extends Model
{
    use HasFactory;
    protected $table = 'feature_list';
    protected $fillable = [
        'title',
        'description',
        'image',
        'status',
    ];
}

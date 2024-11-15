<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Essential extends Model
{
    use HasFactory;
    protected $talbe = 'essentials';
    protected $fillable = [
        'essential'
    ];
}

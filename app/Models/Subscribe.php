<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscribe extends Model
{
    use HasFactory;
    protected $table = 'subscription';
    protected $fillable = [
        'first_name',
        'last_name',
        'phone',
        'email',
        'message',
        'type',
    ];
}

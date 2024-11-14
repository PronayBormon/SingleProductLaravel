<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KnowAboutUs extends Model
{
    use HasFactory;
    protected $table = 'know_about_us';
    protected $fillable = [
        'title',
        'description',
    ];
}

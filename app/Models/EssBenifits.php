<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EssBenifits extends Model
{
    use HasFactory;
    protected $table = 'essential_benifits';
    protected $fillable = [
        'title',
        'title_two',
        'description',
    ];
}

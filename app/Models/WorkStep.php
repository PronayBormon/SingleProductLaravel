<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkStep extends Model
{
    use HasFactory;

    protected $table = 'work_step';

    protected $fillable = [
        'title',
        'title_two',
        'description',
        'image',
    ];
}

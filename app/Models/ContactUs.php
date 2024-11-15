<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model
{
    use HasFactory;
    protected $table = 'contact_us';
    protected $fillable = [
        'logo',
        'name',
        'address',
        'phone',
        'telephone',
        'email',
        'email_two',
        'facebook',
        'whatsapp',
        'twitter',
        'instagram',
        'linkedin',
        'about_us',
    ];
}

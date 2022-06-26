<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactBock extends Model
{
    use HasFactory;

    protected $table = 'contact_bock';

    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'attach'
    ];

    public $timestamps = true;
}

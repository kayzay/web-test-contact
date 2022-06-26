<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserContactTree extends Model
{
    use HasFactory;

    protected $fillable  = [
        'user_id',
        'contact_id',
        'created_at',
        'updated_at'
    ];
    protected $primaryKey = 'user_id';

    protected $table = 'user_contact_tree';

    public $timestamps = true;


}

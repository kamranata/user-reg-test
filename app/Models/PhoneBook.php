<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhoneBook extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table   = 'phone_book';

    protected $fillable = [
        'user_id',
        'phone_number',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spay extends Model
{
    protected $table = 'spay';
    protected $fillable = ['user_id', 'type', 'amount', 'note', 'date', 'category'];
}


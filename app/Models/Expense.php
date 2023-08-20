<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;

    protected $table = "expense";

    public function User(){
        return $this->belongsTo(User::class, 'user', 'id');
    }

    public function Advert(){
        return $this->hasOne(Advert::class, 'id', 'advert');
    }
}

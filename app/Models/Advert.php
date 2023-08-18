<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advert extends Model
{
    use HasFactory;

    public function Owner(){
        return $this->hasOne(User::class, 'id', 'owner');
    }
    
    public function Creator(){
        return $this->hasOne(User::class, 'id', 'user');
    }

    public function Seller(){
        return $this->hasOne(User::class, 'id', 'seller');
    }
}

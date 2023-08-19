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

    public function Photos(){
        return $this->hasMany(AdvertPhoto::class, 'advert', 'id');
    }

    public function Note(){
        return $this->hasMany(AdvertNote::class, 'advert', 'id')->orderBy('id', 'desc');
    }

    public function Expense(){
        return $this->hasMany(Expense::class, 'advert', 'id')->orderBy('id','desc');
    }
}

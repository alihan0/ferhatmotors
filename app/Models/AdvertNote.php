<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdvertNote extends Model
{
    use HasFactory;

    protected $table = "advert_notes";

    public function User(){
        return $this->belongsTo(User::class, 'user', 'id');
    }
}

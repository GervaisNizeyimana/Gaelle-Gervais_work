<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    // use HasFactory;

    protected $fillable = ['bank_name', 'bank_location'];


    public function customers(){

        return $this->hasMany(Customer::class);
    }
    
}

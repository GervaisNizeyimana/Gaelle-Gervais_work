<?php

namespace App\Models;
use App\Models\Customer;
use Illuminate\Http\Request;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    /** @use HasFactory<\Database\Factories\CustomerFactory> */
    use HasFactory;

    protected $fillable=['fname','lname','gender','password','balance'];
    // protected $hidden =['password'];

    public function transactions(){

        return $this->hasMany(Transaction::class,'customer_id');
    }



}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    /** @use HasFactory<\Database\Factories\TransactionsFactory> */
    use HasFactory;
    protected $fillable=['customer_id','recipient_id','type','amount'];

    public function customer(){

        return $this->belongsTo(Customers::class,'customer_id');
    }




}

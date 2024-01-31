<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'amount', 
        'transaction_date', 
        'payment_method', 
        'status'];

    public function registrations()
    {
        return $this->hasMany(Registration::class);
    }
}

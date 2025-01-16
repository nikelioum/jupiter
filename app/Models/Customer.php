<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'lastname', 'email', 'customer_number', 'phone', 'company_id'];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}

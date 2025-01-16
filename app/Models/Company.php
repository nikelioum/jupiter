<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Company extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'address', 'postcode', 'city'];

    public function customers()
    {
        return $this->hasMany(Customer::class);
    }
}

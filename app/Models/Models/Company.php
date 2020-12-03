<?php

namespace App\Models\Models;

use Database\Factories\CompanyFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected static function newFactory()
    {
        return CompanyFactory::new();
    }

    public function customers(){
       return $this->hasMany(Customer::class);
    }
}

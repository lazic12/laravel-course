<?php

namespace App\Models\Models;

use Database\Factories\CompanyFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Database\Factories\CustomerFactory;

class Customer extends Model
{
    use HasFactory;

    /**
     * @var array|\Illuminate\Contracts\Foundation\Application|\Illuminate\Http\Request|mixed|string
     */
    private $name;
    //Fillable Example
//    protected $fillable = ['name', 'email', 'phone', 'active'];
    //Guarded example
    protected $guarded = [];
    /**
     * @var mixed
     */


    protected static function newFactory()
    {
        return CustomerFactory::new();
    }




    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }
    public function scopeInactive($query)
    {
        return $query->where('active', 0);
    }

    public function company(){
        return $this->belongsTo(Company::class);
    }

    protected $attributes = [
        'active' => 0
    ];

//    public function getActiveAttribute($attribute){
//
//        return [
//            0=>'Inactive',
//            1=>'Active'
//        ][$attribute];
//    }

    public function getActiveAttribute($attribute){
        return $this->activeOptions()[$attribute];
    }

    public function activeOptions(){
        return [
            0=>'Inactive',
            1=>'Active',
            2=>'In-Progress'
        ];
    }
}

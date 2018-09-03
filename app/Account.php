<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $table = 'account';

    public $timestamps = false;
    
    protected $fillable = [
        'user_name',
        'password',
    ];

    public function person()
    {
        return $this->hasOne(Person::class, 'account_id');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cooked extends Model
{
    protected $table = 'cooked';
    public $timestamps = false;
    
    protected $fillable = [
        'person_id',
        'recipe_id'
    ];
}

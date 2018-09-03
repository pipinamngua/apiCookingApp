<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Owned extends Model
{
    protected $table = 'owned';
    public $timestamps = false;

    protected $fillable = [
        'person_id',
        'recipe_id',
    ];
}

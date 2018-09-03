<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    protected $table = 'recipe';

    protected $fillable = [
        'category',
        'description',
        'image',
        'name',
        'create_date',
        'level',
        'time',
    ];

    public function ownedPersons()
    {
        return $this->belongsToMany(Person::class, 'owned', 'recipe_id', 'person_id');
    }

    public function favoritePersons()
    {
        return $this->belongsToMany(Person::class, 'favorite', 'recipe_id', 'person_id');
    }

    public function cookedPersons()
    {
        return $this->belongsToMany(Person::class, 'cooked', 'recipe_id', 'person_id');
    }

    public function commentPersons()
    {
        return $this->belongsToMany(Person::class, 'comment', 'recipe_id', 'person_id');
    }

    public function steps()
    {
        return $this->hasMany(Step::class, 'recipe_id');
    }

    public function materials()
    {
        return $this->hasMany(Material::class, 'recipe_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'recipe_id');
    }
}

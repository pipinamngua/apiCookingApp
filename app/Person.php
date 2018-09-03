<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $table = 'person';
    protected $fillable = [
        'name',
        'image',
        'email',
        'user_id'
    ];

    public function account()
    {
        return $this->belongsTo(Account::class, 'account_id');
    }

    public function ownedRecipes()
    {
        return $this->belongsToMany(Recipe::class, 'owned', 'person_id', 'recipe_id');
    }

    public function favoriteRecipes()
    {
        return $this->belongsToMany(Recipe::class, 'favorite', 'person_id', 'recipe_id');
    }

    public function cookedRecipes()
    {
        return $this->belongsToMany(Recipe::class, 'cooked', 'person_id', 'recipe_id');
    }

    public function commentRecipes()
    {
        return $this->belongsToMany(Recipe::class, 'comment', 'person_id', 'recipe_id');
    }
}

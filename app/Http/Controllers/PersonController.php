<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Person;

class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getRecipePerson(Request $request)
    {
        if ($request->person_id != "") {
            $recipes = Person::where('id', $request->person_id)->with('ownedRecipes')->get()->toArray();

            return response()->json([ 'result' => $recipes[0]['owned_recipes'] ]);
        } else {
            return response()->json([ 'result' => false ]);
        }
    }


    public function getFavoriteRecipePerson(Request $request)
    {
        if ($request->person_id != "") {
            $recipes = Person::where('id', $request->person_id)->with('favoriteRecipes')->get()->toArray();

            return response()->json([ 'result' => $recipes[0]['favorite_recipes'] ]);
        } else {
            return response()->json([ 'result' => false ]);
        }
    }

    public function getCookedRecipePerson(Request $request)
    {
        if ($request->person_id != "") {
            $recipes = Person::where('id', $request->person_id)->with('cookedRecipes')->get()->toArray();

            return response()->json([ 'result' => $recipes[0]['cooked_recipes'] ]);
        } else {
            return response()->json([ 'result' => false ]);
        }
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Recipe;
use DB;

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCategory()
    {
        $categories = DB::table('recipe')->select('category')->distinct()->get();

        return response()->json([ 'result' => $categories ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getRecipeCategory(Request $request)
    {
    
        if ($request->has('category') && $request->get('category') != "") {
            $category = $request->get('category');
            $recipes = Recipe::where('category', '=', $category)->get();

            return response()->json([ 'result' => $recipes]);
        }
    }

    public function getCommentRecipe(Request $request)
    {
        $comment = Recipe::findOrFail($request->recipe_id)->comments()->get()->toArray();

        return response()->json($comment);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function getDetailRecipe(Request $request)
    {
        $recipe = Recipe::findOrFail($request->id);

        return response()->json($recipe);
    }

    public function getTopTenRecipe()
    {
        $topTen = DB::table('comment')
                    ->select('recipe.id', 'recipe.name', \DB::raw("SUM(rate) AS total_rate"))
                    ->join('recipe', 'recipe.id', '=', 'comment.recipe_id')
                    ->orderBy('total_rate', 'desc')
                    ->groupBy('recipe.id')
                    ->take(2)
                    ->get();

        return response()->json($topTen);
    }
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

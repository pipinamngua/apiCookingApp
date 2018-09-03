<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        if ($request->person_id != "" && $request->recipe_id != "" && $request->rate != "" && $request->comment != "") {
            $comment = Comment::create([
                'person_id' => $request->person_id,
                'recipe_id' => $request->recipe_id,
                'rate' => $request->rate,
                'comment' => $request->comment,
            ]);

            if ($comment) {
                return response()->json([ 'result' => true ]);
            } else {
                return response()->json([ 'result' => false ]);
            }
        } else {
            return response()->json([ 'result' => false ]);
        }
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
    public function update(Request $request)
    {
        $comment = Comment::findOrFail($request->id);

        $comment->rate = $request->rate;
        $comment->comment = $request->comment;

        if ($comment->save()) {
            return response()->json([ 'result' => true ]);
        } else {
            return response()->json([ 'result' => false ]);
        };
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $comment = Comment::findOrFail($request->id);

        if ($comment->delete()) {
            return response()->json([ 'result' => true ]);
        } else {
            return response()->json([ 'result' => false ]);
        };
    }
}

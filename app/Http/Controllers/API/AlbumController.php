<?php

namespace App\Http\Controllers\API;

use App\Models\Album;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller; 
use App\Http\Requests\AlbumRequest;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(request $request)
    {
      $per_page =$request->get('per_page',25);
      $albums=Album::paginate($per_page);
      
      return response()->json($albums);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $album= Album::create($request->all());
        return response()->json([
            'status'=>200,
            'album'=>$album
        ],200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
     $album=Album::findOrFail($id);
     return response()->json([
        'status'=>200,
        'album'=>$album
     ],200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $album =Album::findOrFail($id);
        $album->update($request->all());
        return response()->json($album);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $album =Album::findOrFail($id);
        $album->delete();
        return response()->json([
            'status'=>201,
            'message' => "Successfully deleted album"
        ],201);
    }
}

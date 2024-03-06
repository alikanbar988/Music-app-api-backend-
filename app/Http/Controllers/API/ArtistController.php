<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ArtistRequest;
use App\Models\Artist;



class ArtistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(request $request)
    {
        $per_page =$request->get('per_page',25);
        $artists=Artist::paginate($per_page);
        return response()->json($artists);
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
        
        $artist=Artist::create($request->all());
        return response()->json([
            'status'=>201,
            'artist'=>$artist
        ],201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $artist=Artist::findOrFail($id);
        return response()->json([
            'status'=>201,
            'artist'=>$artist
        ],201);
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
    public function update(ArtistRequest $request, string $id)
    {
        $artist=Artist::findOrFail($id);
        $artist->update($request->all());
        return response()->json([
            'status'=>201,
            'artist'=>$artist
        ],201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $artist=Artist::findOrFail($id);
        $artist->delete();
        return response()->json([
            'status'=>'200',
            'message'=>'Artist Deleted '
        ],200);
    }
}

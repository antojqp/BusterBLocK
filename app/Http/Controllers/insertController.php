<?php

namespace App\Http\Controllers;

use App\Movie;
use Illuminate\Http\Request;

class insertController extends Controller
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
        return view('insert');
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
        $this->validate($request,[
        'name'  => 'required',
        'info'  => 'required',
        'img'   => 'image|nullable|max:1999',
         ]);
        $data = $request->all();
        if($request->hasFile('img')){
            // Get filename with the extension
            $filenameWithExt = $request->file('img')->getClientOriginalName();
            // Get just filename
            $filename       = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension      = $request->file('img')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path           = $request->file('img')->storeAs('public/images/', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }
        Movie::create([
            'name'  => $data['name'],
            'info'  => $data['info'],
            'img'   => $fileNameToStore,
        ]);
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function show(Movie $movies)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function edit(Movie $movie, $modify)
    {   
        $movie = Movie::all()->where('id', '=', $modify)->first();
        
        return view('updateDel', ['movie' => $movie]);
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Movie $movie, $modify)
    {
        //
        $this->validate($request,[
            'name'  => 'required',
            'info'  => 'required',
            'img'   => 'image|nullable|max:1999',
             ]);
        $data = $request->all();
        if($request->hasFile('img')){
            // Get filename with the extension
            $filenameWithExt = $request->file('img')->getClientOriginalName();
            // Get just filename
            $filename       = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension      = $request->file('img')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path           = $request->file('img')->storeAs('public/images/', $fileNameToStore);
        } else {
            $fileNameToStore = $data['old'];
        }
        $change = Movie::find($modify);
        $change->name   = $data['name'];
        $change->info   = $data['info'];
        $change->img    = $fileNameToStore;
        $change->save();

        return redirect('/');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Movie $movie, $modify)
    {
        //
        $delete = Movie::find($modify);
        $delete->delete();
        return redirect('/');
    }
}

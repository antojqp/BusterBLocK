<?php

namespace App\Http\Controllers;
use App\Movie;
use App\Reserves;
use App\Http\Controllers\PhpmailerController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class reservesController extends Controller
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
        //
        $this->validate($request,[
            'reserUser' => 'required',
            'reserMov' => 'required',
             ]);
             $time = date("jnB");
            
            $data = $request->all();
            $code = $time .$data['reserMov'] . $data['reserUser'];
            Reserves::create([
                'reserUser' => $data['reserUser'],
                'reserMov' => $data['reserMov'],
                'reserCode' => $code,
            ]);
            $mail = new PhpmailerController();
            $mail->Mail(Auth::user()->email, $code);
            return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Reserves  $reserves
     * @return \Illuminate\Http\Response
     */
    public function show(Reserves $reserves, $movie)
    {
        //shows the description of the reservation that the user is going to do
        //in other words it shows the description of the movie
        
        $movie = Movie::all()->where('id', '=', $movie)->first();
        return view('movie', ['movie' => $movie]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Reserves  $reserves
     * @return \Illuminate\Http\Response
     */
    public function edit(Reserves $reserves, $user)
    {
        // this part will actually show the reserves in the user reserve page

        if(Auth::user()->level == 1){
            //check if the user is an admin
            $reserve = Reserves::all();
            $content = true;
            if ($reserve->isEmpty()) {
                # code...
                $content = false;
            }
           

        }elseif(Auth::user()->level == 0){
            //if the user is not an admin then verify if he is no trying to access another person's reserves
            if ($user != Auth::user()->id) {
                return redirect('/');
            }else{
                $reserve = Reserves::all()->where('reserUser', '=', Auth::user()->id);
                $content = true;
                if ($reserve->isEmpty()) {
                //if the reserves are empty then just send an error message
                    $content = false;
                }//end if
                

            }//end if
        }//end big if
        return view('reserves', compact('reserve', 'content'));
    }//end function

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Reserves  $reserves
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reserves $reserves)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Reserves  $reserves
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reserves $reserves, $reservation)
    {
        //
        $destroy = Reserves::find($reservation);
        $destroy->delete();
        return redirect('/reserve/' . Auth::user()->id . '/edit' );
    }
}

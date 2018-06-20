<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Jeux;
use App\Models\Plateforme;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class JeuxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jeux = Jeux::all();
        $categorie = Category::all();

        return view('jeux.index',compact('jeux','categorie'));
    }

    public function categJeux($id){
        $idCateg = $id;
        $jeux = Jeux::where('idCategorie',$idCateg)->get();
        $categorie = Category::all();

        return view('jeux.index',compact('jeux','categorie'));

    }
    public function sell(){
        $jeux = Jeux::where('state','vendre')->get();
        return view('jeux.achat.index',compact('jeux'));
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
    public function achatJeux($id){
        $idJeux = $id;
        return view('jeux.achat.achat');

    }
    public function validatesell(Request $request){
         $id = Auth::id();
        request()->validate([
            'age' => 'required',
            'adresse' => 'required',
            'rue' => 'required',

        ]);
        $user = User::withTrashed()->find($id);
        $user->adresse = $request->adresse;
        $user->age = $request->age;
        $user->rue = $request->rue;
        $user->appart = $request->appart;
        $user->save();

    }
}

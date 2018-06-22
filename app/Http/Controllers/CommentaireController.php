<?php

namespace App\Http\Controllers;

use App\Models\Commentaire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class CommentaireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $commentaire = Commentaire::all();
        return view('commentaires.index',compact('commentaire'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('commentaires.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'contenu' => 'required',

        ]);

        $commentaire = new Commentaire();
        $commentaire->contenu = $request->contenu;
        $commentaire->idUser = Auth::id();
        $commentaire->idJeux = $request->jeux;
        $commentaire->position = 1;
        $commentaire->save();
        return redirect()->route('commentaires.index')->with('response','Commentaire a bien été ajouter');    }

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

        $commentaire = Commentaire::withTrashed()->find($id);
        if(!$commentaire instanceof Commentaire)
        {
            return redirect()->route('avis.index');
        }
        if(!$commentaire->trashed()){

            $commentaire->delete();
            return redirect()->route('avis.index')->with('response','Commentaire a bien été désactiver ');
        }else{
            $commentaire->restore();
            return redirect()->route('avis.index')->with('response','Commentaire a bien été restaurer');
        }    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Avi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;


class AvisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $avis = Avi::withTrashed()->get();
        return view('avis.index',compact('avis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('avis.add');
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
            'titre' => 'required|min:3',
            'contenu' => 'required',
            'note' => 'required|numeric',

        ]);

        $avis = new Avi();
        $avis->titre = $request->titre;
        $avis->note = $request->note;
        $avis->contenu = $request->contenu;
        $avis->idUser = Auth::id();
        $avis->idJeux = $request->jeux;
        $avis->save();
        return redirect()->route('avis.index')->with('response','Avis a bien été ajouter');

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
        $avis = Avi::withTrashed()->find($id);
        return view('avis.edit',compact('avis'));
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
        request()->validate([
            'titre' => 'required|min:3',
            'contenu' => 'required',
            'note' => 'required|numeric|between:0,5',

        ]);
        $avis = Avi::withTrashed()->find($id);
        $avis->titre = $request->titre;
        $avis->note = $request->note;
        $avis->contenu = $request->contenu;
        $avis->idUser = Auth::id();
        $avis->save();
        return redirect()->route('avis.index')->with('response','Avis a bien été modifier');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $avis = Avi::withTrashed()->find($id);
        if(!$avis instanceof Avi)
        {
            return redirect()->route('avis.index');
        }
        if(!$avis->trashed()){

            $avis->delete();
            return redirect()->route('avis.index')->with('response','Avis a bien été désactiver ');
        }else{
            $avis->restore();
            return redirect()->route('avis.index')->with('response','Avis a bien été restaurer');
        }
    }


}

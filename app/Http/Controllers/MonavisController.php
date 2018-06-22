<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Avi;
use Illuminate\Support\Facades\Auth;

class MonavisController extends Controller
{
    public function index()
    {
        $user =  Auth::id();
        $avis = Avi::withTrashed()->where('idUser',$user)->get();
        return view('avis.monAvis.index',compact('avis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('avis.monAvis.add');
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
        return redirect()->route('monavis.index')->with('response','Avis a bien été ajouter');

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
        return view('avis.monAvis.edit',compact('avis'));
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
        return redirect()->route('monavis.index')->with('response','Avis a bien été modifier');

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
            return redirect()->route('monavis.index');
        }
        if(!$avis->trashed()){

            $avis->delete();
            return redirect()->route('monavis.index')->with('response','Avis a bien été désactiver ');
        }else{
            $avis->restore();
            return redirect()->route('monavis.index')->with('response','Avis a bien été restaurer');
        }
    }


}

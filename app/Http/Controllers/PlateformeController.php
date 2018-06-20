<?php

namespace App\Http\Controllers;

use App\Models\Plateforme;
use Illuminate\Http\Request;

class PlateformeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $plateformes = Plateforme::withTrashed()->get();
        return view('plateformes.index',compact('plateformes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('plateformes.add');

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
            'nom' => 'required|min:3',

        ]);
        $plateformes = new Plateforme();
        $plateformes->nom = $request->nom;
        $plateformes->save();
        return redirect()->route('plateformes.index')->with('response','Plateforme a bien été ajouter');
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
        $plateforme = Plateforme::withTrashed()->find($id);
        return view('plateformes.edit',compact('plateforme'));
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
            'nom' => 'required|min:3',

        ]);
        $plateforme = Plateforme::withTrashed()->find($id);
        $plateforme->nom = $request->nom;

        $plateforme->save();
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
        $plateforme = Plateforme::withTrashed()->find($id);
        if(!$plateforme instanceof Plateforme)
        {
            return redirect()->route('plateformes.index');
        }
        if(!$plateforme->trashed()){

            $plateforme->delete();
            return redirect()->route('plateformes.index')->with('response','Plateforme a bien été désactiver ');
        }else{
            $plateforme->restore();
            return redirect()->route('plateformes.index')->with('response','Plateforme a bien été restaurer');
        }
    }
}

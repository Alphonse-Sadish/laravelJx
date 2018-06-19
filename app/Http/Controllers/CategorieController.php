<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::withTrashed()->get();
        return view('categories.index',compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.add');

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
            'couleur' => 'required',

        ]);
        $categories = new Category();
        $categories->titre = $request->titre;
        $categories->couleur = $request->couleur;

        $categories->save();
        return redirect()->route('categories.index')->with('response','Categorie a bien été ajouter');
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
        $categories = Category::withTrashed()->find($id);
        return view('categories.edit',compact('categories'));
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
            'couleur' => 'required',

        ]);
        $categories = Category::withTrashed()->find($id);
        $categories->titre = $request->titre;
        $categories->couleur = $request->couleur;

        $categories->save();
        return redirect()->route('categories.index')->with('response','Categorie a bien été modifier');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categorie = Category::withTrashed()->find($id);
        if(!$categorie instanceof Category)
        {
            return redirect()->route('categories.index');
        }
        if(!$categorie->trashed()){

            $categorie->delete();
            return redirect()->route('categories.index')->with('response','categorie a bien été désactiver ');
        }else{
            $categorie->restore();
            return redirect()->route('categories.index')->with('response','categorie a bien été restaurer');
        }
    }
}

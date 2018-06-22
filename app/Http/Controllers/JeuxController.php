<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Commentaire;
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



    public function achatJeux($idj){
        return view('jeux.achat.achat',compact('idj'));

    }
    public function validatesell(Request $request,$idJeux){
         $id = Auth::id();
        request()->validate([
            'age' => 'required|numeric',
            'adresse' => 'required',
            'rue' => 'required',

        ]);
        $user = User::withTrashed()->find($id);
        $user->adresse = $request->adresse;
        $user->age = $request->age;
        $user->rue = $request->rue;
        $user->appart = $request->appart;
        $user->save();



        $Jeux = Jeux::find($idJeux);
        $idJeuxprice = $Jeux->prix;
        $idJeuxNom = $Jeux->nom;
        return view('dons.achat',compact('idJeuxprice','idJeuxNom'));
    }
    public function jeux(){
        $jeux = Jeux::all();
        $categorie = Category::all();

        return view('jeux.index',compact('jeux','categorie'));
    }
    public function add(){
        return view('jeux.add');

    }
    public function storeJeux(Request $request){
        request()->validate([
            'nom' => 'required',
            'description' => 'required',
            'prix' => 'numeric'
        ]);

        $jeux = new Jeux();
        $jeux->nom = $request->nom;
        $jeux->description = $request->description;
        $jeux->state = $request->state;
        $jeux->idCategorie = $request->idCategorie;
        $jeux->idPlateforme = $request->idPlateforme;
        $jeux->prix = $request->prix;


        $jeux->save();

        return url('/jeux');



    }

}

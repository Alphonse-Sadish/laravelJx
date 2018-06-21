<?php

namespace App\Http\Controllers;

use App\Models\Match;
use App\Models\MatchParticipant;
use App\Models\Tournoi;
use App\Models\TournoiParticipant;
use App\Models\User;
use Illuminate\Http\Request as Request;
use Illuminate\Http\Response as Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TournoiController extends Controller
{

    /**
     * Affiche un tournoi
     *
     * @param Request $request
     * @param mixed $id
     * @return Response
     */
    public function show(Request $request, $id){
        $tournoi = Tournoi::find($id);
        return view('tournoi/show', ['tournoi'=>$tournoi]);
    }

    /**
     * Affiche les tournois
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request){
        $tournois = Tournoi::all();
        return view('tournoi/index', ['tournois'=>$tournois]);
    }

    /**
     * Créer un tournoi
     * @param Request $request
     * @return Response
     */
    public function create(Request $request){
        return view('tournoi/create');

    }

    /**
     * Créer un tournoi
     * @param Request $request
     * @return Response
     */
    public function add(Request $request){
        $tournoi = new Tournoi();
        $tournoi->name = $request->name;
        $tournoi->nb_participants = $request->participant;

        $tournoi->createur_id = Auth::id();
        $tournoi->save();

        return redirect('tournoi/index');
    }

    /**
     * Participer à un tournoi
     *
     * @param Request $request
     * @param mixed $id
     * @return Response
     */
    public function participe(Request $request, $id){
        $tournoi_participe = new TournoiParticipant();
        $tournoi_participe->tournoi_id = $id;
        $tournoi_participe->participant_id = Auth::id();
        $tournoi_participe->save();
        $sql = DB::table('tournoi_participants')->where('tournoi_id', '=', $id)->get()->toArray();
        $tournoi = Tournoi::find($id);
        if (count($sql) == $tournoi->nb_participants){
            $length = count($sql);
            for($i=0; $i < (count($sql)/2); $i++){
                $match = new Match();
                $match->tournoi_id = $tournoi->id;
                $match->stade = $length.'ème';
                $match->save();
                $indice = rand(0,($length-$i*2-1));
                $participant = $sql[$indice];
                $match_participant = new MatchParticipant();
                $match_participant->participant_id = $participant->participant_id;
                $match_participant->match_id = $match->id;
                $match_participant->save();
                $indice = rand(0,($length-$i*2-2));
                $participant = $sql[$indice];
                $match_participant = new MatchParticipant();
                $match_participant->participant_id = $participant->participant_id;
                $match_participant->match_id = $match->id;
                $match_participant->save();
            }
        }
        return redirect('tournoi/index');
    }

}

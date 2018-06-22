<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 20 Jun 2018 09:08:03 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class User
 * 
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $adresse
 * @property int $age
 * @property string $rue
 * @property string $appart
 * @property int $idJeux
 * @property int $idPlateforme
 * @property string $role
 * @property string $remember_token
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property \Carbon\Carbon $delete_at
 * 
 * @property \App\Models\Jeux $jeux
 * @property \App\Models\Plateforme $plateforme
 * @property \Illuminate\Database\Eloquent\Collection $avis
 * @property \Illuminate\Database\Eloquent\Collection $commentaires
 * @property \Illuminate\Database\Eloquent\Collection $match_participants
 * @property \Illuminate\Database\Eloquent\Collection $messages
 * @property \Illuminate\Database\Eloquent\Collection $tournois
 * @property \Illuminate\Database\Eloquent\Collection $tournoi_participants
 *
 * @package App\Models
 */
class User extends Eloquent
{
	protected $casts = [
		'age' => 'int',
		'idJeux' => 'int',
		'idPlateforme' => 'int'
	];

	protected $dates = [
		'delete_at'
	];

	protected $hidden = [
		'password',
		'remember_token'
	];

	protected $fillable = [
		'name',
		'email',
		'password',
		'adresse',
		'age',
		'rue',
		'appart',
		'idJeux',
		'idPlateforme',
		'role',
		'remember_token',
		'delete_at'
	];

	public function jeux()
	{
		return $this->belongsTo(\App\Models\Jeux::class, 'idJeux');
	}

	public function plateforme()
	{
		return $this->belongsTo(\App\Models\Plateforme::class, 'idPlateforme');
	}

	public function avis()
	{
		return $this->hasMany(\App\Models\Avi::class, 'idUser');
	}

	public function commentaires()
	{
		return $this->hasMany(\App\Models\Commentaire::class, 'idUser');
	}

	public function match_participants()
	{
		return $this->hasMany(\App\Models\MatchParticipant::class, 'participant_id');
	}

	public function messages()
	{
		return $this->hasMany(\App\Models\Message::class, 'idUser');
	}

	public function tournois()
	{
		return $this->hasMany(\App\Models\Tournoi::class, 'createur_id');
	}

	public function tournoi_participants()
	{
		return $this->hasMany(\App\Models\TournoiParticipant::class, 'participant_id');
	}
}

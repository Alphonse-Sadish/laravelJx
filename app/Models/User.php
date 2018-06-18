<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 30 May 2018 17:40:45 +0000.
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
 * @property int $idJeux
 * @property int $idPlateforme
 * @property string $remember_token
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Models\Jeux $jeux
 * @property \App\Models\Plateforme $plateforme
 * @property \Illuminate\Database\Eloquent\Collection $avis
 * @property \Illuminate\Database\Eloquent\Collection $commentaires
 * @property \Illuminate\Database\Eloquent\Collection $messages
 *
 * @package App\Models
 */
class User extends Eloquent
{
	protected $casts = [
		'idJeux' => 'int',
		'idPlateforme' => 'int'
	];

	protected $hidden = [
		'password',
		'remember_token'
	];

	protected $fillable = [
		'name',
		'email',
		'password',
		'idJeux',
		'idPlateforme',
		'remember_token'
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

	public function messages()
	{
		return $this->hasMany(\App\Models\Message::class, 'idUser');
	}
}

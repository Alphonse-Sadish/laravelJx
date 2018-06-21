<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 20 Jun 2018 09:08:03 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Plateforme
 * 
 * @property int $id
 * @property string $nom
 * @property string $couleur
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property \Carbon\Carbon $delete_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $jeuxes
 * @property \Illuminate\Database\Eloquent\Collection $users
 *
 * @package App\Models
 */
class Plateforme extends Eloquent
{
	protected $dates = [
		'delete_at'
	];

	protected $fillable = [
		'nom',
		'couleur',
		'delete_at'
	];

	public function jeuxes()
	{
		return $this->hasMany(\App\Models\Jeux::class, 'idPlateforme');
	}

	public function users()
	{
		return $this->hasMany(\App\Models\User::class, 'idPlateforme');
	}
}

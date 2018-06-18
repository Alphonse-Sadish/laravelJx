<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 30 May 2018 17:40:45 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Plateforme
 * 
 * @property int $id
 * @property string $nom
 * @property string $couleur
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $jeuxes
 * @property \Illuminate\Database\Eloquent\Collection $users
 *
 * @package App\Models
 */
class Plateforme extends Eloquent
{
    use SoftDeletes;
    public $timestamps = false;
    const DELETED_AT = 'delete_at';

	protected $fillable = [
		'nom',
		'couleur'
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

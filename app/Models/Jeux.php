<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 20 Jun 2018 09:08:03 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Jeux
 * 
 * @property int $id
 * @property string $nom
 * @property string $description
 * @property string $image
 * @property int $idCategorie
 * @property int $idPlateforme
 * @property string $state
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property \Carbon\Carbon $delete_at
 * @property int $prix
 * 
 * @property \App\Models\Category $category
 * @property \App\Models\Plateforme $plateforme
 * @property \Illuminate\Database\Eloquent\Collection $commentaires
 * @property \Illuminate\Database\Eloquent\Collection $users
 *
 * @package App\Models
 */
class Jeux extends Eloquent
{
	protected $table = 'jeux';

	protected $casts = [
		'idCategorie' => 'int',
		'idPlateforme' => 'int',
		'prix' => 'int'
	];

	protected $dates = [
		'delete_at'
	];

	protected $fillable = [
		'nom',
		'description',
		'image',
		'idCategorie',
		'idPlateforme',
		'state',
		'delete_at',
		'prix'
	];

	public function category()
	{
		return $this->belongsTo(\App\Models\Category::class, 'idCategorie');
	}

	public function plateforme()
	{
		return $this->belongsTo(\App\Models\Plateforme::class, 'idPlateforme');
	}

	public function commentaires()
	{
		return $this->hasMany(\App\Models\Commentaire::class, 'idJeux');
	}

	public function users()
	{
		return $this->hasMany(\App\Models\User::class, 'idJeux');
	}
}

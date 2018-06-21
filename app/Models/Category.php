<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 20 Jun 2018 09:08:03 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Category
 * 
 * @property int $id
 * @property string $titre
 * @property string $couleur
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property \Carbon\Carbon $delete_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $jeuxes
 *
 * @package App\Models
 */
class Category extends Eloquent
{
	protected $dates = [
		'delete_at'
	];

	protected $fillable = [
		'titre',
		'couleur',
		'delete_at'
	];

	public function jeuxes()
	{
		return $this->hasMany(\App\Models\Jeux::class, 'idCategorie');
	}
}

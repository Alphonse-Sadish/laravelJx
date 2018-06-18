<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 30 May 2018 17:40:45 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Category
 * 
 * @property int $id
 * @property string $titre
 * @property string $couleur
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $jeuxes
 *
 * @package App\Models
 */
class Category extends Eloquent
{
    use SoftDeletes;
    public $timestamps = false;
    const DELETED_AT = 'delete_at';

	protected $fillable = [
		'titre',
		'couleur'
	];

	public function jeuxes()
	{
		return $this->hasMany(\App\Models\Jeux::class, 'idCategorie');
	}
}

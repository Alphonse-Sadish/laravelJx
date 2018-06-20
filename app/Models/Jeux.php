<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 30 May 2018 17:40:45 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Jeux
 * 
 * @property int $id
 * @property string $nom
 * @property string $description
 * @property string $image
 * @property int $idCategorie
 * @property int $idPlateforme
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
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
    use SoftDeletes;
    public $timestamps = false;
    const DELETED_AT = 'delete_at';

	protected $table = 'jeux';

	protected $casts = [
		'idCategorie' => 'int',
		'idPlateforme' => 'int'
	];

	protected $fillable = [
		'nom',
		'description',
		'image',
		'idCategorie',
		'idPlateforme'
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
		return $this->hasMany(\App\User::class, 'idJeux');
	}
}

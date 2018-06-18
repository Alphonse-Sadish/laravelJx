<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 30 May 2018 17:40:45 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Commentaire
 * 
 * @property int $id
 * @property string $contenu
 * @property int $position
 * @property int $idJeux
 * @property int $idUser
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Models\Jeux $jeux
 * @property \App\Models\User $user
 *
 * @package App\Models
 */
class Commentaire extends Eloquent
{
	protected $casts = [
		'position' => 'int',
		'idJeux' => 'int',
		'idUser' => 'int'
	];

	protected $fillable = [
		'contenu',
		'position',
		'idJeux',
		'idUser'
	];

	public function jeux()
	{
		return $this->belongsTo(\App\Models\Jeux::class, 'idJeux');
	}

	public function user()
	{
		return $this->belongsTo(\App\Models\User::class, 'idUser');
	}
}

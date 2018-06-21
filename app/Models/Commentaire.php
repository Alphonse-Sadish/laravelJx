<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 20 Jun 2018 09:08:03 +0000.
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
 * @property \Carbon\Carbon $delete_at
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

	protected $dates = [
		'delete_at'
	];

	protected $fillable = [
		'contenu',
		'position',
		'idJeux',
		'idUser',
		'delete_at'
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

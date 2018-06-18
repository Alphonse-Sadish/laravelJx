<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 30 May 2018 17:40:45 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Avi
 * 
 * @property int $id
 * @property string $titre
 * @property string $contenu
 * @property int $note
 * @property int $idUser
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Models\User $user
 *
 * @package App\Models
 */
class Avi extends Eloquent
{
	protected $casts = [
		'note' => 'int',
		'idUser' => 'int'
	];

	protected $fillable = [
		'titre',
		'contenu',
		'note',
		'idUser'
	];

	public function user()
	{
		return $this->belongsTo(\App\Models\User::class, 'idUser');
	}
}

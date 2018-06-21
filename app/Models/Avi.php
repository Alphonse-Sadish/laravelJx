<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 20 Jun 2018 09:08:03 +0000.
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
 * @property \Carbon\Carbon $delete_at
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

	protected $dates = [
		'delete_at'
	];

	protected $fillable = [
		'titre',
		'contenu',
		'note',
		'idUser',
		'delete_at'
	];

	public function user()
	{
		return $this->belongsTo(\App\Models\User::class, 'idUser');
	}
}

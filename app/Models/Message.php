<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 20 Jun 2018 09:08:03 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Message
 * 
 * @property int $id
 * @property string $content
 * @property int $idUser
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property \Carbon\Carbon $delete_at
 * 
 * @property \App\Models\User $user
 *
 * @package App\Models
 */
class Message extends Eloquent
{
	protected $casts = [
		'idUser' => 'int'
	];

	protected $dates = [
		'delete_at'
	];

	protected $fillable = [
		'content',
		'idUser',
		'delete_at'
	];

	public function user()
	{
		return $this->belongsTo(\App\Models\User::class, 'idUser');
	}
}

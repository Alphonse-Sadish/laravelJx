<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 30 May 2018 17:40:45 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Message
 * 
 * @property int $id
 * @property string $content
 * @property int $idUser
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Models\User $user
 *
 * @package App\Models
 */
class Message extends Eloquent
{
    use SoftDeletes;
    public $timestamps = false;
    const DELETED_AT = 'delete_at';

	protected $casts = [
		'idUser' => 'int'
	];

	protected $fillable = [
		'content',
		'idUser'
	];

	public function user()
	{
		return $this->belongsTo(\App\Models\User::class, 'idUser');
	}
}

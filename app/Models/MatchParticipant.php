<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 20 Jun 2018 09:08:03 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class MatchParticipant
 * 
 * @property int $id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property int $match_id
 * @property int $participant_id
 * 
 * @property \App\Models\Match $match
 * @property \App\Models\User $user
 *
 * @package App\Models
 */
class MatchParticipant extends Eloquent
{
	protected $casts = [
		'match_id' => 'int',
		'participant_id' => 'int'
	];

	protected $fillable = [
		'match_id',
		'participant_id'
	];

	public function match()
	{
		return $this->belongsTo(\App\Models\Match::class);
	}

	public function user()
	{
		return $this->belongsTo(\App\Models\User::class, 'participant_id');
	}
}

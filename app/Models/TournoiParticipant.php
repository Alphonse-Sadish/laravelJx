<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 20 Jun 2018 09:08:03 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TournoiParticipant
 * 
 * @property int $id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property int $tournoi_id
 * @property int $participant_id
 * 
 * @property \App\Models\User $user
 * @property \App\Models\Tournoi $tournoi
 *
 * @package App\Models
 */
class TournoiParticipant extends Eloquent
{
	protected $casts = [
		'tournoi_id' => 'int',
		'participant_id' => 'int'
	];

	protected $fillable = [
		'tournoi_id',
		'participant_id'
	];

	public function user()
	{
		return $this->belongsTo(\App\Models\User::class, 'participant_id');
	}

	public function tournoi()
	{
		return $this->belongsTo(\App\Models\Tournoi::class);
	}
}

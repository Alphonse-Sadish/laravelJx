<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 20 Jun 2018 09:08:03 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Match
 * 
 * @property int $id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $stade
 * @property int $tournoi_id
 * 
 * @property \App\Models\Tournoi $tournoi
 * @property \Illuminate\Database\Eloquent\Collection $match_participants
 *
 * @package App\Models
 */
class Match extends Eloquent
{
	protected $table = 'match';

	protected $casts = [
		'tournoi_id' => 'int'
	];

	protected $fillable = [
		'stade',
		'tournoi_id'
	];

	public function tournoi()
	{
		return $this->belongsTo(\App\Models\Tournoi::class);
	}

	public function match_participants()
	{
		return $this->hasMany(\App\Models\MatchParticipant::class);
	}
}

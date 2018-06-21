<?php

/**
 * Created by Reliese Model.
 * Date: Wed, 20 Jun 2018 09:08:03 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Tournoi
 * 
 * @property int $id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $name
 * @property int $createur_id
 * 
 * @property \App\Models\User $user
 * @property \Illuminate\Database\Eloquent\Collection $matches
 * @property \Illuminate\Database\Eloquent\Collection $tournoi_participants
 *
 * @package App\Models
 */
class Tournoi extends Eloquent
{
	protected $table = 'tournoi';

	protected $casts = [
		'createur_id' => 'int'
	];

	protected $fillable = [
		'name',
		'createur_id',
        'nb_participants'
	];

	public function user()
	{
		return $this->belongsTo(\App\Models\User::class, 'createur_id');
	}

	public function matches()
	{
		return $this->hasMany(\App\Models\Match::class);
	}

	public function tournoi_participants()
	{
		return $this->hasMany(\App\Models\TournoiParticipant::class);
	}
}

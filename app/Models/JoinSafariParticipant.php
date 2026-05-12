<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JoinSafariParticipant extends Model
{
    protected $fillable = [
        'join_safari_id',
        'name',
        'email',
        'phone',
        'country',
        'number_of_people',
        'special_requests',
        'is_confirmed',
    ];

    protected $casts = [
        'is_confirmed' => 'boolean',
        'number_of_people' => 'integer',
    ];

    public function joinSafari()
    {
        return $this->belongsTo(JoinSafari::class);
    }
}

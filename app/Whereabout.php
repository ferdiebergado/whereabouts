<?php

namespace App;

use App\BaseModel;

class Whereabout extends BaseModel
{
    protected $fillable = [
        'activity',
        'venue',
        'sponsor',
        'start_date',
        'end_date',
        'user_id'
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

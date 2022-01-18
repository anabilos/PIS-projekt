<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    /**
     * [$table description]
     * @var string
     */
    protected $table = 'events';

    /**
     * [$fillable description]
     * @var [type]
     */
    protected $fillable = [
        'title', 'start', 'color','user_id',
    ];
    public function user()
    {
      return $this->belongsTo(User::class);
    }
  
}
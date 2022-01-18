<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Child extends Model
{
    use HasFactory;
    protected $child= 'children';
    protected $fillable = [
        'firstName',
        'lastName',
        'education',
        'age',
        'user_id'
        
    ];

    public function user()
    {
      return $this->belongsTo(User::class);
    }
   
    public function tasks()
    {
      return $this->hasMany('App\Models\Task');
    }
}

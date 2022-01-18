<?php

namespace App\Models;

use App\Http\Traits\TasksTrait;
use App\Http\Traits\TimestampsTrait;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
	use TimestampsTrait;
	use TasksTrait;

	public function getDates() {
		return ['created_at', 'updated_at', 'due_date','finished_at'];
	}
	
    // Define the table
    protected $table = 'tasks';
    protected $fillable = [
        'tasks','user_id','picture','periodic_nonperiodic','child_id',
         
       ];

    public function user()
{
  return $this->belongsTo(User::class);
}
public function child()
{
  return $this->belongsTo(Child::class);
}
}
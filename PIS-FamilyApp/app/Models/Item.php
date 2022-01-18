<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $item= 'items';
    protected $fillable = [
        'name',
        'quantity',
        'user_id',
        
    ];

    public function user()
    {
      return $this->belongsTo(User::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    protected $table = 'messages';
    protected $fillable = ['message', 'room_id', 'username'];
}

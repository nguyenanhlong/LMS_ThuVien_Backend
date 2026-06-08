<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = ['id', 'title', 'message', 'type', 'date', 'isRead'];
    protected $casts = ['isRead' => 'boolean'];
}

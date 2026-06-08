<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = ['id', 'bookCode', 'readerName', 'email', 'phone', 'notifyMethod', 'notes', 'status', 'date'];
    
}

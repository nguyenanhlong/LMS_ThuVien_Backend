<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = ['id', 'readerId', 'readerName', 'date', 'due', 'status', 'books'];
    protected $casts = ['books' => 'array'];
}

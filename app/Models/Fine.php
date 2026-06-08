<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fine extends Model
{
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = ['id', 'loanId', 'readerId', 'readerName', 'amount', 'reason', 'status', 'date'];
    protected $casts = ['amount' => 'integer'];
}

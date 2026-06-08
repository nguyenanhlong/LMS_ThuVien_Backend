<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = ['id', 'name', 'contact', 'phone', 'email', 'books', 'status'];
    protected $casts = ['books' => 'integer'];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    public $incrementing = false;
    protected $table = 'account';
    protected $primaryKey = 'acc';
    protected $keyType = 'string';
    protected $fillable = ['acc', 'password', 'name',];
}

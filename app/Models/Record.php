<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    protected $table = 'record';
    protected $primaryKey = 'acc';
    protected $keyType = 'string';
    protected $fillable = ['acc', 'target', 'date',];
}

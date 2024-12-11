<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Target extends Model
{
    protected $table = 'target';
    protected $primaryKey = 'acc';
    protected $keyType = 'string';
}

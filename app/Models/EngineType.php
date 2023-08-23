<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EngineType extends Model
{
    protected $table = 'engine_type';

    protected $fillable = ['id', 'engine_type', 'updated_at', 'created_at'];
}

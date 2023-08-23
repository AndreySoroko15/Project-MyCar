<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BodyType extends Model
{
    protected $table = 'body_type';

    protected $fillable = ['id', 'body_type', 'updated_at', 'created_at'];
}

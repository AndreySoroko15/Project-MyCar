<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DriveSystem extends Model
{
    protected $table = 'drive_system';

    protected $fillable = ['id', 'drive_system', 'updated_at', 'created_at'];
}

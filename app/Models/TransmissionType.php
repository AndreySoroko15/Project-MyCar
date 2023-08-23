<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransmissionType extends Model
{
    protected $table = 'transmission_type';

    protected $fillable = ['id', 'transmission_type', 'updated_at', 'created_at'];
}

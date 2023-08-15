<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    // используется в моделях Eloquent для определения списка атрибутов, которые не должны быть массово назначены (mass assignable). Когда значение $guarded установлено на false, это означает, что все атрибуты модели могут быть массово назначены и сохранены.
    protected $guarded = false; //по факту то ж самое, что если бы перечислял поля в $fillable 
}

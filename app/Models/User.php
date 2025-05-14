<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{
    use HasFactory, HasRoles;

    //CAMPOS DE LA TABLA USER EN LA BASE DE DATOS
    protected $fillable = [
        'name',
        'correo',
        'password',
        'roles_id'
    ];

    //ENCRIPTAR LA CONTRASEÑA
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }


    public function tasks()
    {
        // Esta función define una relación de "uno a muchos" (hasMany)
        // entre el modelo actual (por ejemplo, User) y el modelo Task.
        // Es decir, UN usuario tiene MUCHAS tareas (tasks).
        return $this->hasMany(Task::class);
    }
}

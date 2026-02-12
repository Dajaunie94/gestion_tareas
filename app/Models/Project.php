<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
   

     protected $fillable = [
        'name',
        'description'
    ];

    //Funciones de relacion con Proyect
        public function users()
    {
        return $this->belongsToMany(User::class)
                    ->withPivot('rate')
                    ->withTimestamps();
    }

     //Funciones de relacion con Proyect
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

}

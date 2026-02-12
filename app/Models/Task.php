<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{

   protected $fillable = [
        'title',
        'description',
        'project_id',
        'user_id',
        'hours', 
    ];

     //Funciones de relacion con Task
    public function user()
    {
        return $this->belongsTo(User::class);
    }

     //Funciones de relacion con Task
    public function project()
    {
        return $this->belongsTo(Project::class);
    }

}

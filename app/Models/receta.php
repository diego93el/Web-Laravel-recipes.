<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class receta extends Model
{
    public $timestamps=false;
    use HasFactory;
    use Searchable;

    public function toSearchableArray()
    {
        return [
            'nombre' => $this->nombre,
            'instrucion' => $this->instrucion,
            'ingrediente_id' => $this->ingrediente_id,
            'tiempo'=>$this->tiempo,
            

            
        
        ];
    }
    public function dificultade()
    {
        return $this->hasOne('App\Models\Dificultade', 'id', 'dificultad_id');
    }
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }
}

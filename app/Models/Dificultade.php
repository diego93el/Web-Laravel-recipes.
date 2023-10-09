<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Dificultade
 *
 * @property $id
 * @property $nombre
 *
 * @property Receta[] $recetas
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Dificultade extends Model
{
  public $timestamps=false;
    static $rules = [
		'nombre' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function recetas()
    {
        return $this->hasMany('App\Models\Receta', 'dificultad_id', 'id');
    }
    

}

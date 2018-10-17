<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Presenters\MessagePresenter;

class Message extends Model
{
    //esto es para cuando la table tiene otro nombre
    //protected $table = 'nombre_de_mi_tabla';
    protected $fillable = ['nombre', 'email', 'mensaje'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function note()
    {
        return $this->morphOne(Note::class, 'notable');
    }

    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }

    public function present()
    {
        return new MessagePresenter($this);
    }

}

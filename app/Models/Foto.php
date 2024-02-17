<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foto extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function album(){
        return $this->belongsTo(Album::class, 'album_id');
    }

    public function komentar_foto(){
        return $this->hasMany(KomentarFoto::class, 'foto_id');
    }

    public function like_foto(){
        return $this->hasMany(LikeFoto::class, 'foto_id');
    }
}

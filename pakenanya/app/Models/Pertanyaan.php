<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pertanyaan extends Model
{
    protected $table = "pertanyaan";
    protected $fillable = ["pertnyaan", "gambar", "kategori_id", 'user_id'];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function jawaban()
    {
        return $this->hasMany(Jawaban::class, 'pertanyaan_id');
    }


}

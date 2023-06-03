<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jawaban extends Model
{
    protected $table = 'jawaban';
    
    protected $fillable = ['jawaban', 'pertanyaan_id', 'user_id'];

    public function pertanyaan()
    {
        return $this->belongsTo(Pertanyaan::class, 'pertanyaan_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }


}

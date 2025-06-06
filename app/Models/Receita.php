<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receita extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'descricao',
        'ingredientes',
        'modo_preparo',
        'user_id', // autor da receita
    ];

    /**
     * A receita pertence a um usuário (autor).
     */
    public function autor()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Usuários que favoritaram essa receita.
     */
    public function favoritadoPor()
    {
        return $this->belongsToMany(User::class, 'favorites')->withTimestamps();
    }
}

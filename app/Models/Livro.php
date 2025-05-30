<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Livro extends Model
{
    use HasFactory;

    protected $primaryKey = 'codi';
    public $incrementing = false;
    protected $keyType = 'integer';

    protected $fillable = [
        'codi',
        'titulo',
        'editora',
        'edicao',
        'ano_publicacao'
    ];

    public function autores(): BelongsToMany
    {
        return $this->belongsToMany(Autor::class, 'livro_autor', 'livro_codi', 'autor_cod_au');
    }

    public function assuntos(): BelongsToMany
    {
        return $this->belongsToMany(Assunto::class, 'livro_assunto', 'livro_codi', 'assunto_cod_as');
    }
}

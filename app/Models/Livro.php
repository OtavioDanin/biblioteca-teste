<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Livro extends Model
{
    use HasFactory;

    protected $primaryKey = 'codl';
    public $incrementing = true;
    protected $keyType = 'integer';
    
    protected $table = 'livros';

    protected $fillable = [
        'codl',
        'titulo',
        'valor',
        'editora',
        'edicao',
        'ano_publicacao'
    ];

    public function autores(): BelongsToMany
    {
        return $this->belongsToMany(Autor::class, 'livro_autor', 'livro_codl', 'autor_cod_au');
    }

    public function assuntos(): BelongsToMany
    {
        return $this->belongsToMany(Assunto::class, 'livro_assunto', 'livro_codl', 'assunto_cod_as');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Autor extends Model
{
    use HasFactory;

    protected $primaryKey = 'cod_au';
    public $incrementing = false;
    protected $keyType = 'integer';

    protected $fillable = [
        'cod_au',
        'nome'
    ];

    public function livros(): BelongsToMany
    {
        return $this->belongsToMany(Livro::class, 'livro_autor', 'autor_cod_au', 'livro_codi');
    }
}

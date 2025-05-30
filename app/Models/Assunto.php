<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Assunto extends Model
{
    use HasFactory;

    protected $primaryKey = 'cod_as';
    public $incrementing = false;
    protected $keyType = 'integer';

    protected $fillable = ['descricao'];

    public function livros(): BelongsToMany
    {
        return $this->belongsToMany(Livro::class, 'livro_assunto', 'assunto_cod_as', 'livro_codi');
    }
}

<?php

namespace Modules\Assuntos\Domain;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Modules\Livros\Domain\Livro;

class Assunto extends Model
{
    use HasFactory;

    protected $primaryKey = 'cod_as';
    public $incrementing = true;
    protected $keyType = 'integer';

    protected $table = 'assuntos';

    protected $fillable = ['descricao'];

    public function livros(): BelongsToMany
    {
        return $this->belongsToMany(Livro::class, 'livro_assunto', 'assunto_cod_as', 'livro_codl');
    }
}

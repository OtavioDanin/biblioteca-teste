<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BibliotecaView extends Model
{
    use HasFactory;

    protected $table = 'biblioteca_view';

    protected $primaryKey = 'autor_id';
    public $incrementing = false;
    protected $keyType = 'int';

    protected $guarded = [];
}

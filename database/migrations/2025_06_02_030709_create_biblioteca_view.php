<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $sql = "
            CREATE OR REPLACE VIEW biblioteca_view AS
            SELECT
                a.cod_au AS autor_id,
                a.nome AS autor_nome,
                COUNT(DISTINCT l.codl) AS total_livros,
                STRING_AGG(DISTINCT l.titulo, '; ') AS livros_do_autor,
                STRING_AGG(DISTINCT s.descricao, '; ') AS assuntos_dos_livros
            FROM autores AS a
            JOIN livro_autor AS la ON a.cod_au = la.autor_cod_au
            JOIN livros AS l ON la.livro_codl = l.codl
            LEFT JOIN livro_assunto AS ls ON l.codl = ls.livro_codl
            LEFT JOIN assuntos AS s ON ls.assunto_cod_as = s.cod_as
            GROUP BY
                a.cod_au,
                a.nome
            ORDER BY
                a.nome";

        DB::statement($sql);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("DROP VIEW IF EXISTS biblioteca_view;");
    }
};

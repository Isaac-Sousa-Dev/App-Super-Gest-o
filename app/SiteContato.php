<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

// COMO O ELOQUENT FAZ A CONVERSÃO
// Site_Contato [Acrescenta um "_" na separação dos nomes]
// site_contato [Coloca tudo em caixa baixa]
// site_contatos [Por último adiciona um "s" no final, dessa forma conseguindo assim identificar a tabela no Banco de Dados]

class SiteContato extends Model
{
    protected $fillable = [
        'nome',
        'telefone',
        'email',
        'motivo_contatos_id',
        'mensagem'
    ];
}

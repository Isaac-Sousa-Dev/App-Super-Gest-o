<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'produtos'; 
    protected $fillable = ['nome', 'descricao', 'peso', 'unidade_id', 'fornecedor_id'];

    public function itemDetalhe(){
        return $this->hasOne('App\ItemDetalhe', 'produto_id', 'id');

        // Produto tem 1 produtoDetalhe 

        // 1 registro relacionado em produto_detalhes (fk) -> produto_id
        // produtos (pk) -> id
    }

    public function fornecedor(){
        return $this->belongsTo('App\Fornecedor');
    }

    public function pedidos() {
        return $this->belongsToMany('App\Pedido', 'pedido_produtos', 'produto_id', 'pedido_id');
    }
}


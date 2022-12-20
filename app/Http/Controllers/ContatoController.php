<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SiteContato;
use App\MotivoContato;


class ContatoController extends Controller
{
    public function contato(Request $request)
    {
        /*echo '<pre>';
        print_r($request->all());
        echo '</pre>';
        echo $request->input('nome');
        echo '<br>';
        echo $request->input('email');
        */

        // [ 1 FORMA DE PEGAR DADOS DE UM FORMULÁRIO E JOGAR EM UMA VARIÁVEL ]

        /*$contato = new SiteContato();
        $contato->nome = $request->input('nome');
        $contato->telefone = $request->input('telefone');
        $contato->email = $request->input('email');
        $contato->motivo_contato = $request->input('motivo_contato');
        $contato->mensagem = $request->input('mensagem');
        */
        //print_r($contato->getAttributes());

        // [ 2 FORMA DE PEGAR DADOS DE UM FORMUÁRIO E JOGAR EM UMA VARÁVEL UTILIZANDO A VARIÁVEL FILLABLE QUE ESTÁ NO MODEL ]
        //$contato = new SiteContato();
        //$contato->fill($request->all());

        //$contato->save();
        $motivo_contatos = MotivoContato::all();
        return view('site.contato', ['titulo' => 'Contato', 'motivo_contatos' => $motivo_contatos]);
    }

    public function salvar(Request $request) {
        
        // realizar a validação dos dados do formulário recebidos no request
        $regras = [
            'nome' => 'required|min:3|max:40|unique:site_contatos',  // nomes com no mínimo 3 caracteres e no máximo 40 caracteres
            'telefone' => 'required',
            'email' => 'email',
            'motivo_contatos_id' => 'required',
            'mensagem' => 'required|max:2000'
        ];

        $feedback = [

            'nome.min' => 'O campo nome precisa ter no mínimo 3 caracteres',
            'nome.max' => 'O campo nome precisa ter no máximo 40 caracteres',
            'nome.unique' => 'O nome já está em uso!',
            'email' => 'O email informado não é válido!',

            'mensagem.max' => 'A mensagem deve ter no máximo 2000 caracteres',
            'required' => 'O campo :attribute deve ser preenchido'
        ];

        $request->validate($regras, $feedback);

        $contato = new SiteContato();
        $contato->fill($request->all());

        $contato->save();
        return redirect()->route('site.index');
        //dd($contato);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $erro = '';
        
        if($request->get('erro') == 1){
            $erro = 'Usuário e ou Senha não existe !';
        };

        if($request->get('erro') == 2){
            $erro = 'É necessário realizar login para acessar a página !';
        };

        return view('site.login', ['titulo' => 'Login', 'erro' => $erro]);
    }

    public function sair(){
        session_destroy();
        return redirect()->route('site.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function autenticar(Request $request)
    {
        // Regras 
        $regras = [
            'usuario' => 'email',
            'senha' => 'required'
        ];

        // Mensagens de feedback
        $feedback = [
            'usuario.email' => 'Campo usuário ( email ) é obrigatório',
            'senha.required' => 'Campo senha obrigatório'
        ];

        $request->validate( $regras, $feedback );

        // Recuperamos os parâmetros do formulário
        $email = $request->get('usuario');
        $password = $request->get('senha');

        echo "Usuário: $email | Senha: $password";
        echo '<br>';

        // Iniciar o Model User
        $user = new User();
        $usuario = $user->where('email', $email)->where('password', $password)->get()->first();


        if(isset($usuario->name)){
            session_start();
            $_SESSION['nome'] = $usuario->name;
            $_SESSION['email'] = $usuario->email;

            return redirect()->route('app.home');
        } else {
            return redirect()->route('site.login', ['erro' => 1]);
        }
       

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

<?php

use App\SiteContato;
use Illuminate\Database\Seeder;


class SiteContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         // Não utilizamos o método create() dessa vez poq não definimos no MODEL o atributo $fillable.
        /*
        $contato = new SiteContato();
        $contato->nome = 'Sistema SG';
        $contato->telefone = '85 98564-3493';
        $contato->email = 'contato@sg.com.br';
        $contato->motivo_contato = 1;
        $contato->mensagem = 'Seja bem vindo ao sistema Super Gestão';
        $contato->save();
        */

        factory(SiteContato::class, 100)->create();
       

    }
}

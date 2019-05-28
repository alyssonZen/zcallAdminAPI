<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dados = [
            'name' => 'alysson',
            'email' => 'alysson@zenitech.com.br',
            'password' => bcrypt('123')
        ];
        if(User::where('email', '=', $dados['email'])->count())
        {
            $usuario = User::where('email', '=', $dados['email'])->first();
            $usuario->update($dados);
            echo "Usuário alterado";
        }
        else
        {
            User::create($dados);
            echo "Usuário cadastrado";
        }
    }
}

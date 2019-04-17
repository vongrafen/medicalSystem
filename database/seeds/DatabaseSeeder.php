<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'login'=> 'admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin'),
        ]);
        DB::table('cidades')->insert(
            [
            'nome' => 'Ijuí',
            'uf' => 'RS',
            'pais' => 'Brasil',
            'CEP' => '98.98700-000'
            ],
            [
            'nome' => 'Augusto Pestana',
             'uf' => 'RS',
             'pais' => 'Brasil',
             'CEP' => '99.99700-000'
            ],
            [
            'nome' => 'Panambi',
            'uf' => 'RS',
            'pais' => 'Brasil',
            'CEP' => '99.99700-000'
            ],
    );
    DB::table('usuarios')->insert(
        [
        'Login' => 'admin', 
        'Senha' => bcrypt('admin'),
        /*'email' => Str::random(10).'@gmail.com',*/
        'Tipo_usuario' => 'cliente',
        'Status' => '1',
        'permissao' => 'paciente'
        ]
    );

    DB::table('pessoas')->insert(
        [
            'Nome' => Str::random(20),
            'Data_nascimento' => '2015-12-31',
            'Genero' => 'M',
            'CPF' => '9786958695',
            'RG' => '89375629324',
            'Endereco' => Str::random(10),
            'Bairro' => Str::random(10),
            'Complemento' =>  Str::random(10),
            'Telefone' => '99898989',
            'Telefone_Secundario' => '914982719',
            'email' => Str::random(10).'@gmail.com',
            'Observacao' => 'usuario Teste'
        ]
    );
    }
}

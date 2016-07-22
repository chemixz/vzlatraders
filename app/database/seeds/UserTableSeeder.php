<?php

/**
 * Agregamos un usuario nuevo a la base de datos.
 */
class UserTableSeeder extends Seeder {
    public function run(){
       User::create(array(
            'credential' => 19643634,
            'names'=> 'Jose Miguel',
            'surnames'=> 'Briceno Garces',
            'email'  => 'm3taljose@gmail.com',
            'tlf' => '2351310',
            'municipality_id' => 315,
            'level' => 2,
            'confirmed' => 1,
            'password' => Hash::make('2351310') // Hash::make() nos va generar una cadena con nuestra contraseña encriptada
        ));
         User::create(array(
            'credential'  => 19287332,
            'names'=> 'Laura Isabel',
            'surnames'=> 'Berrios Ramirez',
            'email'     => 'zerilau@gmail.com',
            'tlf' => '2316114',
            'municipality_id' => 315,
            'level' => 1,
            'confirmed' => 1,
            'password' => Hash::make('12345678') // Hash::make() nos va generar una cadena con nuestra contraseña encriptada
        ));
        User::create(array(
            'credential'  => 9900000000,
            'names'=> 'Anonimo None',
            'surnames'=> 'Unknow Not',
            'email'     => 'tester@gmail.com',
            'tlf' => '5555555',
            'municipality_id' => 315,
            'level' => 1,
            'confirmed' => 1,
            'password' => Hash::make('12345678') // Hash::make() nos va generar una cadena con nuestra contraseña encriptada
        ));
        User::create(array(
            'credential'  => 9179526,
            'names'=> 'Milangela Del Carmem',
            'surnames'=> 'Garces Linares',
            'email'     => 'garcesmili21@gmail.com',
            'tlf' => '2712351310',
            'municipality_id' => 315,
            'level' => 1,
            'confirmed' => 1,
            'password' => Hash::make('12345678') // Hash::make() nos va generar una cadena con nuestra contraseña encriptada
        ));

    }
}

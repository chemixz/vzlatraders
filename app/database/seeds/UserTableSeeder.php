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
            'password' => Hash::make('2351310') // Hash::make() nos va generar una cadena con nuestra contraseña encriptada
        ));
         User::create(array(
            'credential'  => 19287332,
            'names'=> 'Laura Isael',
            'surnames'=> 'Berrios Ramirez',
            'email'     => 'zerilau@gmail.com',
            'tlf' => '2316114',
            'municipality_id' => 315,
            'level' => 1,
            'password' => Hash::make('12345678') // Hash::make() nos va generar una cadena con nuestra contraseña encriptada
        ));

    }
}

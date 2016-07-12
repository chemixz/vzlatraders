<?php

class StateTableSeeder extends Seeder {
    public function run(){
       State::create(array(
            'name'=> 'Trujillo',
        ));
        State::create(array(
            'name'=> 'Merida',
        ));
       State::create(array(
            'name'=> 'Miranda',
        ));
       State::create(array(
            'name'=> 'Carabobo',
        ));

    }
}

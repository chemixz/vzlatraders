<?php

/**
 * Agregamos un usuario nuevo a la base de datos.
 */
class CategoryTableSeeder extends Seeder {
    public function run(){
    	$codecolor = ['#008B8B','#87CEEB','#6A5ACD','#BDB76B','#B0C4DE'];
        $categories = [ 'Comida', 'Medicina','Juguete','Electrodomestico','Otros'];

        for ($i=0; $i <count($categories) ; $i++) { 
        	 Category::create(array(
            'name' => $categories[$i],
            'codecolor' => $codecolor[$i],
            ));
        }


    }
}

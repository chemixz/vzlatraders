<?php

/**
 * Agregamos un usuario nuevo a la base de datos.
 */
class GalleryTableSeeder extends Seeder {
    public function run(){
        for ($i=1; $i <= 10; $i++) { 
            $myvar = $i.'.jpg';
        	 Gallery::create(array(
                'picture' => 'default_image'.$myvar
            ));
        }


    }
}

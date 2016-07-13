<?php

class StateTableSeeder extends Seeder {
    public function run(){
      $array = array(
       array('estado' => 'Amazonas',
      'municipios' => array('Alto Orinoco','Atabapo', 'Atures', 'Autana', 'Manapiare', 'Maroa', 'Río Negro'),),

      array('estado' => 'Anzoátegui',
      'municipios' => array('Anaco', 'Aragua', 'Bolívar', 'Bruzual', 'Cajigal', 'Carvajal', 'Diego Bautista Urbaneja', 'Freites', 'Guanipa', 'Guanta', 'Independencia', 'Libertad', 'McGregor', 'Miranda', 'Monagas', 'Peñalver', 'Píritu', 'San Juan de Capistrano', 'Santa Ana', 'Simón Rodriguez', 'Sotillo'),),

      array('estado' => 'Apure',
      'municipios' => array('Achaguas', 'Biruaca', 'Muñoz', 'Páez', 'Pedro Camejo', 'Rómulo Gallegos', 'San Fernando'),),

      array('estado' => 'Aragua',
      'municipios' => array('Bolívar', 'Camatagua', 'Francisco Linares Alcántara', 'Girardot', 'José Ángel Lamas', 'José Félix Ribas', 'José Rafael Revenga', 'Libertador', 'Mario Briceño Iragorry','Ocumare de la Costa de Oro', 'San Casimiro', 'San Sebastián', 'Santiago Mariño', 'Santos Michelena', 'Sucre', 'Tovar', 'Urdaneta', 'Zamora'),),

      array('estado' => 'Barinas',
      'municipios' => array('Alberto Arvelo Torrealba', 'Andrés Eloy Blanco', 'Antonio José de Sucre', 'Arismendi', 'Barinas', 'Bolívar', 'Cruz Paredes', 'Ezequiel Zamora', 'Obispos', 'Pedraza', 'Rojas', 'Sosa'),),

      array('estado' => 'Bolívar',
      'municipios' => array('Caroní', 'Cedeño', 'El Callao', 'Gran Sabana', 'Heres', 'Piar', 'Raúl Leoni', 'Roscio', 'Sifontes', 'Sucre', 'Padre Pedro Chen'),),

      array('estado' => 'Carabobo',
      'municipios' => array('Bejuma', 'Carlos Arvelo', 'Diego Ibarra',' Guacara', 'Juan José Mora', 'Libertador', 'Los Guayos', 'Miranda', 'Montalbán', 'Naguanagua', 'Puerto Cabello', 'San Diego', 'San Joaquín', 'Valencia'),),

      array('estado' => 'Cojedes',
      'municipios' => array('Anzoátegui', 'Pao de San Juan Bautista', 'Tinaquillo', 'Girardot', 'Lima Blanco', 'Ricaurte', 'Rómulo Gallegos', 'Ezequiel Zamora', 'Tinaco'),),

      array('estado' => 'Delta Amacuro',
      'municipios' => array('Antonio Díaz', 'Casacoima', 'Pedernales', 'Tucupita'),),

      array('estado' => 'Falcón',
      'municipios' => array('Acosta', 'Bolívar', 'Buchivacoa', 'Cacique Manaure', 'Carirubana', 'Colina', 'Dabajuro', 'Democracia', 'Falcón', 'Federación', 'Jacura', 'Los Taques', 'Mauroa', 'Miranda', 'Monseñor Iturriza', 'Palmasola', 'Petit', 'Píritu', 'San Francisco', 'Silva', 'Sucre', 'Tocópero', 'Unión', 'Urumaco', 'Zamora'),),

      array('estado' => 'Distrito Capital',
      'municipios' => array('Libertador', 'Santa Rosalia','El Valle','Coche','Caricuao','Macarao','Antimano', 'La Vega', 'El Paraiso', 'El Junquito', 'Sucre','San Juan', 'Santa Teresa', '23 de Enero', 'La Pastora', 'Altagracia', 'San José', 'San Bernardino', 'Catedral', 'La Candelaria', 'San Agustin', 'El Recreo','San Pedro'),),

      array('estado' => 'Guárico',
      'municipios' => array( 'Chaguaramas', 'El Socorro', 'Francisco de Miranda', 'José Félix Ribas', 'José Tadeo Monagas', 'Juan Germán Roscio', 'Julián Mellado', 'Las Mercedes','Leonardo Infante', 'Pedro Zaraza', 'Ortíz', 'San Gerónimo de Guayabal', 'San José de Guaribe', 'Santa María de Ipire'),),

      array('estado' => 'Lara',
      'municipios' => array( 'Andrés Eloy Blanco', 'Crespo', 'Iribarren', 'Jiménez', 'Morán', 'Palavecino', 'Simón Planas', 'Torres', 'Urdaneta'),),

      array('estado' => 'Mérida',
      'municipios' => array('Alberto Adriani', 'Andrés Bello', 'Antonio Pinto Salinas', 'Aricagua', 'Arzobispo Chacón', 'Campo Elías', 'Caracciolo Parra Olmedo', 'Cardenal Quintero', 'Guaraque', 'Julio César Salas', 'Justo Briceño', 'Libertador', 'Miranda', 'Obispo Ramos de Lora', 'Padre Norega', 'Pueblo Llano', 'Rangel', 'Rivas Dávila', 'Santos Marquina', 'Sucre', 'Tovar', 'Tulio Febres Cordero', 'Zea'),),

      array('estado' => 'Miranda',
      'municipios' => array('Acevedo', 'Andrés Bello', 'Baruta, Brión', 'Buroz', 'Carrizal', 'Chacao', 'Cristóbal Rojas', 'El Hatillo', 'Guaicaipuro', 'Independencia', 'Lander', 'Los Salias', 'Páez', 'Paz Castillo', 'Pedro Gual', 'Plaza', 'Simón Bolívar', 'Sucre', 'Urdaneta', 'Zamora'),),

      array('estado' => 'Monagas',
      'municipios' => array('Acosta', 'Aguasay', 'Bolívar', 'Caripe', 'Cedeño', 'Ezequiel Zamora', 'Libertador', 'Maturín', 'Piar', 'Punceres', 'Santa Bárbara', 'Sotillo', 'Uracoa'),),

      array('estado' => 'Nueva Esparta',
      'municipios' => array('Antolín del Campo', 'Arismendi', 'Díaz', 'García', 'Gómez', 'Maneiro', 'Marcano', 'Mariño', 'Península de Macanao', 'Tubores', 'Villalba'),),

      array('estado' => 'Portuguesa',
      'municipios' => array('Agua Blanca', 'Araure', 'Esteller', 'Guanare', 'Guanarito', 'Monseñor José Vicenti de Unda', 'Ospino', 'Páez', 'Papelón', 'San Genaro de Boconoíto', 'San Rafael de Onoto', 'Santa Rosalía', 'Sucre', 'Turén'),),

      array('estado' => 'Sucre',
      'municipios' => array('Andrés Eloy Blanco', 'Andrés Mata', 'Arismendi', 'Benítez', 'Bermúdez', 'Bolívar', 'Cajigal', 'Cruz Salmerón Acosta', 'Libertador', 'Mariño', 'Montes', 'Ribero', 'Sucre', 'Valdez'),),

      array('estado' => 'Tachira',
      'municipios' => array('Andrés Bello', 'Antonio Rómulo Costa', 'Ayacucho', 'Bolívar', 'Cárdenas', 'Córdoba', 'Fernández Feo', 'Francisco de Miranda', 'García de Hevia', 'Guásimos', 'Independencia', 'Jáuregui', 'José María Vargas', 'Junín', 'Libertad', 'Libertador', 'Lobatera', 'Michelena', 'Panamericano', 'Pedro María Ureña', 'Rafael Urdaneta', 'Samuel Darío Maldonado', 'San Cristóbal', 'Seboruco', 'Simón Rodríguez', 'Sucre', 'Torbes', 'Uribante', 'San Judas Tadeo'),),

      array('estado' => 'Trujillo',
      'municipios' => array('Andrés Bello', 'Boconó', 'Bolívar', 'Candelaria', 'Carache', 'Escuque', 'José Felipe Márquez Cañizalez', 'Juan Vicente Campos Elías', 'La Ceiba, Miranda', 'Monte Carmelo', 'Motatán', 'Pampán', 'Pampanito', 'Rafael Rangel', 'San Rafael de Carvajal', 'Sucre', 'Trujillo', 'Urdaneta', 'Valera'),),

      array('estado' => 'Vargas',
      'municipios' => array('Vargas'),),

      array('estado' => 'Yaracuy',
      'municipios' => array('Arístides Bastidas', 'Bolívar', 'Bruzual', 'Cocorote', 'Independencia', 'José Antonio Páez', 'La Trinidad', 'Manuel Monge', 'Nirgua', 'Peña', 'San Felipe', 'Sucre', 'Urachiche', 'Veroes'),),

      array('estado' => 'Zulia',
      'municipios' => array('Almirante Padilla', 'Baralt', 'Cabimas', 'Catatumbo', 'Colón', 'Francisco Javier Pulgar', 'Jesús Enrique Losada', 'Jesús María Semprún', 'La Cañada de Urdaneta', 'Lagunillas', 'Machiques de Perijá', 'Mara', 'Maracaibo', 'Miranda', 'Páez', 'Rosario de Perijá', 'San Francisco', 'Santa Rita', 'Simón Bolívar', 'Sucre', 'Valmore Rodríguez'),),

      );
        for ($i=0; $i < count($array) ; $i++) { 
          $state = State::create(array(
              'name'=> $array[$i]['estado'],
          ));
          for ($x=0; $x < count($array[$i]['municipios']) ; $x++) { 
            Municipality::create(array(
                'name' => $array[$i]['municipios'][$x],
                'state_id' =>$state->id,
            ));
           
          }
        }



    }
}

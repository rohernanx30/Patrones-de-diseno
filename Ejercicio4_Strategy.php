<?php
// Interfaz de estrategia
interface EstrategiaSalida {
    public function mostrar(string $mensaje);
}

// Estrategias concretas 
class SalidaConsola implements EstrategiaSalida {
    public function mostrar(string $mensaje) {
        echo "Consola: $mensaje<br>";
    }
}

class SalidaJSON implements EstrategiaSalida {
    public function mostrar(string $mensaje) {
        echo "JSON: " . json_encode(["mensaje" => $mensaje]) . "<br>";
    }
}

class SalidaTXT implements EstrategiaSalida {
    public function mostrar(string $mensaje) {
        file_put_contents("mensaje.txt", $mensaje);
        echo "Mensaje guardado en mensaje.txt<br>";
        echo "El contenido del mensaje es: $mensaje";
    }
}

class Mensaje {
 
    private EstrategiaSalida $estrategia;

    public function __construct(EstrategiaSalida $estrategia) {
        $this->estrategia = $estrategia;
    }

    public function setEstrategia(EstrategiaSalida $estrategia) {
        $this->estrategia = $estrategia;
    }

    public function mostrar(string $texto) {
        $this->estrategia->mostrar($texto);
    }
}

$mensaje = new Mensaje(new SalidaConsola());
$texto = "Hola mundo!";                      // el texto se define una sola vez

$estrategias = [
    new SalidaConsola(),
    new SalidaJSON(),
    new SalidaTXT()
];

foreach ($estrategias as $estrategia) {
    $mensaje->setEstrategia($estrategia);
    $mensaje->mostrar($texto);
}
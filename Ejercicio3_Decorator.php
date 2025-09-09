<?php
// Personaje base
interface Personaje {
    public function descripcion();
}

// Personajes concretos
class Guerrero implements Personaje {
    public function descripcion() {
        return "Guerrero listo para pelear.";
    }
}

class Mago implements Personaje {
    public function descripcion() {
        return "Mago listo para lanzar hechizos.";
    }
}

// Decorator
class ArmaDecorator implements Personaje {
    protected Personaje $personaje;
    
    public function __construct(Personaje $personaje) {
        $this->personaje = $personaje;
    }
    public function descripcion(){
        return $this->personaje->descripcion();
    }
}

// Armas concretas
class Espada extends ArmaDecorator {
    public function descripcion() {
        return $this->personaje->descripcion() . " Equipado con Espada.";
    }
}

class  Armadura extends Espada {
    public function descripcion() {
        return $this->personaje->descripcion() . " Equipado con Armadura.";
    }
}

class BastonMagico extends ArmaDecorator {
    public function descripcion() {
        return $this->personaje->descripcion() . " Equipado con Bastón Mágico.";
    }
}

class  CapaMagica extends BastonMagico {
    public function descripcion() {
        return $this->personaje->descripcion() . " Equipado con Capa Mágica.";
    }
}

echo "Guerrero <br>";
$guerrero = new Guerrero();
$guerreroEquipado = new Espada($guerrero);
echo $guerreroEquipado->descripcion() ."<br>"; 
$guerreroEquipado = new Armadura($guerreroEquipado);
echo $guerreroEquipado->descripcion() ."<br>";

echo "<br>Mago <br>";
$mago = new Mago();
$magoEquipado = new CapaMagica($mago);
echo $magoEquipado->descripcion() . "<br>"; 
$magoEquipado = new BastonMagico($magoEquipado);
echo $magoEquipado->descripcion() . "<br>";
?>

<?php
// Interface de personaje
interface Personaje {
    public function atacar();
    public function velocidad();
}

// Personajes
class Esqueleto implements Personaje {
    public function atacar() {
        return "Esqueleto ataca con arco!";
    }
    public function velocidad() {
        return "Esqueleto es rápido.";
    }
}

class Zombi implements Personaje {
    public function atacar() {
        return "Zombi ataca con mordida!";
    }
    public function velocidad() {
        return "Zombi es lento.";
    }
}

// Factory
class PersonajeFactory {
    public static function crearPersonaje($nivel): Personaje {
        if($nivel == "facil") {
            return new Esqueleto();
        } elseif($nivel == "dificil") {
            return new Zombi();
        } else {
            throw new Exception("Nivel no válido");
        }
    }
}

$nivel = "dificil"; // Cambiar a "facil" para probar Esqueleto
$personaje = PersonajeFactory::crearPersonaje($nivel);

echo "Nivel selecionado: " . $nivel . "<br>";
echo $personaje->atacar() .  "<br>";
echo $personaje->velocidad() .  "<br>";
?>
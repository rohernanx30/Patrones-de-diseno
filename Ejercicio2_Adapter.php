<?php

interface IArchivo {
    public function openDocument();
}

//Interfaz para los archivos que sean de la versión 7
interface IDocuments7 {
    public function open();
}

//Clases de la versión 7
class Word7 implements IDocuments7 {
    public function open() {
        echo "Abriendo documento Word 7";
    }
}

class Excel7 implements IDocuments7 {
    public function open() {
        echo "Abriendo documento Excel 7";
    }
}

class PowerPoint7 implements IDocuments7 {
    public function open() {
        echo "Abriendo presentación PowerPoint 7";
    }
}

//Clases nativas de la versión 10
class Word10 implements IArchivo {
    public function openDocument() {
        echo "Abriendo documento Word 10";
    }
}

class Excel10 implements IArchivo {
    public function openDocument() {
        echo "Abriendo documento Excel 10";
    }
}

class PowerPoint10 implements IArchivo {
    public function openDocument() {
        echo "Abriendo presentación PowerPoint 10";
    }
}

//Adaptador general para documentos de la versión 7
class AdapterDoc implements IArchivo {

    private IDocuments7 $documento;

    public function __construct(IDocuments7 $doc) {
        $this->documento = $doc;
    }

    public function openDocument() {
        echo "Adaptando documento de Windows 7 a Windows 10 <br>";
        $this->documento->open();
    }
}

//Sistema Windows 10 que recibe documentos
class Windows10System {
    public function verDocuments(IArchivo $documento) {
        return $documento->openDocument();
    }
}

    $word7 = new Word7();
    $excel7 = new Excel7();
    $ppt7   = new PowerPoint7();

    $word10 = new Word10();
    $excel10 = new Excel10();
    $ppt10   = new PowerPoint10();

    $system = new Windows10System();

    //Abrir documentos de Windows 7 con compatibilidad
    $system->verDocuments(new AdapterDoc($word7)); 
    echo "<br>";

    $system->verDocuments(new AdapterDoc($excel7));
    echo "<br>";

    $system->verDocuments(new AdapterDoc($ppt7));
    echo "<br><br>";

    //Abrir documentos nativos de Windows 10
    echo "Documentos nativos de Windows 10:<br>";
    $system->verDocuments($word10);
    echo "<br>";

    $system->verDocuments($excel10);
    echo "<br>";

    $system->verDocuments($ppt10);
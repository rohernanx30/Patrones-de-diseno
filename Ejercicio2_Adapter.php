<?php

interface IWindows10 {
    public function abrirArchivo($archivo): string;
}

// Clase sistema antiguo (Windows 7)
class OldWindows7 {
    public function fetchArchivo($archivo): string {
        // Simula abrir archivo en sistema antiguo
        return "Archivo '$archivo' creado en Windows 7";
    }
}

// Adaptador OldWindows7 a Windows10
class Windows10Adapter implements IWindows10 {
    private OldWindows7 $oldSystem;

    public function __construct(OldWindows7 $oldSystem) {
        $this->oldSystem = $oldSystem;
    }

    // Método del nuevo sistema (Windows 10)
    public function abrirArchivo($archivo): string {
        $resultadoViejo = $this->oldSystem->fetchArchivo($archivo);
        return "Windows 10 (modo compatibilidad): $resultadoViejo";
    }
}

// Uso 
$archivo = "documento.docx";
$windows7 = new OldWindows7();
$windows10 = new Windows10Adapter($windows7);

echo $windows10->abrirArchivo($archivo);

<?php
session_start(); // Iniciar la sesión para poder almacenar las calificaciones

// Inicializamos el array multidimensional con las calificaciones en la sesión si no existe
if (!isset($_SESSION['calificaciones'])) {
    $_SESSION['calificaciones'] = array();
}

// Verificamos si se envió el formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Capturamos los datos del formulario
    $usuario = $_POST['usuario'];
    $ciclo = $_POST['ciclo'];
    $modulo = $_POST['modulo'];
    $evaluacion = $_POST['evaluacion'];
    $calificacion = $_POST['calificacion'];

    // Guardamos la calificación en el array multidimensional, asociado al usuario
    $_SESSION['calificaciones'][$usuario][$ciclo][$modulo][$evaluacion] = $calificacion;

    // Mostramos las calificaciones almacenadas
    echo "<h2>Calificaciones almacenadas</h2>";
    foreach ($_SESSION['calificaciones'] as $usuario => $ciclos) {
        echo "<p><strong>Usuario:</strong> $usuario</p>";
        foreach ($ciclos as $ciclo => $modulos) {
            echo "<p><strong>Ciclo:</strong> $ciclo</p>";
            foreach ($modulos as $modulo => $evaluaciones) {
                echo "<p><strong>Módulo:</strong> $modulo</p>";
                foreach ($evaluaciones as $evaluacion => $nota) {
                    echo "<p><strong>Evaluación:</strong> $evaluacion, <strong>Calificación:</strong> $nota</p>";
                }
            }
        }
    }
}
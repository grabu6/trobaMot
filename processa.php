<?php
session_start();


if ($_SESSION['data'] !== date('Y-m-d')) {
    $_SESSION['lletres'] = [];
    $_SESSION['joc_completat'] = false;
}

if (!isset($_SESSION['paraula_secreta']) || !isset($_SESSION['data']) || $_SESSION['data'] !== date('Y-m-d')) {

    $json_data = file_get_contents('paraules.json');
    $data = json_decode($json_data, true);

    if (isset($data['paraules']) && is_array($data['paraules'])) {

        $paraules = $data['paraules'];

        if (!isset($_SESSION['paraula_secreta']) || $_SESSION['data'] !== date('Y-m-d')) {
            do {
                $indice_palabra = array_rand($paraules);
                $paraula_avui = $paraules[$indice_palabra];

            } while (strlen($paraula_avui) !== 5);
            $_SESSION['paraula_secreta'] = $paraula_avui;
        }

        $_SESSION['data'] = date('Y-m-d');

    } else {
        $_SESSION['error'] = 'No es carrega paraules.json.';
        header('Location: index.php');
        exit;
    }
}

if (isset($_POST['lletres'])) {
    $lletres_proposades = $_POST['lletres'];
    if (!isset($_SESSION['lletres']) || !is_array($_SESSION['lletres'])) {
        $_SESSION['lletres'] = [];
    }
    
    if (!empty($lletres_proposades)) {

    if (strlen($lletres_proposades) !== 5) {
        $_SESSION['error'] = 'Hi falten lletres.';
        header('Location: index.php');
        exit;
    }
    $lletres_proposades = strtoupper($lletres_proposades); 
    $paraula_secreta = $_SESSION['paraula_secreta'];

    if ($lletres_proposades === $paraula_secreta) {
        $_SESSION['resultat'] = 'Has trobat la paraula!';
        $_SESSION['joc_completat'] = true;

        if (!isset($_SESSION['paraula_resultat'])) {
            $_SESSION['paraula_resultat'] = $lletres_proposades;
        }

        $_SESSION['lletres'][] = $lletres_proposades;

        header('Location: index.php');
        exit;
    } else {
        $_SESSION['resultat'] = 'Paraula no trobada';

        if (!isset($_SESSION['paraula_resultat'])) {
            $_SESSION['paraula_resultat'] = $lletres_proposades;
        }

        $_SESSION['lletres'][] = $lletres_proposades;
        header('Location: index.php');
        exit;
    }
    }
} else {
    $_SESSION['error'] = 'Hi falten lletres.';
    header('Location: index.php');
    exit;
}


?>
<?php
include "./Continentes/America.php";
include "./Continentes/Europa.php";
include "./Continentes/Africa.php";
include "./Continentes/Asia.php";
include "./Continentes/Oceania.php";

$titulo = ["AMERICA", "EUROPA", "AFRICA", "ASIA", "OCEANIA"];
$Cubos = [$America, $Europa, $Africa, $Asia, $Oceania];

$index = isset($_GET['continente']) ? intval($_GET['continente']) - 1 : 0;

$Pais = $Cubos[$index];
$html = '<h1>' . $titulo[$index] . '</h1>';

foreach ($Pais as $cara => $info) {

	$html .='
    <table border=1 alingn="center">
    <tr>';
    $maxColum = null;
    foreach ($info as $prov => $arreglo) {
        $tam = count($info[$prov]);
        $maxColum = ($maxColum >= $tam) ? $maxColum : $tam;
    }

	$tam = count ($info);

    $html .= '<table border=1>';
    $html .= '<tr><th colspan="' . $maxColum . '" bgcolor="#EC7063">' . $cara . '</th></tr>';
    $html .= '<tr>';

    foreach ($info as $prov => $arreglo) {
        $html .= "<th> $prov </th>";
    }

    $html .= "</tr>";

    for ($f = 0; $f < $maxColum; $f++) {
        $html .= '<tr>';
        foreach ($info as $data) {
            $html .= (isset($data[$f])) ? '<td bgcolor="#D6FAF2">' . $data[$f] . '</td>' : '<td bgcolor="#D6DEFA"> </td>';
        }
        $html .= '</tr>';
    }

    $html .= "</table><br><br>";
}

echo $html;
?>

<?php
// provera_sigurnosti=on
// $porez = 15

// if (isset($_GET["porez"])) {
//     // echo $_GET["porez"];
//     echo "Ukljucili ste porez";
// } else {
//     echo "Niste ukljucili porez";
// }

// echo "<hr>";

// $vrstaProizvoda = $_GET["vrsta_proizvoda"];
// $cena = $_GET["cena"];

// if ($vrstaProizvoda == "Hrana") {
//     if (isset($_GET["porez"])) {
//         $dodatak = 50;
//         echo $cena + $dodatak + 15;
//     } else {
//         $dodatak = 50;
//         echo $cena + $dodatak;
//     }
// } else if ($vrstaProizvoda == "Racunari") {
//     if (isset($_GET["porez"])) {
//         $dodatak = 350;
//         echo $cena + $dodatak + 15;
//     } else {
//         $dodatak = 350;
//         echo $cena + $dodatak;
//     }
// }

$procenatPoreza = 15;

$porezSadrzan = isset($_GET["ukljuciPorez"]);

if ($porezSadrzan) {
    echo "Ukljucili ste porez (" . $procenatPoreza . " % procenata )";
} else {
    echo "Niste ukljucili porez";
}

echo "<hr>";


$cena = isset($_GET["cena"]) ? floatval($_GET["cena"]) : 0;
$vrstaProizvoda = isset($_GET["vrsta_proizvoda"]) ? $_GET["vrsta_proizvoda"] : '';

$dodatak = 0;

if ($vrstaProizvoda == "Hrana") {
    $dodatak = 50;
} else if ($vrstaProizvoda == "Racunari") {
    $dodatak = 350;
} else {
    echo "Nepoznata vrsta proizvoda: " . htmlspecialchars($vrstaProizvoda) . "<br>";
}

$osnovnaCena = $cena + $dodatak;

if ($porezSadrzan) {
    $iznosPoreza = ($osnovnaCena * $procenatPoreza) / 100;
    $konacnaCena = $osnovnaCena + $iznosPoreza;
} else {
    $konacnaCena = $osnovnaCena;
}

echo "Konacna cena: " . number_format($konacnaCena) . " dinara";

?>
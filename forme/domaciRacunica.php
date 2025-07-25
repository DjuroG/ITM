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

$procenatPoreza = 15; // Or define as a constant if preferred

$porezSadrzan = isset($_GET["ukljuciPorez"]); // Use a descriptive boolean

if ($porezSadrzan) {
    echo "Ukljucili ste porez (" . $procenatPoreza . " % procenata )";
} else {
    echo "Niste ukljucili porez";
}

echo "<hr>";

// Ensure $cena is a number
$cena = isset($_GET["cena"]) ? floatval($_GET["cena"]) : 0;
$vrstaProizvoda = isset($_GET["vrsta_proizvoda"]) ? $_GET["vrsta_proizvoda"] : '';

$dodatak = 0;

if ($vrstaProizvoda == "Hrana") {
    $dodatak = 50;
} else if ($vrstaProizvoda == "Racunari") {
    $dodatak = 350;
} else {
    echo "Nepoznata vrsta proizvoda: " . htmlspecialchars($vrstaProizvoda) . "<br>";
    // Handle error or set dodatak to 0
}

$osnovnaCena = $cena + $dodatak;

if ($porezSadrzan) {
    // Calculate tax as 15% of the osnovnaCena
    $iznosPoreza = ($osnovnaCena * $procenatPoreza) / 100;
    $konacnaCena = $osnovnaCena + $iznosPoreza;
} else {
    $konacnaCena = $osnovnaCena;
}

echo "Konacna cena: " . number_format($konacnaCena) . " dinara";

?>
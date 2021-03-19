<?php 

/**
 * Esta funcion calcula la cantidad total de botella y el precio promedio de los diferentes vinos.
 * @param array $colecVinoCantBotellas
 * @param array $colecVinosPrecio
 * @return array 
 */
function infoVino($colecVinoCantBotellas, $colecVinosPrecios) {
    $sumaStock = 0 ;
    $sumaPrecios = 0 ; 
    for($i=0; $i<count($colecVinoCantBotellas); $i++){
        $sumaStock = $sumaStock + $colecVinoCantBotellas[$i];
        $sumaPrecios = $sumaPrecios + $colecVinosPrecios [$i];
    }
    $promedioPrecios = $sumaPrecios / count($colecVinosPrecios) ;
    $promedioPrecios = round($promedioPrecios) ; 
    $infoTotalVinos = array();
    $infoTotalVinos = ["stock" => $sumaStock, "precioPromedio" => $promedioPrecios] ;
    return $infoTotalVinos ;

}


function main(){    

    // Coleccion de vinos 
    $coleccionVinos = array() ;
    $coleccionVinos ["Malbec"] = array (
        "variedad" => ["blanco", "tinto", "tinto"],
        "cantidadDeBotellas" => [20, 35, 11] ,
        "anioDeElaboracion" => [2000, 2010, 2015],
        "precioPorUnidad" => [3500, 2500, 1000]
    ) ;
    $coleccionVinos["Cabernet Suavignon"] = array(
        "variedad" => ["tinto", "tinto", "blanco"],
        "cantidadDeBotellas" => [33, 3, 47],
        "anioDeElaboracion" => [2017, 1987, 2020],
        "precioPorUnidad" => [750, 4900,1600]
    );
    $coleccionVinos["Merlot"] = array (
        "variedad" => ["tinto", "tinto", "blanco"],
        "cantidadDeBotellas" => [11,66,12],
        "anioDeElaboracion" => [1999, 2021, 2017],
        "precioPorUnidad" => [3900, 800, 2500]
        ) ;



/*
Lo que esta acontinuacion seria una forma de hacerlo sin una funcion.

// -----------------------------------MALBEC ----------------------------------------------//
$totalBotellasMalbec = 0 ;
$sumaPrecioMalbec = 0 ;

for ($i = 0; $i < count($coleccionVinos["Malbec"]["cantidadDeBotellas"]); $i++){
    $totalBotellasMalbec = $totalBotellasMalbec + $coleccionVinos["Malbec"]["cantidadDeBotellas"][$i] ;
    $sumaPrecioMalbec = $sumaPrecioMalbec + $coleccionVinos["Malbec"]["precioPorUnidad"][$i] ;
}
 $sumaPrecioMalbec = ($sumaPrecioMalbec) / 3 ;
 $precioPromedioMalbec = round($sumaPrecioMalbec)
 echo "la suma total de botellas de MALBEC es de: " .$totalBotellasMalbec. "\n" ;
 echo "El precio promedio de una botella de MALBEC es de:  " .$precioPromedioMalbec. "\n" ;
 // -----------------------------------Cabernet Suavignon ----------------------------------------------//

$totalBotellasCS = 0 ;
$sumaPrecioCS = 0 ;

for ($i = 0; $i < count($coleccionVinos["Cabernet Suavignon"]["cantidadDeBotellas"]); $i++){
    $totalBotellasCS = $totalBotellasCS + $coleccionVinos["Cabernet Suavignon"]["cantidadDeBotellas"][$i] ;
    $sumaPrecioCS = $sumaPrecioCS + $coleccionVinos["Cabernet Suavignon"]["precioPorUnidad"][$i] ;
}

 $sumaPrecioCS = ($sumaPrecioCS) / 3 ;
 $precioPromedioCS = round($sumaPrecioCS) ;
 echo "la suma total de botellas de CS es de: " .$TotalBotellasCS. "\n" ;
 echo "El precio promedio de una botella de Cabernet Suavignon es de:  " .$precioPromedioCS. "\n" ;

 // ---------------------------------- MERLOT ---------------------------------------------------------

 $totalBotellasMerlot = 0 ;
 $sumaPrecioMerlot = 0 ;
 
 for ($i = 0; $i < count($coleccionVinos["Cabernet Suavignon"]["cantidadDeBotellas"]); $i++){
    $totalBotellasMerlot = $totalBotellasMerlot + $coleccionVinos["Cabernet Suavignon"]["cantidadDeBotellas"][$i] ;
    $sumaPrecioMerlot = $sumaPrecioMerlot + $coleccionVinos["Cabernet Suavignon"]["precioPorUnidad"][$i] ;
 }
  $sumaPrecioMerlot = ($sumaPrecioMerlot) / 3 ;
  $precioPromedioMerlot = round($sumaPrecioMerlot) ;
  echo "la suma total de botellas de Merlot es de: " .$totalBotellasMerlot. "\n" ;
  echo "El precio promedio de una botella de Merlot es de:  " .$precioPromedioMerlot. "\n" ;

//--------------------------------- CIERRE------------------------------------------
*/

//-------------------------------- Inicio de interface -------------------------------------------------
// Con la funcion incluida 

$verInformacion = "si";
while ($verInformacion == "si") {
    echo "Ingrese el numero del vino del que desea informacion: 1.Malbec, 2.Cabernet Suavignon, 3.Merlot \n";
    $vino = trim(fgets(STDIN));

    if($vino == 1 ){ 
        for($i=0; $i < 3; $i++){
            $n = $i + 1 ;
            echo " - Informacion del vino N°" .$n. " Malbec - \n";
            echo " La variedad es:" .$coleccionVinos["Malbec"]["variedad"][$i]. "\n" ;
            echo "La cantidad de botellas son: " .$coleccionVinos["Malbec"]["cantidadDeBotellas"][$i]. "\n" ;
            echo "Fue elaborado en el año: " .$coleccionVinos["Malbec"]["anioDeElaboracion"][$i]. "\n" ;
            echo "El precio por unidad es: " .$coleccionVinos["Malbec"]["precioPorUnidad"][$i]. "\n" ; 
        }
         // funcion
         $informacionGeneral = infoVino($coleccionVinos["Malbec"]["cantidadDeBotellas"], $coleccionVinos["Malbec"]["precioPorUnidad"]) ;
         echo "\n" ;
         echo "Informacion General \n" ; 
         echo "El stock en botellas de Malbec es de: " .$informacionGeneral["stock"]. "\n"  ;
         echo "EL precio promedio por botella es de: $ " .$informacionGeneral["precioPromedio"]. "\n" ;


    } elseif ($vino == 2) {
        for($i=0; $i < 3; $i++){
            $n = $i + 1 ;
            echo " - Informacion del vino N°" .$n. "Cabernet Suavignon - \n";
            echo "La variedad es: " .$coleccionVinos["Cabernet Suavignon"]["variedad"][$i] ;
            echo "La cantidad de botellas son: " .$coleccionVinos["Cabernet Suavignon"]["cantidadDeBotellas"][$i]. "\n" ;
            echo "Fue elaborado en el año: " .$coleccionVinos["Cabernet Suavignon"]["anioDeElaboracion"][$i]. "\n" ;
            echo "El precio por unidad es: " .$coleccionVinos["Cabernet Suavignon"]["precioPorUnidad"][$i]. "\n" ; 
        }
       // funcion
       $informacionGeneral = infoVino($coleccionVinos["Cabernet Suavignon"]["cantidadDeBotellas"], $coleccionVinos["Cabernet Suavignon"]["precioPorUnidad"]) ;
       echo "\n" ;
       echo "Informacion General \n" ; 
       echo "El stock en botellas de Cabernet Suavignon es de: " .$informacionGeneral["stock"]. "\n"  ;
       echo "EL precio promedio por botella es de: $ " .$informacionGeneral["precioPromedio"]. "\n" ;


    } elseif($vino == 3){
        for($i=0; $i < 3; $i++){
            $n = $i + 1 ;
            echo " - Informacion del vino N°" .$n. "Merlot - \n";
            echo " La variedad es:" .$coleccionVinos["Merlot"]["variedad"][$i]. "\n" ;
            echo "La cantidad de botellas son: " .$coleccionVinos["Merlot"]["cantidadDeBotellas"][$i]. "\n" ;
            echo "Fue elaborado en el año: " .$coleccionVinos["Merlot"]["anioDeElaboracion"][$i]. "\n" ;
            echo "El precio por unidad es: " .$coleccionVinos["Merlot"]["precioPorUnidad"][$i]. "\n" ; 
        }
       // funcion
       $informacionGeneral = infoVino($coleccionVinos["Merlot"]["cantidadDeBotellas"], $coleccionVinos["Merlot"]["precioPorUnidad"]) ;
       echo "\n" ;
       echo "Informacion General \n" ; 
       echo "El stock en botellas de Merlot es de: " .$informacionGeneral["stock"]. "\n"  ;
       echo "EL precio promedio por botella es de: $ " .$informacionGeneral["precioPromedio"]. "\n" ;

    };

    echo "Desea consultar mas informacion? si/no  \n" ;
    $verInformacion = trim(fgets(STDIN)) ;   

}

}

/* Programa Principal */ 
/* Coleccion de vinos */
main() ;

echo "Fin del programa ! " ;

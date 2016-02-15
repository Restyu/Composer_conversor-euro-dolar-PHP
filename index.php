<?php

require_once 'vendor/autoload.php';

if (isset($_GET['add'])) {

    $moneda = htmlspecialchars($_POST['moneda'], ENT_QUOTES, 'UTF-8');
    $tipo = htmlspecialchars($_POST['tipo'], ENT_QUOTES, 'UTF-8');

    if (is_numeric($moneda)) {
      
    }else{
      echo "no has introducido un numero";
      exit();
    }


    $provider = new \Thelia\CurrencyConverter\Provider\ECBProvider();
    $currencyConverty = new \Thelia\CurrencyConverter\CurrencyConverter($provider);
    $baseValue = new \Thelia\Math\Number($moneda);

 // si el valo es euro
 if ($tipo == "euro") {

    $convertedValue = $currencyConverty
        ->from('EUR')
        ->to('USD')
        ->convert($baseValue);
        echo $convertedValue->getNumber();
  }else{
// si el valor es dolar
$convertedValue = $currencyConverty
    ->from('USD')
    ->to('EUR')
    ->convert($baseValue);
    echo $convertedValue->getNumber();
  }
}

require_once 'formulario.html';

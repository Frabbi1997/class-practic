<?php

  $persone = [
    'first_name' => 'Fajle',
    'last_name' => 'Rabbi',
    'address' => [
        'village' => 'Mathter vita',
        'Thana' => 'Dhunat',
        'District' => 'Bogura',
        'country' =>[
            'first_name' => 'Bangladesh',
            'code' => 'BD'
        ]
        ]
  ];

  echo $persone['first_name'] .'</br>';
  echo $persone['last_name'] .'</br>';
  echo $persone['address']['village'] .'</br>';
  echo $persone['address']['Thana'] .'</br>';
  echo $persone['address']['District'] .'</br>';
  echo $persone['address']['country']['first'] .'</br>';
  echo $persone['address']['country']['code'] .'</br>';





?>
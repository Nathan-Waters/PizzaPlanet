<?php

//validate crust
function validSelectedCrust($selectedCrust){
    $validCrust = getCrust();

    //Check each user toppings against array of valid toppings
    foreach ($selectedCrust as $selectedCrust){
        if (!in_array($selectedCrust, $validCrust)){
            return false;
        }
    }
    return true;
}

//validate sauce
function validSelectedSauce($selectedSauce){
    $validSauce = getSauce();

    //Check each user toppings against array of valid toppings
    foreach ($selectedSauce as $selectedSauce){
        if (!in_array($selectedSauce, $validSauce)){
            return false;
        }
    }
    return true;
}

//validate toppings
function validSelectedToppings($selectedToppings){
    $validToppings = getToppings();

    //Check each user toppings against array of valid toppings
    foreach ($selectedToppings as $selectedToppings){
        if (!in_array($selectedToppings, $validToppings)){
            return false;
        }
    }
    return true;
}

//validate Size
function validSelectedSize($selectedSize){
    $validSize = getSize();

    //Check each user toppings against array of valid toppings
    foreach ($selectedSize as $selectedSize){
        if (!in_array($selectedSize, $validSize)){
            return false;
        }
    }
    return true;
}
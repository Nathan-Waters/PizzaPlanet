<?php

//validate crust
function validSelectedCrust($selectedCrust){
    $validCrust = DataLayer::getCrust();

    //Check each user toppings against array of valid toppings
    foreach ($selectedCrust as $selectedCrusts){
        if (!in_array($selectedCrusts, $validCrust)){
            return false;
        }
    }
    return true;
}

//validate sauce
function validSelectedSauce($selectedSauce){
    $validSauce = DataLayer::getSauce();

    //Check each user toppings against array of valid toppings
    foreach ($selectedSauce as $selectedSauces){
        if (!in_array($selectedSauces, $validSauce)){
            return false;
        }
    }
    return true;
}

//validate toppings
function validSelectedToppings($selectedToppings){
    $validToppings = DataLayer::getToppings();

    //Check each user toppings against array of valid toppings
    foreach ($selectedToppings as $selectedTopping){
        if (!in_array($selectedTopping, $validToppings)){
            return false;
        }
    }
    return true;
}

//validate Size
function validSelectedSize($selectedSize){
    $validSize = DataLayer::getSize();

    //Check each user toppings against array of valid toppings
    foreach ($selectedSize as $selectedSizes){
        if (!in_array($selectedSizes, $validSize)){
            return false;
        }
    }
    return true;
}
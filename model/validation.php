<?php

//validate crust

//validate sauce

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

//validate size


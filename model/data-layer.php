<?php

/*  328/PizzaPlanet/model/data-layer.php
    Returns data for the PizzaPlanet app
    This is part of the MODEL
    Eventually, this will read/write the DB
*/

function getCrust(){
    $crust = array("Traditional Hand Tossed", "Thin Crust", "Stuffed Crust");
    return $crust;
}

function getSauce(){
    $sauce = array("Classic Marinara", "Alfredo", "Buffalo", "Barbecue");
    return $sauce;
}

function getToppings(){
    $toppings = array("Pepperoni", "Mushrooms", "Bell Peppers", "Onions", "Sausage", "Olives", "Fresh Basil",
        "Tomatoes", "Peppers", "Prosciutto", "Fresh Mozzarella", "Basil Pesto");
    return $toppings;
}

function getSize(){
    $size = array("9 Inch", "12 Inch", "14 Inch");
    return $size;
}

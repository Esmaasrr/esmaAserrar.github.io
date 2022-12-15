<?php
//business/PizzaService.php

declare(strict_types = 1);

namespace Business;

use Data\PizzaDAO;

class PizzaService {

public function getOverzichtPizza(): array {
    $pizzaDAO = new PizzaDAO();
    $pizzaLijst = $pizzaDAO->getAllePizzas();
    return $pizzaLijst;
    //var_dump($pizzaLijst);
}

public function getGekozenPizza(int $id) {
    $pizzaDAO = new PizzaDAO();
    $gekozenLijst = $pizzaDAO->getById($id);
    return $gekozenLijst;
            }     
}
<?php 
//Data/BroodjesService.php
declare(strict_types =1);

namespace Business; 

use Data\BroodjesDAO; 

class BroodjesService {

    public function broodjesOverzicht(): array 
    {
        $broodjesDAO = new BroodjesDAO(); 
        $broodjesLijst = $broodjesDAO->getLijstBroodjes(); 
        return $broodjesLijst;
    }

    

}
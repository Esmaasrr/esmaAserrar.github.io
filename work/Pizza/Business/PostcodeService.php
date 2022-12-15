<?php
//business/PostcodeService.php

declare(strict_types = 1);

namespace Business;

use Data\PostcodeDAO;

class PostcodeService {

    public function getAllePostcodes(): array
{
    $postcodeDAO = new PostcodeDAO();
    $postcodeLijst = $postcodeDAO->getAllePostcodes();
    return $postcodeLijst;
    //var_dump($postcodeLijst);
}

    public function toonPostcode(int $postcode)
{
    $postcodeDAO = new PostcodeDAO();
    $toonPostcode = $postcodeDAO->getById((int) $postcode);
    return $toonostcode;
}

public function postcodeToevoegen(int $postcode, $plaats, int $isLeverbaar) 
{
    $postcodeDAO = new PostcodeDAO();
    $nieuwPostcode = $postcodeDAO->voegPostcodeToe((int)$postcode, $plaats, (int)$isLeverbaar);
    return $nieuwPostcode;
}

public function leverControle(int $id)
{
    $postcodeDAO = new PostcodeDAO();
    $leverbaar = $postcodeDAO->controleLevering((int)$id);
    return $leverbaar;
}

}

<?php
//business/FilmService.php

declare(strict_types = 1);

namespace Business;

use Data\FilmDAO;
use Entities\Film;
use Entities\Exemplaar;
use Entities\FilmExemplaar;

class FilmService {

public function getFilmTitels(): array {
    $filmDAO = new FilmDAO();
    $filmLijst = $filmDAO->getAlleenFilms();
    return $filmLijst;
}

public function getFilmOverzicht(): array {
    $filmDAO = new FilmDAO();
    $heleLijst = $filmDAO->getAlles();
    return $heleLijst;
}

public function voegTitelToe(string $titel) {
    $filmDAO = new FilmDAO();
    $nieuwTitel = $filmDAO->create($titel);
}

public function verwijderFilm(int $id) {
    $filmDAO = new FilmDAO();
    $filmDAO->deleteTitel((int) $id);
    }  

}
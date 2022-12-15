<?php
//business/ExemplaarService.php

declare(strict_types = 1);

namespace Business;

use Data\ExemplaarDAO;
use Data\FilmDAO;
use Entities\Film;
use Entities\Exemplaar;
use Entities\FilmExemplaar;

class ExemplaarService {

    public function getExempOverzicht(): array {
        $exempDAO = new ExemplaarDAO();
        $exemplaarLijst = $exempDAO->getAllEx();
        return $exemplaarLijst;
    }

    public function getFilmByNummer(int $exemplaarnr): array {
        $exempDAO = new ExemplaarDAO();
        $opgehaaldeFilm = $exempDAO->getByNummer((int)$exemplaarnr);
        return $opgehaaldeFilm;
    }

    public function voegExemplaarToe(int $exemplaarnr, int $filmId) {
        $exempDAO = new ExemplaarDAO();
        $nieuwExemplaar = $exempDAO->createExemplaar((int)$exemplaarnr, (int)$filmId);
    }

        public function verwijderExemplaar(int $id) {
            $exempDAO = new ExemplaarDAO();
            $exempDAO->deleteExemplaar($id);
            }

    public function verwijderExVanFilm(int $filmId) {
        $exempDAO = new ExemplaarDAO();
        $exempDAO->deleteFilm($filmId);
    }


    public function eenFilmHuren(int $exemplaarnr) {
        $exempDAO = new ExemplaarDAO();
        $exempDAO->exemplaarWeg($exemplaarnr);
    }

    public function eenFilmTerugbrengen(int $exemplaarnr) {
        $exempDAO = new ExemplaarDAO();
        $exempDAO->exemplaarTerug($exemplaarnr);
    }
        
    
}
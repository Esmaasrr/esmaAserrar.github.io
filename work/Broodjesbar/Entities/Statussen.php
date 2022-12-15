<?php 
//Entities/Statussen.php
declare(strict_Types = 1);

namespace Entities; 

class Statussen 
{
    private int $statusId;
    private string $status;

    public function __construct(int $statusId, string $status)
    {
        $this->statusId = $statusId;
        $this->status = $status; 
    }

    public function getStatusId() : int
    {
        return $this->statusId;
    }

    public function getStatus() : string 
    {
        return $this->status;
    }
}
<?php

abstract class BaseModel
{
    protected $pdo;
    function __construct(PDO $pdo)
    {
       $this->pdo=$pdo ;
    }
    
}

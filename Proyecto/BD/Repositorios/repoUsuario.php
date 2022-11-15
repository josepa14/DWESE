<?php
class RepoUsuario
{
    private $con;

    public function __construct($con)
    {

        $this->con = $con;
    }
}

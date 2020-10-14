<?php
class BackendController extends Controller
{
    private $modChamp = null;

    function Favoris()
    {
        $this->render("Favoris");
    }

    function Tableaudebord()
    {
        $this->render("tableauDeBord/Tableaudebord");
    }
}
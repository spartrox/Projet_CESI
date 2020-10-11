<?php
class FrontendController extends Controller
{
    private $modChamp = null;

    function Accueil()
    {
        $this->render("Accueil");
    }

    function Inscription()
    {
        $this->render("Inscription");
    }
}
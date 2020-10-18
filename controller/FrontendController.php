<?php
class FrontendController extends Controller
{
    private $modChamp = null;

    function Accueil()
    {
        $this->render("Accueil");
    }

    function Connexion()
    {
        $this->render("Connexion");
    }

    function Inscription()
    {
        $this->render("Inscription");
    }
}
<?php

require_once("models/MainManager.model.php");

class MainController {
    private $mainManager;

    public function __construct() {
        $this->mainManager = new MainManager();
    }

    private function genererPage($data) {
        extract($data);
        ob_start();
        require_once($view);
        $page_content = ob_get_clean();
        require_once($template);
    }

    public function accueil() {
        $data_page = [
            "page_description" => "Description de la page d'accueil",
            "page_title" => "Titre de la page d'accueil",
            "page_css" => ["accueil.css"],
            "view" => "views/accueil.view.php",
            "template" => "views/common/template.php"
        ];
        $this->genererPage($data_page);
    }

    public function page1() {
        $datas = $this->mainManager->getDatas();

        $_SESSION['alert'] = [
            "message" => "Exemple de message d'alerte",
            "type" => "alert-success"
        ];
        
        $data_page = [
            "page_description" => "Description de la page 1",
            "page_title" => "Titre de la page 1",
            "datas" => $datas,
            "page_css" => ["page1.css"],
            "view" => "views/page1.view.php",
            "template" => "views/common/template.php"
        ];
        $this->genererPage($data_page);
    }

    public function page2() {
        $_SESSION['alert'] = [
            "message" => "Exemple de message d'alerte",
            "type" => "alert-danger"
        ];

        $data_page = [
            "page_description" => "Description de la page 2",
            "page_title" => "Titre de la page 2",
            "view" => "views/page2.view.php",
            "template" => "views/common/template.php"
        ];
        $this->genererPage($data_page);
    }

    public function page3() {
        $data_page = [
            "page_description" => "Description de la page 3",
            "page_title" => "Titre de la page 3",
            "page_javascript" => ["page3.js"],
            "view" => "views/page3.view.php",
            "template" => "views/common/template.php"
        ];
        $this->genererPage($data_page);
    }

    public function pageErreur($message) {
        $data_page = [
            "page_description" => "Page permettant de gérer les erreurs",
            "page_title" => "Page d'erreur",
            "message" => $message,
            "view" => "views/erreur.view.php",
            "template" => "views/common/template.php"
        ];
        $this->genererPage($data_page);
    }
}

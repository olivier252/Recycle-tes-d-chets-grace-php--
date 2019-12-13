<?php
require_once("Modele/MPav.php");
require_once("Modele/Manager/PavManager.php");

class   CAdmin
{
    //-----------------------------
    //     Rootage des pages
    //-----------------------------

    public function root()
    {
        if (isset($_GET['page'])) {
            if ($_GET['page'] == "deconnection") {
                session_unset();
                session_destroy();
                header('location:index.php');

            //Ajout d'un PAV
            } else if ($_GET['page'] == "gpav") {
                if ((isset($_GET['action']) && $_GET['action']  == "creationPav") || (!isset($_GET['action']))) {
                    $this->createPav();
                }

            //Modification/supression d'un PAV
            if (isset($_GET['action']) && $_GET['action'] == "editPav")
                $this->editPav();

            //Ajout d'un agent
            } else if ($_GET['page'] == "gcomptes") {
                if ((isset($_GET['action']) && $_GET['action'] == "creation") || (!isset($_GET['action']))) {
                    $this->createAgent();
                }

            //Modification/supression d'un agent
                if (isset($_GET['action']) && $_GET['action'] == "edit") {
                    $this->editAgent();
                }
            } else
                $this->display("", "");
        } else
            $this->display("", "");
    }

    //-----------------------------
    //      Ajout d'un agent
    //-----------------------------

    private function createAgent()
    {
        $soutitre = "Création agent";
        $sousMenu = "admGestionCompte";
        $title = "Création Agent";

        if ((isset($_POST['login']) && $_POST['login'] != "") &&
            (isset($_POST['pwd']) && $_POST['pwd'] != "") &&
            (isset($_POST['firstName']) && $_POST['firstName'] != "") &&
            (isset($_POST['lastName']) && $_POST['lastName'] != "")) {

            $usr = new MUser();
            $usrManager = new UserManager();

            $usr->setName($_POST['login']);
            $usr->setPwd($_POST['pwd']);
            $usr->setFirstName($_POST['firstName']);
            $usr->setLastName($_POST['lastName']);
            $validation = 2;
            if ($usrManager->addUser($usr) == true) {
                $validation = 1;
            }
        }
        require('View/VAddNewLogin.php');
        $this->display($title, $content);
    }

    //-----------------------------
    //      Edition d'un agent
    //-----------------------------

    private function editAgent()
    {
        $soutitre = "Modification agent";
        $sousMenu = "admGestionCompte";
        $agentList = "";
        $usr = new MUser();
        $usrManager = new UserManager();

        if (isset($_POST['edit'])) {
            if (isset($_POST['loginEdit']) &&
                isset($_POST['firstName']) &&
                isset($_POST['lastName'])) {

                $usr->setName($_POST['loginEdit']);
                $usr->setFirstName($_POST['firstName']);
                $usr->setLastName($_POST['lastName']);
                $usrManager->editUser($usr);

                if (isset($_POST['pwd']) && !empty($_POST['pwd'])) {
                    $usr->setPwd(MD5($_POST['pwd']));
                    $usrManager->editUserPwd($usr);
                }
                $validation = 1;
            }
            $title = "Modification Agent";
            $content ="";
            $bduser = $usrManager->getUser($_POST['loginEdit']);
            $vuser = $bduser->getName();
            $vfirstname = $bduser->getFirstName();
            $vlastname = $bduser->getLastName();
            require('View/VEditSelectedLogin.php');
        } else {
            $title = "Edition Agent";
            if (isset($_POST['suppr']))
                $usrManager->delUser($_POST['loginEdit']);

            $res = $usrManager->getAgentList();
            foreach ($res as $tmp) {
                $agentList .= "<option value=" . $tmp['login'] . ">" . $tmp['login'] . " - " . $tmp['firstName'] . " " . $tmp['lastName'] . "</option>";
            }
            require('View/VEditAgent.php');
        }
        $this->display($title, $content);
    }

    //-----------------------------
    //    Ajout d'un PAV
    //-----------------------------

    private function CreatePav()
    {
        $title = "Création d'un PAV";
        $sousMenu = "admGestionCompte";
        $subtitle = "Gestion des PAV";

        if ((isset($_POST['adress']) && !empty($_POST['adress'])) &&
            (isset($_POST['fullness']) && !empty($_POST['fullness']))) {
            $mp = new MPav();
            $pav = new PavManager();
            $mp->setId($mp->getId());
            $mp->setAdress($_POST['adress']);
            $mp->setFullness($_POST['fullness']);
            $validation = 2;

            if($pav->addPav($mp) == true) {
                $validation = 1;
            }
        }
        require ('View/VAddNewPav.php');
        $this->display($title, $content);
    }

    //-----------------------------
    //    Edition d'un PAV
    //-----------------------------

    private function editPav()
    {
        $soutitre = "Modification d'un PAV";
        $sousMenu = "admGestionCompte";
        $pavList = "";
        $pav = new MPav();
        $pm = new PavManager();
    //En cas d'édition
        if (isset($_POST['edit'])) {
            if (isset($_POST['pavId']) &&
                isset($_POST['pavEdit'])) {
                    $pav->setId($_POST['pavId']);
                    $pav->setAdress($_POST['pavEdit']);
                    $pm->updatePav($pav);
                    $validation = 1;
            }
            $title = "Modification de l'adresse du PAV";
            $content ="";


            require('View/VEditSelectedPav.php');

            } else {
                $title = "Edition PAV";

    //En cas de suppression
               if (isset($_POST['suppr']) && isset($_POST['pavEdit'])) {
                   echo $_POST['pavEdit'];
                   $pm->deletePav($_POST['pavEdit']);
               }


            $res = $pm->getPavList();
            foreach ($res as $tmp) {
                $pavList .= "<option value=" . $tmp['id'] . ">" . $tmp['id']." ".$tmp['adress'] . "</option>";
            }
            require('View/VEditPav.php');
        }
        $this->display($title, $content);
    }

    //-----------------------------
    //    Affichage de la page 
    //-----------------------------

    public function display($title, $content) {
        require('View/VAdminMenu.php');
        require('View/VTemplate.php');
    }
}
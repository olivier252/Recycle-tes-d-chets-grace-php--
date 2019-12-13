<?php


class StatementManager
{
    public function getStatement($id)
    {
        $pav = new MPav();

        $pav->setId("");
        $pav->setAdress("");

        $res = $this->dbquery("SELECT `id`, `adress` FROM `pav` WHERE id ='".$id."';");
        $res = $res->fetch();
        if ($res['id'] != "") {
            $pav->setId($res['id']);
            $pav->setAdress($res['adress']);
        }
        return $pav;
    }

    public function addPav($pav){
        echo "addPav";
        $this->dbquery("INSERT INTO `pav` (`id`, `adress`, `fullness`) VALUES (NULL, '".$pav->getAdress()."', '".$pav->getFullness()."');");
        return true;
    }

    public function updatePav($pav){
        echo 'salut';
        $res = $this->dbquery("UPDATE `pav` SET `adress` = '".$pav->getAdress()."' WHERE `id` = '".$pav->getId()."';");
        return $res;
    }

    public function deletePav($id){
        $res = $this->dbquery("DELETE FROM `pav` WHERE `id` = '".$id."';");
        return $res;
    }

    public function getPavList(){
        $res = $this->dbquery("SELECT `id`, `adress` FROM pav;");
        $res = $res->fetchall();
        return $res;
    }
}
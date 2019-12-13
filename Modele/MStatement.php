<?php


class MStatement
{
    private $_idPavList;
    private $_fullness;
    private $_comm;

    public function getIdPavList(){
        return $this->_idPavList;
    }

    public function setIdPavList($idPavList){
        $this->_idPavList = $idPavList;
    }

    public function getFullness(){
        return $this->_fullness;
    }

    public function setFullness($fullness){
        $this->_fullness = $fullness;
    }

    public function getComm(){
        return $this->_comm;
    }

    public function setComm($comm){
        $this->_comm = $comm;
    }
}
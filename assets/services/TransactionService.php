<?php

class TransactionService implements IServiceBase{

    private $utilities;
    private $cookieName;

    public function __construct(){

        $this->utilities = new Utilities();
        $this->cookieName = "transaccion";

    }

    public function GetList(){

        $listTransaccion = array();

        if (isset($_COOKIE[$this->cookieName])){

            $listTransaccion = json_decode($_COOKIE[$this->cookieName], false);

        }else{
            setcookie($this->cookieName, json_encode($listTransaccion), $this->utilities->GetCookieTime(), "/");
        }

        return $listTransaccion;

    }

    public function GetById($id){

        $listTransaccion = $this->GetList();
        $elementDecode = $this->utilities->filtro($listTransaccion, 'id', $id)[0];
        $transaccion = new Transaccion();

        $transaccion->set($elementDecode);


        return $transaccion;

    }

    public function Add($entidad){

        $listTransaccion = $this->GetList();
        $transactionID = 1;

        if(!empty($listTransaccion)){
            $lastTransaction = $this->utilities->getLast($listTransaccion);
            $transactionID = $lastTransaction->id + 1;
        }

        $entidad->id = $transactionID;

        array_push($listTransaccion, $entidad);

        setcookie($this->cookieName, json_encode($listTransaccion), $this->utilities->GetCookieTime(), "/");

    }

    public function Update($id, $entidad){
        
        $element = $this->GetById($id);
        $listTransaccion = $this->GetList();

        $elementIndex = $this->utilities->buscarID($listTransaccion, 'id', $id);

        $listTransaccion[$elementIndex] = $entidad;

        setcookie($this->cookieName, json_encode($listTransaccion), $this->utilities->GetCookieTime(), "/");

    }

    public function Delete($id){

        $listTransaccion = $this->GetList();
        $elementIndex = $this->utilities->buscarID($listTransaccion, 'id', $id);

        unset($listTransaccion[$elementIndex]);

        $listTransaccion = array_values($listTransaccion);

        setcookie($this->cookieName, json_encode($listTransaccion), $this->utilities->GetCookieTime(), "/");
    }

}

?>
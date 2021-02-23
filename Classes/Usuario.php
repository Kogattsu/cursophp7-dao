<?php 

class Usuario {

    private $idusuario;
    private $deslogin;
    private $dessenha;
    private $dtcadastro;

    public function getIdusuario(){
        return $this->idusuario;
    }

    public function setIdusuario($value){
        $this->idusuario = $value;
    }

    public function getDeslogin(){
        return $this->deslogin;
    }

    public function setDeslogin($value){
        $this->deslogin = $value;
    }

    public function getDessenha(){
        return $this->dessenha;
    }

    public function setDessenha($value){
        $this->dessenha = $value;
    }

    public function getdtCadastro(){
        return $this->dtcadastro;
    }

    public function setdtCadastro($value){
        $this->dtcadastro = $value;
    }

    public function loadByid($id){

        $vwx = new Sql();

        $results= $vwx->select("SELECT * FROM tb_usuarios WHERE idusuario = :ID", array(
            ":ID"=>$id
        ));

        if (count($results)> 0){

            $this->setData($results[0]);
        }
    }

    public static function getList(){
        $vwx = new Sql();

        return $vwx-> select("SELECT * FROM tb_usuarios ORDER BY deslogin;");
    }

    public static function search($login){
        $vwx = new Sql();

        return $vwx-> select("SELECT * FROM tb_usuarios WHERE deslogin LIKE :SEARCH ORDER BY deslogin", array(
            ':SEARCH'=> "%".$login."%"
        ));
    }

    public function login($login, $password){

        $vwx = new Sql();

        $results= $vwx->select("SELECT * FROM tb_usuarios WHERE deslogin = :LOGIN AND dessenha = :PASSWORD", array(
            ":LOGIN"=>$login,
            ":PASSWORD"=>$password
        ));

        if (count($results)> 0){

            $this->setData($results[0]);
            
        } else{
            throw new Exception("Login e/ou senha incorretos.");
        }
    }
    public function setData($data){
        $this -> setIdusuario($data['idusuario']);
        $this -> setDeslogin($data['deslogin']);
        $this -> setDessenha($data['dessenha']);
        $this -> setdtCadastro(new DateTime($data['dtcadastro']));
    }

    public function insert(){
        $vwx = new Sql();

        $results = $vwx->select("CALL sp_usuarios_insert(:LOGIN, :PASSOWORD)", array(
            ':LOGIN'=>$this->getDeslogin(),
            ':PASSWORD'=>$this->getDessenha()
        ));

        if (count($results) >0){
            $this->setData($results[0]);
        }
    }

    public function update($login, $password){

        $this->setDeslogin($login);
        $this->setDessenha($password);

        $vwx = new Sql();

        $vwx->query("UPDATE tb_usuarios SET deslogin = :LOGIN, dessenha = :PASSWORD WHERE idusuario = ID", array(
            ':LOGIN'=>$this->getDeslogin(),
            ':PASSWORD'=>$this->getDessenha(),
            ':ID'=>$this->getIdusuario()
        ));

    }

    public function __construct($login= "",$password=""){
        $this->setDeslogin($login);
        $this->setDessenha($password);
    }

    public function __toString()
    {
        return json_encode(array(
            "idusuario"=>$this->getIdusuario(),
            "deslogin"=>$this->getDeslogin(),
            "dessenha"=>$this->getDessenha(),
            "dtcadastro"=>$this->getdtCadastro()->format("d/m/Y H:i:s")
        ));
    } 
}














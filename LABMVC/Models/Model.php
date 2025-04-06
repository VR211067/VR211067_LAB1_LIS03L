<?php
abstract class Model{
        
    private $host= 'sql101.infinityfree.com';
    private $user= 'if0_38229697';
    private $password= 'ZiIEhw1jroWfl';
    private $db_name= 'if0_38229697_inventario_libros';
    protected $conn;

     //crear conexion
    protected function open_db(){
        try{
                $this->conn=new PDO("mysql:host=$this->host; dbname=$this->db_name; charset=utf8",$this->user,$this->password);
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }
    }

//metodo para cerrar conexion
    protected function close_db(){
        $this->conn=null;
    }

    protected function get_query($query,$params=array()){
        try{
            $rows=[];
            $this-> open_db();
            $stm=$this->conn->prepare($query);
            $stm->execute($params);
            while($rows[]=$stm->fetch(PDO::FETCH_ASSOC));

            $this->close_db();
            array_pop($rows);//quitando el ultimo elemento

            return $rows;
        }

        catch(Exception $e){
            $this->close_db();
            return[];

        }

    }

    protected function set_query($query,$params=array()){
            try{

                $this->open_db();
                $stm=$this->conn->prepare($query);
                $stm->execute($params);
                $affectedRows=$stm->rowCount();
                $this->close_db();
                return $affectedRows;


            }
            catch(Exception $e){

                    $this->close_db();

                    return 0;
            }

    }
}
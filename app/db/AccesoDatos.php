<?php
//Username:	doa0wocvkdv6g6w8da1p
//Password:	pscale_pw_Llkv5AiV0oN8AcWfuc3SCOlOl9S1MD8zg9U3G9meaBk

//DATABASE_URL='mysql://doa0wocvkdv6g6w8da1p:pscale_pw_Llkv5AiV0oN8AcWfuc3SCOlOl9S1MD8zg9U3G9meaBk@gcp-us-central1.connect.psdb.cloud/juegosnube?ssl={"rejectUnauthorized":true}'

// HOST=gcp-us-central1.connect.psdb.cloud
// USERNAME=doa0wocvkdv6g6w8da1p
// PASSWORD=pscale_pw_Llkv5AiV0oN8AcWfuc3SCOlOl9S1MD8zg9U3G9meaBk
// DATABASE=juegosnube

class AccesoDatos
{
    private static $objetoAccesoDatos;
    private $objetoPDO;

    private function __construct(){
        try { 
            $host= "gcp-us-central1.connect.psdb.cloud";
            $db_name = 'juegosnube';
            $username = 'vqw8ivtoboj7auz73y1d';
            $password = 'pscale_pw_z0LQ58tGSwiexcm2uVy48qHOUbQoXNSMHpTSLtZtGdf';
            $options = array(
                PDO::MYSQL_ATTR_SSL_CA => "./db/certificado/ca-bundle.crt"
                //Ubicacion en referencia al root
            );

            $this->objetoPDO = new PDO('mysql:host='.$host.';dbname='.$db_name.';charset=utf8',$username,$password,$options);
        } 
        catch (PDOException $e) { 
            print "Error!: " . $e->getMessage();
            die();
        }
    }
 
    public function prepararConsulta($sql){ 
        return $this->objetoPDO->prepare($sql); 
    }

    // public function retornarUltimoIdInsertado(){ 
    //     return $this->objetoPDO->lastInsertId(); 
    // }
 
    public static function obtenerObjetoAcceso(){ 
        if (!isset(self::$objetoAccesoDatos)) {          
            self::$objetoAccesoDatos = new AccesoDatos(); 
        } 
        return self::$objetoAccesoDatos;        
    }
 
    public function __clone()
    { 
        trigger_error('La clonación de este objeto no está permitida', E_USER_ERROR); 
    }

}

?>
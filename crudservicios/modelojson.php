<?php
require_once 'database.php';

class Datos extends Database{

    //METODOS

    // Usuarios
    public function createUsuarioModel($datosModel,$tabla){
        $stmt = Database::getconectar()->prepare("INSERT INTO $tabla(document,id_roll,username,lastname,gender,email,phone,address,document_type,password,confirm_password)
        VALUES(:document,:id_roll,:username,:lastname,:gender,:email,:phone,:address,:document_type,:password,:confirm_password)");

        $stmt->bindParam(":document", $datosModel["document"],PDO::PARAM_STR);
        $stmt->bindParam(":id_roll", $datosModel["id_roll"],PDO::PARAM_STR);
        $stmt->bindParam(":username", $datosModel["username"],PDO::PARAM_STR);
        $stmt->bindParam(":lastname", $datosModel["lastname"],PDO::PARAM_STR);
        $stmt->bindParam(":gender", $datosModel["gender"],PDO::PARAM_STR);
        $stmt->bindParam(":email", $datosModel["email"],PDO::PARAM_STR);
        $stmt->bindParam(":phone", $datosModel["phone"],PDO::PARAM_STR);
        $stmt->bindParam(":address", $datosModel["address"],PDO::PARAM_STR);
        $stmt->bindParam(":document_type", $datosModel["document_type"],PDO::PARAM_STR);
        $stmt->bindParam(":password", $datosModel["password"],PDO::PARAM_STR);
        $stmt->bindParam(":confirm_password", $datosModel["confirm_password"],PDO::PARAM_STR);

        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function readUsuarioModel($email,$tabla){
        $stmt = Database::getconectar()->prepare("SELECT document,id_roll,username,lastname,gender,email,phone,address,document_type,password,confirm_password from $tabla
        join roles on rol.id_roll = $tabla.id_roll
        where email = :email");
        $stmt->bindParam(":email", $email,PDO::PARAM_STR);
        $stmt->execute();
        $stmt->bindParam(":document", $document,PDO::PARAM_STR);
        $stmt->bindParam(":id_roll", $id_roll,PDO::PARAM_STR);
        $stmt->bindParam(":username", $username,PDO::PARAM_STR);
        $stmt->bindParam(":lastname", $lastname,PDO::PARAM_STR);
        $stmt->bindParam(":gender", $gender,PDO::PARAM_STR);
        $stmt->bindParam(":email", $email,PDO::PARAM_STR);
        $stmt->bindParam(":phone", $phone,PDO::PARAM_STR);
        $stmt->bindParam(":address", $address,PDO::PARAM_STR);
        $stmt->bindParam(":document_type", $document_type,PDO::PARAM_STR);
        $stmt->bindParam(":password", $password,PDO::PARAM_STR);
        $stmt->bindParam(":confirm_password", $confirm_password,PDO::PARAM_STR);
        $usuarios = array();

    return  $stmt->fetchAll();
  }
public function updateUsuarioModel($datosModel,$tabla){
        $stmt = Database::getconectar()->prepare("UPDATE $tabla set username=:username,
lastname=:lastname,gender=:gender,email=:email,
phone=:phone,address=:address,password=:password,
confirm_password=:confirm_password
where document_type= :document_type and document = :document");

         $stmt->bindParam(":document", $document,PDO::PARAM_STR);
         $stmt->bindParam(":id_roll", $id_roll,PDO::PARAM_STR);
         $stmt->bindParam(":username", $username,PDO::PARAM_STR);
         $stmt->bindParam(":lastname", $lastname,PDO::PARAM_STR);
         $stmt->bindParam(":gender", $gender,PDO::PARAM_STR);
         $stmt->bindParam(":email", $email,PDO::PARAM_STR);
         $stmt->bindParam(":phone", $phone,PDO::PARAM_STR);
         $stmt->bindParam(":address", $address,PDO::PARAM_STR);
         $stmt->bindParam(":document_type", $document_type,PDO::PARAM_STR);
         $stmt->bindParam(":password", $password,PDO::PARAM_STR);
         $stmt->bindParam(":confirm_password", $confirm_password,PDO::PARAM_STR);
         if($stmt->execute()){
            echo "Actualizacion Exitosa";
        }else{
            echo "No se pudo hacer la Actualizacion";
        }
    }

     public function updateUsuarioAdminModel($datosModel,$tabla){


        $stmt = Database::getconectar()->prepare("UPDATE $tabla set username=:username,
    lastname=:lastname,gender=:gender,email=:email,
    phone=:phone,address=:address,password=:password,
    confirm_password=:confirm_password
        where document = :document");

         $stmt->bindParam(":document", $document,PDO::PARAM_STR);
         $stmt->bindParam(":id_roll", $id_roll,PDO::PARAM_STR);
         $stmt->bindParam(":username", $username,PDO::PARAM_STR);
         $stmt->bindParam(":lastname", $lastname,PDO::PARAM_STR);
         $stmt->bindParam(":gender", $gender,PDO::PARAM_STR);
         $stmt->bindParam(":email", $email,PDO::PARAM_STR);
         $stmt->bindParam(":phone", $phone,PDO::PARAM_STR);
         $stmt->bindParam(":address", $address,PDO::PARAM_STR);
         $stmt->bindParam(":document_type", $document_type,PDO::PARAM_STR);
         $stmt->bindParam(":password", $password,PDO::PARAM_STR);
         $stmt->bindParam(":confirm_password", $confirm_password,PDO::PARAM_STR);

if($stmt->execute()){
    echo "Actualizacion Exitosa";
}else{
    echo "No se pudo hacer la Actualizacion";
}
 }

    public function deleteUsuarioModel($document,$document_type, $tabla){
        $stmt = Database::getconectar()->prepare("DELETE FROM $tabla WHERE document=:document and document_type
        = :document_type");

        $stmt->bindParam(":document",$document, PDO::PARAM_STR);
        $stmt->bindParam(":document_type",$document_type, PDO::PARAM_STR);

        $stmt->execute();
    }

    public function loginUsuarioModel($datosModel, $tabla){
        $stmt = Database::getconectar()->prepare("SELECT email,password,id_roll from $tabla
        join roles on $tabla.id_roll = roles.id_roll
        where email = :email and (password = :password) AND (id_roll = 'Cliente' or Nombre_Rol = 'empleado')");

        $stmt->bindParam(":email",$datosModel["email"]);
        $stmt->bindParam(":password",$datosModel["password"]);

        $stmt->execute();

        $stmt->bindColumn("email", $email);
        $stmt->bindColumn("password", $password);
        $stmt->bindColumn("id_roll", $id_roll);

        while($fila = $stmt->fetch(PDO::FETCH_BOUND)){
            $user = array();
            $user["email"] = utf8_encode($email);
            $user["password"] = utf8_encode($password);
            $user["id_roll"] = utf8_encode($id_roll);

            if(isset($user["Nombre_Rol"]) &&  $user["Nombre_Rol"] == "Usuario") {

                $_SESSION["usuario"]=$email;
                header("location:../menuusuario.php");

               }else if(isset($user["Nombre_Rol"]) && $user["Nombre_Rol"] == "Administrador") {

                $_SESSION["usuario"]=$email;
                header("location:../administrador/crud/paneladministrador.php");

               }else {
                   echo "Datos Incorrectos";
               }
        }
        if(!empty($user)){
            return $user;
        }else{
            return false;
        }
    }


    public function mostrarcontrasenaModel($email,$document,$tabla){

        $stmt = Database::getconectar()->prepare("SELECT email,document,Contrasena FROM $tabla where email=:email and document=:document");

        $stmt->bindParam(":email",$email);
        $stmt->bindParam(":document",$document);

        $stmt->execute();


        $stmt->bindColumn("email",$email);
        $stmt->bindColumn("document",$document);

        $stmt->bindColumn("Contrasena",$Contrasena);
        //$usuarios = array();






        while($fila = $stmt->fetch(PDO::FETCH_BOUND)){

            $user["email"] = utf8_encode($email);
            $user["document"] = utf8_encode($document);
            $user["Contrasena"] = utf8_encode($Contrasena);

         if($user["email"] != null and $user["document"] != null) {

         return "La contrasena del email del $user[email] es $user[Contrasena]<br>
         <a href='../index.html'> Volver ";}
           else {
               return "El email no existe";
           }
        }

    }


 public function todoGeneroModel($gender,$tabla){

    $stmt = Database::getconectar()->prepare("SELECT Nombre_Genero from $tabla where Nombre_Genero
    <> :Nombre_Genero");

$stmt->bindParam(":Nombre_Genero",$gender,PDO::PARAM_STR);

$stmt->execute();

$stmt->bindParam(":Nombre_Genero",$gender,PDO::PARAM_STR);

return $stmt->fetchAll();

 }

// Hasta aca voy 15.02.21
// Productos

 public function mostrarProductos(){

    $stmt = Database::getconectar()->prepare("SELECT ID_Producto, Nombre_Producto, Imagen_Producto,
     Talla, Color, Material, Valor, Nombre_Categoria, Nombre_Clasificacion,Descripcion
    FROM producto
    join categoria on producto.ID_categoria = categoria.ID_Categoria
    join clasificacion on producto.ID_clasificacion = clasificacion.ID_Clasificacion");

$stmt->execute();

        $stmt->bindParam(":ID_Producto", $ID_Producto,PDO::PARAM_STR);
        $stmt->bindParam(":Nombre_Producto", $Nombre_Producto,PDO::PARAM_STR);
        $stmt->bindParam(":Imagen_Producto", $Imagen_Producto,PDO::PARAM_LOB);
        $stmt->bindParam(":Talla", $Talla,PDO::PARAM_STR);
        $stmt->bindParam(":Color", $Color,PDO::PARAM_STR);
        $stmt->bindParam(":Material", $Material,PDO::PARAM_STR);
        $stmt->bindParam(" Valor",  $Valor,PDO::PARAM_INT);
        $stmt->bindParam(":Nombre_Categoria", $Nombre_Categoria,PDO::PARAM_STR);
        $stmt->bindParam(":Nombre_Clasificacion", $Nombre_Clasificacion,PDO::PARAM_STR);
        $stmt->bindParam(":Descripcion", $Descripcion,PDO::PARAM_STR);

        return $stmt->fetchAll();




 }

 public function createProductoModel($datosModel,$tabla){

$IMG="../fotos/".$datosModel["IMG"];

$stmt = Database::getconectar()->prepare("INSERT into $tabla(ID_Producto,Nombre_Producto,
Imagen_Producto,Talla,Color,Material,Valor,Descripcion,ID_categoria,ID_clasificacion)
values (:ID_Producto,:Nombre_Producto,:Imagen_Producto,:Talla,:Color,:Material,:Valor,:Descripcion,
:ID_categoria,:ID_clasificacion)");

$stmt->bindParam(":ID_Producto", $datosModel["ID_Producto"],PDO::PARAM_STR);
        $stmt->bindParam(":Nombre_Producto", $datosModel["Nombre_Producto"],PDO::PARAM_STR);
        $stmt->bindParam(":Imagen_Producto", $IMG,PDO::PARAM_STR);
        $stmt->bindParam(":Talla", $datosModel["Talla"],PDO::PARAM_STR);
        $stmt->bindParam(":Color", $datosModel["Color"],PDO::PARAM_STR);
        $stmt->bindParam(":Material", $datosModel["Material"],PDO::PARAM_STR);
        $stmt->bindParam(":Valor", $datosModel["Valor"],PDO::PARAM_STR);
        $stmt->bindParam(":Descripcion", $datosModel["Descripcion"],PDO::PARAM_STR);
        $stmt->bindParam(":ID_categoria", $datosModel["ID_categoria"],PDO::PARAM_STR);
        $stmt->bindParam(":ID_clasificacion", $datosModel["ID_clasificacion"],PDO::PARAM_STR);

        if($stmt->execute()){
            return true;
        }else{
            return false;
        }


 }

 public function editarproducto($ID_Producto,$tabla){
    $stmt = Database::getconectar()->prepare("SELECT ID_Producto, Nombre_Producto, Imagen_Producto,
    Talla, Color, Material, Valor, Nombre_Categoria, Nombre_Clasificacion,
    Descripcion
    FROM $tabla
    join categoria on producto.ID_categoria = categoria.ID_Categoria
    join clasificacion on producto.ID_clasificacion = clasificacion.ID_Clasificacion
    where ID_Producto=:ID_Producto");

$stmt->bindParam(":ID_Producto", $ID_Producto,PDO::PARAM_STR);
        $stmt->execute();

        $stmt->bindParam(":ID_Producto", $ID_Producto,PDO::PARAM_STR);
        $stmt->bindParam(":Nombre_Producto", $Nombre_Producto,PDO::PARAM_STR);
        $stmt->bindParam(":Imagen_Producto", $Imagen_Producto,PDO::PARAM_LOB);
        $stmt->bindParam(":Talla", $Talla,PDO::PARAM_STR);
        $stmt->bindParam(":Color", $Color,PDO::PARAM_STR);
        $stmt->bindParam(":Material", $Material,PDO::PARAM_STR);
        $stmt->bindParam(" Valor",  $Valor,PDO::PARAM_INT);
        $stmt->bindParam(":Descripcion", $Descripcion,PDO::PARAM_STR);
        $stmt->bindParam(":ID_categoria", $ID_categoria,PDO::PARAM_STR);
        $stmt->bindParam(":ID_clasificacion", $ID_clasificacion,PDO::PARAM_STR);


return $stmt->fetchAll();




 }

 public function mostrarCategoria($Nombre_Categoria,$tabla){

    $stmt = Database::getconectar()->prepare("SELECT Nombre_Categoria from $tabla
    where Nombre_Categoria <> :Nombre_Categoria");

$stmt->bindParam(":Nombre_Categoria", $Nombre_Categoria,PDO::PARAM_STR);
$stmt->execute();

$stmt->bindParam(":Nombre_Categoria", $Nombre_Categoria,PDO::PARAM_STR);

return $stmt->fetchAll();


 }

 public function mostrarClasificacion($Nombre_Clasificacion,$tabla){

    $stmt = Database::getconectar()->prepare("SELECT Nombre_Clasificacion from $tabla
    where Nombre_Clasificacion <> :Nombre_Clasificacion");

$stmt->bindParam(":Nombre_Clasificacion", $Nombre_Clasificacion,PDO::PARAM_STR);
$stmt->execute();

$stmt->bindParam(":Nombre_Clasificacion", $Nombre_Clasificacion,PDO::PARAM_STR);

return $stmt->fetchAll();


 }

 public function volverImagen($ID_Producto,$tabla){

$stmt = Database::getconectar()->prepare("SELECT ID_Producto, Nombre_Producto, Imagen_Producto,
Talla, Color, Material, Valor, Nombre_Categoria, Nombre_Clasificacion,
Descripcion
FROM $tabla
join categoria on producto.ID_categoria = categoria.ID_Categoria
join clasificacion on producto.ID_clasificacion = clasificacion.ID_Clasificacion
where ID_Producto=:ID_Producto");

$stmt->bindParam(":ID_Producto", $ID_Producto,PDO::PARAM_STR);
$stmt->execute();

$stmt->bindParam(":ID_Producto", $ID_Producto,PDO::PARAM_STR);
        $stmt->bindParam(":Nombre_Producto", $Nombre_Producto,PDO::PARAM_STR);
        $stmt->bindParam(":Imagen_Producto", $IMG,PDO::PARAM_STR);
        $stmt->bindParam(":Talla", $Talla,PDO::PARAM_STR);
        $stmt->bindParam(":Color", $Color,PDO::PARAM_STR);
        $stmt->bindParam(":Material", $Material,PDO::PARAM_STR);
        $stmt->bindParam(" Valor",  $Valor,PDO::PARAM_INT);
        $stmt->bindParam(":Descripcion", $Descripcion,PDO::PARAM_STR);
        $stmt->bindParam(":Nombre_Categoria", $ID_categoria,PDO::PARAM_STR);
        $stmt->bindParam(":Nombre_Clasificacion", $ID_clasificacion,PDO::PARAM_STR);

        return $stmt->fetchAll();


 }


 public function updateProductoModel($datosModel,$tabla){

if($datosModel["Imagen_Producto"] == "../administrador/fotos/".$datosModel["IMG"])

 {
    $IMG="../fotos/".$datosModel["IMG"];
 }
 else {
    $VolverImagen = new Datos();
    $MostrarImagen= $VolverImagen->volverImagen($datosModel["ID_Producto"],"producto");

    if($MostrarImagen){
      foreach($MostrarImagen as $rowimagen => $itemimagen){

     $IMG = $itemimagen["Imagen_Producto"];

      }}
 }

$stmt = Database::getconectar()->prepare("UPDATE $tabla set
Nombre_Producto=:Nombre_Producto,
Imagen_Producto = :Imagen_Producto,Talla=:Talla,Color=:Color,Material=:Material,Valor=:Valor,
Descripcion=:Descripcion,
ID_categoria=:ID_categoria,ID_clasificacion = :ID_clasificacion
where ID_Producto = :ID_Producto");

$stmt->bindParam(":ID_Producto", $datosModel["ID_Producto"],PDO::PARAM_STR);
 $stmt->bindParam(":Nombre_Producto", $datosModel["Nombre_Producto"],PDO::PARAM_STR);
        $stmt->bindParam(":Imagen_Producto",$IMG,PDO::PARAM_STR);
        $stmt->bindParam(":Talla", $datosModel["Talla"],PDO::PARAM_STR);
        $stmt->bindParam(":Color", $datosModel["Color"],PDO::PARAM_STR);
        $stmt->bindParam(":Material", $datosModel["Material"],PDO::PARAM_STR);
        $stmt->bindParam(":Valor", $datosModel["Valor"],PDO::PARAM_STR);
        $stmt->bindParam(":Descripcion", $datosModel["Descripcion"],PDO::PARAM_STR);
        $stmt->bindParam(":ID_categoria", $datosModel["ID_categoria"],PDO::PARAM_STR);
        $stmt->bindParam(":ID_clasificacion", $datosModel["ID_clasificacion"],PDO::PARAM_STR);

        if($stmt->execute()){
            return true;

        }else{
            return false;
        }
 }

 public function deleteProductoModel($ID_Producto, $tabla){

    $stmt = Database::getconectar()->prepare("DELETE  FROM $tabla WHERE ID_Producto=:ID_Producto");

    $stmt->bindParam(":ID_Producto",$ID_Producto, PDO::PARAM_STR);
    $stmt->execute();
}
 }
?>

<?php
require_once 'controllerjson.php';
require_once 'modelojson.php';

function ParametrosDisponibles($params){
    $disponible = true;
    $faltantes = "";

    foreach($params as $param){
        if(!isset($_POST[$param]) || strlen($_POST[$param]) <=0){
            $disponible = false;
            $faltantes = $faltantes . ",". $param;
        }
    }

    if(!$disponible){
        $respuesta = array();
        $respuesta['error'] = true;

        $respuesta['mensaje'] = 'Parametro: ' . substr($faltantes, 1, strlen($faltantes)). 'vacio';
        echo json_encode($respuesta);

        // api

        //detener la ejecucion
        die();
    }
}
$respuesta = array();

if(isset($_GET['apicall'])){

    switch($_GET['apicall']){
        case 'createusuario':

            ParametrosDisponibles(array('document',  'username', 'lastname', 'id_roll', 'gender', 'email', 'phone','address','document_type','password', 'confirm_password'));
            if($_POST["document"]=="" ||
                $_POST["id_roll"]=="" ||

            $_POST["username"]=="" ||
                $_POST["lastname"]=="" ||
                $_POST["gender"]=="" ||

            $_POST["email"]=="" ||
                $_POST["phone"]=="" ||
                $_POST["address"]==""  ||
                $_POST["document_type"]==""  ||
                $_POST["password"]==""  ||
                $_POST["confirm_password"]=="" )

            {
                echo " <h3> Hay Datos Vaciós Por Favor Llenarlos </h3>
                <a href='registrarse.html'> Registrarse </a>
                <a href='index.html'> Ir a la Página Principal </a>
                ";
            }

            else if ($_POST["password"] != $_POST["confirm_password"]  ){

                echo "<h3> Contraseñas no coinciden por Favor intente de nuevo </h3>
                <a href='registrarse.html'> Registrarse </a>
                <a href='index.html'> Ir a la Página Principal </a>";
            }

            else {

            $document_type = $_POST["document_type"];


            switch($_POST["document_type"]){
                case "Cédula de Ciudadanía" : $document_type= "TD01";
            break;
                case "Cédula de Extranjería" : $document_type= "TD02";
            break;
                case "Tarjeta de Identidad" : $document_type= "TD03";
            break;
                case "Pasaporte Extranjero" : $document_type= "TD04";
            break;
                case "Registro Cívil" : $document_type= "TD05";
            break;


            default: echo "No es valido Tipo de Documento";
            break;
            }

            $document = $_POST["document"];
            $username = $_POST["username"];
            $lastname = $_POST["lastname"];
            $gender = $_POST["gender"];
            $email = $_POST["email"];
            $phone = $_POST["phone"];
            $address = $_POST["address"];
            $id_roll= $_POST["id_roll"];
            $password = $_POST["password"];
            $confirm_password = $_POST["confirm_password"];
            if ($gender == "Masculino"){
                $gender = "GEN01";
            }else if ($gender == "Femenino"){
                $gender= "GEN02";
            }else {
                $gender= "";
            }}

            $address = $_POST["address"];

            $id_roll = $_POST["id_roll"];

            if ($_POST["id_roll"] == "users") {
            $id_roll= "1";
            }
            else if ($_POST["ID_Rol"] == "Administrador" ){
                $id_roll = "2";
            }else {
            }

            $db = new Controllerjson();
            $result = $db->createUsuarioController($document, $username, $lastname, $id_roll, $gender, $email, $phone, $address, $document_type, $password, $confirm_password);

        if($result){
            $respuesta['error'] = false;
            $respuesta['mensaje'] = 'Usuario agregado correctamente';

        }else{
            $respuesta['error'] = true;
            $respuesta['mensaje'] = 'Ocurrio un error intenta nuevamente';
        }

    break;

    case 'readusuario':
        ParametrosDisponibles(array('email'));
        $db = new Controllerjson();
        $result = $db->readUsuarioController($_POST["email"]);
        $respuesta['error'] = false;
        $respuesta['mensaje'] = 'Solicitud completada correctamente';
        $respuesta['contenido'] = $db->readUsuarioController($_POST["email"]);


    break;


    case 'loginusuario':
        session_start();
        ParametrosDisponibles(array('email', 'Contrasena'));
        $db = new Controllerjson();
        $result = $db->loginUsuarioController($_POST['email'], $_POST['Contrasena']);

       if(!$result){
            $respuesta['error'] = true;
            $respuesta['mensaje'] = 'Contrasena incorrecta';
        }else{
            $respuesta['error'] = false;
            $respuesta['mensaje'] = 'Bienvenido';
            $respuesta['contenido'] = $result;
        }
    break;

    case 'updateusuario':
 ParametrosDisponibles(array('document','username','lastname',
 'id_roll','gender', 'addres', 'phone',
 'email','password', 'confirm_password'));




if(($_POST["document"]=="" ||
$_POST["username"]== null ) ||
($_POST["lastname"]=="" ||
($_POST["gender"]=="" ||
 $_POST["email"]== null ) ||
 $_POST["phone"]== null ) ||
 $_POST["address"]==null  ||
  ($_POST["id_roll"]=="") ||
  ($_POST["password"]=="" ||
$_POST["confirm_password"]== null ))
        {
            echo " <h3> Hay Datos Vaciós Por Favor Llenarlos </h3>
            <a href='usuarioactualizar.php'> Volver a Actualizar Datos </a>
            <a href='menuusuario.php'> Ir a Menú Usuario </a>";
        }
        else {

            $document_type = $_POST["document_type"];
            $gender= $_POST["gender"];
            $document = $_POST["document"];
            $username = $_POST["username"];
            $lastname = $_POST["lastname"];
            $gender = $_POST["gender"];
            $email = $_POST["email"];
            $phone = $_POST["phone"];
            $address = $_POST["address"];
            $id_roll= $_POST["id_roll"];
            $password = $_POST["password"];
            $confirm_password = $_POST["confirm_password"];

        $db = new Controllerjson();
        $result = $db->updateUsuariosController($document, $username, $lastname, $id_roll, $id_roll, $gender, $email, $phone, $address, $document_type, $password, $confirm_password);

        }


    break;


    case 'updateadminusuario':
        ParametrosDisponibles(array('document','username',
        'lastname','gender', 'phone','address', 'document_type','password','confirm_password'));
       if(
       ($_POST["documento"]=="" || $_POST["documento"]== null ) ||
       ($_POST["Primer_Nombre"]=="" || $_POST["Primer_Nombre"]== null ) || ($_POST["Primer_Apellido"]==""
       || $_POST["Primer_Apellido"]==null ) || ($_POST["fecha_nacimiento"]=="" ||
       $_POST["fecha_nacimiento"]== null ) ||($_POST["Telefono"]=="" ||  $_POST["Telefono"]==null )
       || ($_POST["email"]=="" || $_POST["email"]== null)  ||   ($_POST["ID_Genero"]=="" ||
       $_POST["ID_Genero"]==null )
       ||($_POST["ID_Ciudad"]=="" || $_POST["ID_Ciudad"]== null  ) ||
         ($_POST["direccion"]=="" || $_POST["direccion"]== null ))
               {
                   echo " <h3> Hay Datos Vaciós Por Favor Llenarlos </h3>
                   <a href='usuarioactualizar.php'> Volver a Actualizar Datos </a>
                   <a href='menuusuario.php'> Ir a Menú Usuario </a>";
               }
               else {
               $document= $_POST["document"];
               $gender = $_POST["gender"];
               if($gender == "Masculino"){
                   $gender = "GEN01";
               }
               elseif($gender == "Femenino"){
                   $gender= "GEN02";
               }
               else{
                   $gender = "";
               };
                   $document_type = $_POST["document_type"];
                   $document = $_POST["document"];
                   $username = $_POST["username"];
                   $lastname = $_POST["lastname"];
                   $gender = $_POST["gender"];
                   $email = $_POST["email"];
                   $phone = $_POST["phone"];
                   $address = $_POST["address"];
                   $id_roll= $_POST["id_roll"];
                   $password = $_POST["password"];
                   $confirm_password = $_POST["confirm_password"];
               $db = new Controllerjson();
               $result = $db->updateUsuarioAdminiController($document, $username, $lastname, $id_roll, $id_roll, $gender, $email, $phone, $address, $document_type, $password, $confirm_password);
               }
           break;
    case 'mostrarcontrasena':
        ParametrosDisponibles(array('email','document'));
        $db = new Controllerjson();
      $result = $db->mostrarcontrasenaController($_POST['email'],$_POST['document']);

      $respuesta = $result;
    break;
    case 'deleteusuario':
        ParametrosDisponibles(array('document','document_type'));
        $db = new Controllerjson();
        $result = $db->deleteUsuarioController($_POST['document'], $_POST['document_type']);

        if(!$result){
            $respuesta['error'] = false;
            $respuesta['mensaje'] = 'Usuario Eliminado';
        }else{
            $respuesta['error'] = true;
            $respuesta['mensaje'] = 'Usuario no Existe';
        }
    break;


   case 'createproducto':
    ParametrosDisponibles(array('ID_Producto', 'Nombre_Producto','Talla', 'Color', 'Material', 'Valor', 'Descripcion', 'ID_categoria', 'ID_clasificacion'));

    $ID_Producto =  $_POST["ID_Producto"];
    $Nombre_Producto =  $_POST["Nombre_Producto"];

    $Imagen_Producto= $_FILES["Imagen_Producto"]["name"];

    if(isset($Imagen_Producto) && $Imagen_Producto= $_FILES["Imagen_Producto"]["name"] != ""){
        $Imagen_Producto= $_FILES["Imagen_Producto"]["name"];
      $ruta= $_FILES["Imagen_Producto"]["tmp_name"];
      $destino="../administrador/fotos/".$Imagen_Producto;

      copy($ruta,$destino);

      }
      else {
      $destino = $Nombre_Producto;
      }

    $Talla=$_POST["Talla"];
    $Color= $_POST["Color"];
    $Material=$_POST["Material"];
    $Valor=$_POST["Valor"];
    $Descripcion=$_POST["Descripcion"];
    $ID_categoria= $_POST["ID_categoria"];

    switch ($ID_categoria) {

    case "Chaquetas" :    $ID_categoria = "CAT01";
    break;

    case"Pantalones" :    $ID_categoria = "CAT02";
    break;

    case "Formal" :    $ID_categoria = "CAT03";
    break;

    case "Informal" :    $ID_categoria = "CAT04";
    break;

    case "Blusa" :    $ID_categoria = "CAT05";
    break;

    default: "";
    break;

    }

    $ID_clasificacion= $_POST['ID_clasificacion'];
    switch ($ID_clasificacion) {

      case"Unisex" :    $ID_clasificacion = "CLAS01";
      break;

      case "Mujeres" :    $ID_clasificacion = "CLAS02";
      break;

      case "Niños" :    $ID_clasificacion = "CLAS03";
      break;

      case "Bebes" :    $ID_clasificacion = "CLAS04";
      break;

      case "Niñas" :    $ID_clasificacion = "CLAS05";
      break;

      case "Hombres" :    $ID_clasificacion = "CLAS06";
      break;


      default: "";
      break;
      }

      $db = new Controllerjson();
      $result = $db->createProductoController($ID_Producto,$Nombre_Producto,$destino,$Imagen_Producto,$Talla,$Color,$Material,$Valor,$Descripcion,$ID_categoria,$ID_clasificacion);


    if(!$result){
        $respuesta['error'] = false;
        $respuesta['mensaje'] = 'Producto Agregado';
        header("location:../administrador/crud/administraproducto.php");
    }else{
        $respuesta['error'] = true;
        $respuesta['mensaje'] = 'Producto No Agregado';
     header("location:../administrador/crud/administraproducto.php");
    }

    break;


    case 'updateproducto':
    ParametrosDisponibles(array('ID_Producto', 'Nombre_Producto','Talla', 'Color', 'Material', 'Valor', 'Descripcion', 'ID_categoria', 'ID_clasificacion'));

    if($_POST["ID_Producto"]=="" ||  $_POST["Nombre_Producto"]=="" ||  $_POST["Talla"]=="" || $_POST["Color"]=="" ||

    $_POST["Material"]=="" || $_POST["Valor"]="" || $_POST["ID_categoria"]=="" ||    $_POST["ID_clasificacion"]==""  )

    {

        echo " <h3> Hay Datos Vaciós Por Favor Llenarlos </h3>
        <a href='administraproducto.php'> Volver a Administrar Productos </a>
        <a href='paneladministrador.php'> Ir a Panel de Administración </a>
        ";
    }
    else {
        $ID_Producto = $_POST["ID_Producto"];

      $Nombre_Producto = $_POST["Nombre_Producto"];

      $Imagen_Producto = $_FILES["Imagen_Producto"] ["name"];

      if(isset($Imagen_Producto) &&  $Imagen_Producto = $_FILES["Imagen_Producto"] ["name"] != ""){
        $Imagen_Producto = $_FILES["Imagen_Producto"] ["name"];
      $ruta= $_FILES["Imagen_Producto"] ["tmp_name"];
      $destino="../administrador/fotos/".$Imagen_Producto;
      copy($ruta,$destino);
      }

      else {
        $destino = $Imagen_Producto;
      }

      $Talla = $_POST["Talla"];

      $Color = $_POST["Color"];

      $Material = $_POST["Material"];

      $Valor = $_POST["Valor"];

       $ID_categoria = $_POST["ID_categoria"];

      switch($ID_categoria) {

      case "Chaquetas": $ID_categoria = "CAT01";
      break;

      case "pantalones": $ID_categoria = "CAT02";
      break;

      case "Formal": $ID_categoria = "CAT03";
      break;

      case "Informal": $ID_categoria = "CAT04";
      break;

      case "blusa": $ID_categoria = "CAT05";
      break;

      default: "";
      break;
      }

      $ID_clasificacion = $_POST["ID_clasificacion"];

      switch($ID_clasificacion) {

      case "Unisex":  $ID_clasificacion = "CLAS01";
      break;

      case "Mujeres":  $ID_clasificacion = "CLAS02";
      break;

      case "Niños":  $ID_clasificacion = "CLAS03";
      break;

      case "Bebes":  $ID_clasificacion = "CLAS04";
      break;

      case "Niñas":  $ID_clasificacion = "CLAS05";
      break;

      case "Hombres":  $ID_clasificacion = "CLAS06";
      break;

      default: "";
      break;

      }

      $Descripcion = $_POST["Descripcion"];
    }

    $db =new Controllerjson();
 $result = $db->updateProductoController($ID_Producto,$Nombre_Producto,$destino,$Imagen_Producto,$Talla,$Color,$Material,$Valor,$Descripcion,$ID_categoria,$ID_clasificacion);


 if(!$result){
    $respuesta['error'] = false;
    $respuesta['mensaje'] = 'Producto No Existe';
    header("location:../administrador/crud/administraproducto.php");
}else{
    $respuesta['error'] = true;
    $respuesta['mensaje'] = 'Producto Eliminado';
   header("location:../administrador/crud/administraproducto.php");
}

break;

case 'deleteproducto':
    ParametrosDisponibles(array('ID_Producto'));
    $db = new Controllerjson();
    $result = $db->deleteProductoController($_POST["ID_Producto"]);

    if(!$result){
        $respuesta['error'] = false;
        $respuesta['mensaje'] = 'Producto No Existe';
        header("location:../administrador/crud/administraproducto.php");
    }else{
        $respuesta['error'] = true;
        $respuesta['mensaje'] = 'Producto Eliminado';
        header("location:../administrador/crud/administraproducto.php");
    }
break;

    }
}else{
    $respuesta['error'] = true;
    $respuesta['mensaje'] = 'Llamado invalido del API!';
}
echo json_encode($respuesta);
?>

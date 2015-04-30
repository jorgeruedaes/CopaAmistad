<?
        if(isset($_POST['subir'])){

$archivo = $_FILES['imagen']['tmp_name'];
$unico = time();
$directorio = $_SERVER['DOCUMENT_ROOT'].'/img/'.$unico;
$imagen_path = $directorio.$_FILES['imagen']['name'];
    move_uploaded_file($archivo, $imagen_path);
    echo "Imagen subida con exito";
}
        ?>
function Login()
{
    require("../config/conexion.php");
    $username = trim($_POST['username'])
    $password = trim($_POST['password'])
    query = "SELECT COUNT(*) FROM Usuarios WHERE Usuarios.unombre = $usernane AND
              Usuarios.password = $password";
    $result = $db -> prepare($query);
	$result -> execute();
	$cantidad = $result -> fetchAll();
    if ($cantidad == 1){
        header("main.php")
    }
    else{
        header(index.php)
    }
?>

}
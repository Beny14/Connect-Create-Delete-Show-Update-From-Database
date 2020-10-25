<?php
// V_1 -------------------ConnectDb----------------------

    $serverName = 'localhost';
    $userName = 'root';
    $password = '';
    $dbName = 'masini';

    $connect = mysqli_connect($serverName, $userName, $password, $dbName);

    if (!connect) {
        echo "Conectarea la baza de date nereusita.";
    }else{
        echo "Conectarea la baza de date reusita.";
    }

    mysqli_close($connect);

// V_2 -------------------CreateDb----------------------

    $serverName = 'localhost';
    $userName = 'root';
    $password = '';
    $dbName = 'masini';

    $connect = mysqli_connect($serverName, $userName, $password, $dbName);

    $sql = 'CREATE DATABASE masini';
    $result = mysqli_query($connect, $sql);

    if(!$result){
        die("Nu s-a putut crea baza de date sau este duplicata." . mysqli_error());
    }else{
        echo "Db created";
    }

// V_3 ------------------DropDb------------------------

    $serverName = 'localhost';
    $userName = 'root';
    $password = '';
    $dbName = 'masini';

    $connect = mysqli_connect($serverName, $userName, $password, $dbName);

    $sql = 'DROP DATABASE masini';
    $result = mysqli_query($connect, $sql);

    if (!result) {
        die("Nu s-a putut sterge db" . mysqli_error());
    }else{
        echo "Db deleted !";
    }

// V_4 --------------------DropTable---------------------

    $serverName = 'localhost';
    $userName = 'root';
    $password = '';
    $dbName = 'masini';

    $connect = mysqli_connect($serverName, $userName, $password, $dbName);

    $sql = 'DROP TABLE models';
    $result = mysqli_query($connect, $sql);

    if (!result) {
        die("Nu s-a putu sterge tabelul");
    }else{
        echo "Tabel sters!";
    }

// V_5 -------------------AfisareDate-----------------------

    $serverName = 'localhost';
    $userName = 'root';
    $password = '';
    $dbName = 'masini';

    $connect = mysqli_connect($serverName, $userName, $password, $dbName);

    $sql = 'SELECT * FROM models';
    $result = mysqli_query($connect, $sql);

    if (!$result) {
        die("Nu s-a putut afisa datele din db" . mysqli_error());
    }else{
        echo "Afisarea datelor a avut success";
    }

    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
        echo "user_id: {$row['user_id']} <br>" . 
             "name: {$row['name']} <br>" . 
             "password: {$row['password']} <br>" . 
             ".................................";
    }

    mysqli_free_result($result);

// V_6 ------------------UpdateDate----------------------

    $serverName = 'localhost';
    $userName = 'root';
    $password = '';
    $dbName = 'masini';

    $connect = mysqli_connect($serverName, $userName, $password, $dbName);

    if (isset($_POST['update'])) {
       $user_id = mysqli_real_escape_string($_POST['user_id']);
       $name = mysqli_real_escape_string($_POST['name']);
       $email = mysqli_real_escape_string($_POST['email']);
       $password = mysqli_real_escape_string($_POST['password']);

        $sql = "SELECT users" . "SET name='$name', email='$email'. password='$password'" . "WHERE user_id='$user_id'";
        $result = mysqli_query($connect, $sql);

        if (!$result) {
                die("Nu s-a putut updata datele din db" . mysqli_error());
        }else{
                echo "Updatarea datelor a avut success";
        }
    }

// V_7 -----------------DeleteId---------------------

    $serverName = 'localhost';
    $userName = 'root';
    $password = '';
    $dbName = 'masini';

    $connect = mysqli_connect($serverName, $userName, $password, $dbName);

    $sql = "DELETE FROM user WHERE user_id = '$user_id'";
    $result = mysqli_query($connect, $sql);

      if (!$result) {
         die("Nu s-a putut sterge datele din db" . mysqli_error());
      }else{
         echo "Steregerea datelor a avut success";
      }

?>
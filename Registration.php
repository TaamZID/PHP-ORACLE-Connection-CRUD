<?php 
include 'dbconnection.php';
   
if(isset($_POST['a_id'])){
    $stmInsert = $db->prepare('INSERT INTO Admin (A_ID,A_NAME,A_UNAME,A_PASSWORD,A_EMAIL) VALUES (:A_ID,:A_NAME,:A_UNAME,:A_PASSWORD,:A_EMAIL)');
    $params = [
        ':A_ID' => $_POST['a_id'],
        ':A_NAME' => $_POST['a_name'],
        ':A_UNAME' => $_POST['a_uname'],
        ':A_PASSWORD' => $_POST['a_password'],
        ':A_EMAIL' => $_POST['a_email']
    ];
    $resultInsert = $stmInsert->execute($params);
    $response = 'Not Entered';
    if($resultInsert && $stmInsert->rowCount()>0){
        $response = 'Data Entered Successfully';
    }
    echo $response;
} 
?>

<form method="POST">
    <fieldset style="width:30%;text-align: center;margin-left: 515;">
    <h1>Registration</h1>
    <input type="text" name="a_id" placeholder="ID"><br><br>
    <input type="text" name="a_name" placeholder="Name"><br><br>
    <input type="text" name="a_uname" placeholder="Username"><br><br>
    <input type="text" name="a_password" placeholder="Password"><br><br>
    <input type="text" name="a_email" placeholder="Email"><br><br>
    <button type="submit">Signup</button> 
    <a href="login.php">Login</a>
    </fieldset> 
</form>

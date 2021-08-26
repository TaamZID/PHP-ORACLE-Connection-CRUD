<?php 
include 'dbconnection.php';
session_start();
   
if(isset($_POST['a_id'])){
    $sql = 'INSERT INTO Admin (A_ID,A_NAME,A_UNAME,A_PASSWORD,A_EMAIL) VALUES (:A_ID,:A_NAME,:A_UNAME,:A_PASSWORD,:A_EMAIL)';
    if($_POST['id_for_update']){
        $sql = 'UPDATE ADMIN SET A_ID = :A_ID, A_NAME= :A_NAME, A_UNAME = :A_UNAME, A_PASSWORD = :A_PASSWORD, A_EMAIL = :A_EMAIL WHERE A_ID = :A_ID';
    }
    $stmInsert = $db->prepare($sql);
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
    //echo $response;
   } 
   $result_for_update = NULL;
   if(isset($_GET['a_id'])){
    $stm = $db->prepare('SELECT * FROM Admin WHERE A_ID = :A_ID');
    $stm->bindParam(':A_ID', $_GET['a_id']);
    $stm->execute();
    $result_for_update = $stm->fetch(PDO::FETCH_OBJ);
   }
?>

<form method="POST">
    <fieldset style="width:30%;text-align: center;margin-left: 515;">
    <h1>Edit Profile</h1>
    <input type="hidden" name="id_for_update" value="<?=$result_for_update? true : false?>">
    <input type="text" name="a_id" placeholder="ID" value="<?=$result_for_update ? $result_for_update->A_ID : ''?>"><br><br>
    <input type="text" name="a_name" placeholder="Name" value="<?=$result_for_update ? $result_for_update->A_NAME : ''?>"><br><br>
    <input type="text" name="a_uname" placeholder="Username" value="<?=$result_for_update ? $result_for_update->A_UNAME : ''?>"><br><br>
    <input type="text" name="a_password" placeholder="Password" value="<?=$result_for_update ? $result_for_update->A_PASSWORD : ''?>"><br><br>
    <input type="text" name="a_email" placeholder="Email" value="<?=$result_for_update ? $result_for_update->A_EMAIL : ''?>"><br><br>
    <button type="submit">Save</button> 
    <h3>
    <a href="viewAdmin.php">View Profile</a>
</h3>
    </fieldset> 
</form>

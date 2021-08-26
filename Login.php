 <?php 

include 'dbconnection.php';
$username = '';
$password = '';

if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    if(empty($username) || empty($password)){
        echo "Username or Password is required.";
    }
    else{
        $stm = $db->prepare('SELECT A_ID FROM ADMIN WHERE A_UNAME = :A_UNAME AND A_PASSWORD = :A_PASSWORD');
        $stm-> bindParam(':A_UNAME',$username);
        $stm-> bindParam(':A_PASSWORD',$password);  
        $stm-> execute();
        $result = $stm->fetch(PDO::FETCH_OBJ);
        if($result){
            header('location: adminDashboard.php');
        }
        else{
            echo "Login Failed";
        }
    }
}

?>

<form method="POST"  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <br> <br>
    <fieldset style="width:30%;text-align: center;margin-left: 515;">
    <legend>LOGIN</legend>
    <input type="text" name="username" placeholder="username" value="<?= $username? $username:''?>"><br> <br>
    <input type="password" name="password" placeholder="password" value="<?= $password? $password:''?>"><br><br>
    <button type="submit" name="submit" value="Submit">Login</button>
    </fieldset>
</form>




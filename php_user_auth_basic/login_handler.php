<?php
//<!--login_handler.php-->
session_start();

date_default_timezone_set('America/Los_Angeles');

//user info with unencrypted passwords -- FS1 (for testing purposes)
//$user_info = [
//    ['id'=>0, 'username'=>'kbrov', 'password'=>'FroBro'],
//    ['id'=>1, 'username'=>'stantheman', 'password'=>'WendysBoy'],
//    ['id'=>2, 'username'=>'deathConquerer', 'password'=>'Mysterion'],
//    ['id'=>3, 'username'=>'chili_master', 'password'=>'RespectMyAuthority'],
//    ['id'=>4, 'username'=>'prof chaos', 'password'=>'ohHamburgers']
//];

//user info with encrypted passwords -- FS2
$user_info = [
    ['id'=>0, 'username'=>'kbrov', 'password'=>'05b43aa05ab1cff5d85ae5ad2421b9373088e7aa'],
    ['id'=>1, 'username'=>'stantheman', 'password'=>'58367652ad983fc43a895402c031fd18da64af91'],
    ['id'=>2, 'username'=>'deathConquerer', 'password'=>'04ac410db2695c09c72df01ffb358c62bb05dc7f'],
    ['id'=>3, 'username'=>'chili_master', 'password'=>'b079df2e0389d420a05f8fcf404a54dfc582a26e'],
    ['id'=>4, 'username'=>'prof chaos', 'password'=>'8161658cc8af32702e3cd563801894b0b4bde762']
];

$username = $_POST['username'];
$password = sha1($_POST['password']);

$login_successful = false;
foreach ($user_info as $user){
    if($user['username'] === $username){
        if($user['password'] === $password){
            $_SESSION['user_id'] = $user['id'];
            $login_successful = true;
            break;
        }
    }
}

////for feature set 1
//if($login_successful) {
//    print('You have successfully logged in.');
//}else{
//    print('Sorry. Incorrect username or password');
//}

//feature set 2
$output = [];
if($login_successful){
    $output['success'] = true;
    $output['user_id'] = $user['username'];
    $output['message'] = 'You have successfully logged in. Welcome '.$user['username'].'!';
}else{
    $output['success'] = false;
    $output['message'] = 'Sorry. Incorrect username or password';
}

$output_string = json_encode($output);
print($output_string);
?>
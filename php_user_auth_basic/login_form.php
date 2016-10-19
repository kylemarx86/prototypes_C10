<!--login_form.php-->
<html>
<head>
    <script src="https://code.jquery.com/jquery-2.1.4.js"></script>
    <script>
        function makeAjaxCall(){
            var username = $("input[name='username']").val();
            var password = $("input[name='password']").val();
//            console.log('user: ', username, 'pass: ',password);
            $.ajax({
                url: 'login_handler.php',
                data: {
                    username: username,
                    password: password
                },
                cache: false,
                method: 'post',
                dataType: 'json',
                success: function(response){
//                    console.log(response);
                    $('#response').text(response.message);
                },
                error: function (response) {
//                    console.log(response);
                    $('#response').text('FAILED TO CONNECT TO SERVER');
                }
            });
        }
    </script>
</head>
<body>
<form>
    username<input type="text" name="username"><br>
    password<input type="password" name="password"><br>
    <button type="button" name="login" onclick="makeAjaxCall()">Login</button>
    <p id="response"></p>
</form>
</body>
</html>
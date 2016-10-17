<!--login_form.php-->
<html>
<head>
    <script src="https://code.jquery.com/jquery-2.1.4.js"></script>
    <script>
        function makeAjaxCall(){
            var username = $("input[name='username']");
            var password = $("input[name='password']");
            $.ajax({
                url: 'login_handler.php',
                data: {
                    username: username,
                    password: password
                },
                cache: false,
                method: 'post',
                dataType: 'text',
                success: function(response){
                    console.log(response);
                }
            });
        }
    </script>
</head>
<body>
<form>
    username<input name="username"><br>
    password<input name="password"><br>
    <button type="button" name="login" onclick="">Login</button>
</form>
</body>
</html>
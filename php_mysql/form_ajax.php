<html>
<head>
    <script src="https://code.jquery.com/jquery-2.1.4.js"></script>
    <script>

        $(document).ready(function () {
            applyButtonHandler();
        });

        function applyButtonHandler() {
//            console.log('button handler applied');
            $('button').click(makeAjaxCall);
        }

        function makeAjaxCall() {
//            console.log('button clicked');
            $.ajax({
                url: 'index_insert.php',
                method: 'post',
                dataType: 'text',
                data: {
                    title: $("input[name='title']").val(),
                    details: $("input[name='details']").val(),
                    timestamp: $("input[name='timestamp']").val()
                },
                success: function(response){
                    console.log('connected to server');
                    console.log(response);
                },
                error: function (response) {
                    console.log('error connecting to server');
                    console.log(response);
                }
            });
        }

    </script>
</head>
<body>
<form>
    Title<input name="title" type="text"><br>
    Details<input name="details" type="text"><br>
    Timestamp<input name="timestamp" type="date"><br>
    Difficulty<input name="difficulty" type="number"><br>
    <button type="button">Submit</button>
</form>
</body>
</html>
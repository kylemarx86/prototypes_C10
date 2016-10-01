<!DOCTYPE html>
<html>
<head>
    <script src="https://code.jquery.com/jquery-2.1.4.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet"
          type="text/css"/>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script>
        function load_files() {
            $.ajax({
                url: 'get_images.php',
                dataType: 'json',
                success: function (response) {
                    if(response.success){
                        var images = response.files;
                        var $container = $('<div>');
                        for (var i = 0; i < images.length; i++) {
                            var $image = $('<img>').attr({
                                src: images[i],
                                width: '25%'
                            });
                            $image.click(handleImageClick);
                            $container.append($image);
                        }
                        $('body').append($container);
                    }
                },
                error: function (response) {
                    console.log('no connection');
                }
            });
        }

        function handleImageClick() {
            console.log('image was clicked');
            var $modal = $('<div>').addClass('modal fade').attr('role','dialog');
            var $image = $('<img>').attr('src',$(this).attr('src'));
            $image.attr('width','100%');
//            console.log($image);
            $modal.append($image);
            console.log('this is ',this);
            $('body').append($modal);
        }

        load_files();
    </script>
</head>
<body></body>
</html>

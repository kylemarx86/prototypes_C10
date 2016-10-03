<?php

?>

<html>
<head>
    <link href="carousel_style.css" type="text/css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-2.1.4.js"></script>
    <script>
        var image_array = null;
        var current_image = null;

        $(document).ready(function () {
            createFeaturesAndButtons();
            load_files();
            applyEventHandlers();

        });

        function createFeaturesAndButtons() {
            var $container = $('<div>').attr('id','image_container');
            //create next and previous buttons and attach the appropriate handler
            var $prevButton = $('<button>').attr('id','prevButton').text('<');
            var $nextButton = $('<button>').attr('id','nextButton').text('>');

            //add buttons to container
            $container.append($prevButton);
            $container.append($nextButton);
            //add container to body
            $('body').append($container);
        }
        //make ajax call to get_images.php and saves those images to image_array
        function load_files() {
            $.ajax({
                url: 'get_images.php',
                dataType: 'json',
                success: function (response) {
                    if(response.success){
                        //gather all images
                        image_array = response.files;
                        //create an image and set the source
                        current_image = 0;
                        var $image = $('<img>').attr('src',image_array[current_image]);
                    }
                    $('#image_container').append($image);
                },
                error: function (response) {
                    console.log('connection error');
                }
            });
        }
        
        function next_image(){
            console.log('next image');
            if(current_image < image_array.length - 1){
                current_image += 1;
            }else{
                current_image = 0;
            }
            update_image();
        }
        
        function prev_image() {
            console.log('previous image');
            if(current_image > 0){
                current_image -= 1;
            }else{
                current_image = image_array.length - 1;
            }
            update_image();
        }

        function update_image() {
            $('#image_container').find('img').attr('src',image_array[current_image]);
        }
        
        function applyEventHandlers() {
            $('#prevButton').click(prev_image);
            $('#nextButton').click(next_image);
        }
    </script>
</head>
<body></body>
</html>

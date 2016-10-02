<?php

?>

<html>
<head>
    <script src="https://code.jquery.com/jquery-2.1.4.js"></script>
    <script>
        $(document).ready(function () {
            createFeaturesAndButtons();
            load_files();
            applyEventHandlers();

        });

        function createFeaturesAndButtons() {
            var $container = $('<div>').attr('id','imageContainer');
            //create next and previous buttons and attach the appropriate handler
            var $prevButton = $('<button>').attr('id','prevButton').text('prev');
            var $nextButton = $('<button>').attr('id','nextButton').text('next');

            //add buttons to container
            $container.append($prevButton);
            $container.append($nextButton);
            //add container to body
            $('body').append($container);
        }

        function load_files() {
            $.ajax({
                url: 'get_images.php',
                dataType: 'json',
                success: function (response) {
                    if(response.success){
                        //gather all images
                        var images = response.files;
                        //create an image and set the source
                        var $image = $('<img>').attr('src',images[0]);
                    }
                    $('#imageContainer').append($image);
                },
                error: function (response) {
                    console.log('connection error');
                }

            });
        }
        
        function next_image(){
            console.log('next image');
        }
        
        function prev_image() {
            console.log('previous image');
        }
        
        function applyEventHandlers() {
            $('#prevButton').click(prev_image);
            $('#nextButton').click(next_image);
        }
    </script>
</head>
<body></body>
</html>

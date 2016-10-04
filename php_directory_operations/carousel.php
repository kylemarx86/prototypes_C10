<?php

?>

<html>
<head>
    <link href="carousel_style.css" type="text/css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-2.1.4.js"></script>
    <script>
        var image_array = [];
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
                        var files = response.files;

                        //set up the gathered images
                        for(var i = 0; i < files.length; i++){
                            image_array.push($('<img>').attr('src', files[i]));
                            $('#image_container').append(image_array[i]);
//                            var $image = $('<img>').attr('src',image_array[i]);
                        }
                        initialize();

                        //create all images

                        //stack all images

                    }

                },
                error: function (response) {
                    console.log('connection error');
                }
            });
        }

        //sets up pictures for display
        function initialize() {
            //create an image and set the source
            current_image = 0;

            for(var i = 0; i < image_array.length; i++){
//                image_array[i].attr({'left':'100%','visibility':'hidden'});
                image_array[i].attr('left','100%');
            }
//            image_array[current_image].attr('visibility','visible');
        }
        
        function next_image(){
//            console.log('next image');
            if(current_image < image_array.length - 1){
                current_image += 1;
            }else{
                current_image = 0;
            }
            update_image();
        }
        
        function prev_image() {
//            console.log('previous image');
            if(current_image > 0){
                current_image -= 1;
            }else{
                current_image = image_array.length - 1;
            }
            update_image();
        }

        function update_image(direciton) {
//            image_array
//            $('#image_container').find('img').attr('src',image_array[current_image]);


            //declare old image

            //declare new image
            var new_image_index = null;
            if(direciton === 1){
                if (current_image < image_array.length - 1) {
                    new_image_index += 1;
                } else {
                    new_image_index = 0;
                }
            }else{
                if(current_image > 0){
                    new_image_index -= 1;
                }else{
                    new_image_index = image_array.length - 1;
                }
            }


            //prepare new image for move in

            //slide previous image out

            //slide new image in
//            image_array[current_image].visibility('visible');

            //update current_image
            current_image = new_image_index;
        }
        
        function applyEventHandlers() {
            $('#prevButton').click(prev_image);
            $('#nextButton').click(next_image);
        }
    </script>
</head>
<body></body>
</html>

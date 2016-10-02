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
                        var $container = $('<div>').addClass('container').attr('id','imageContainer');
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

        function createBlankModal() {
            //create div with class modal and fade with id = imageModal
            var $modal = $('<div>').addClass('modal fade').attr('id','imageModal');
            //create div with class modal-dialog
            var $modalDialog = $('<div>').addClass('modal-dialog');
            //create div with class modal-content
            var $modalContent = $('<div>').addClass('modal-content');
            //create image
//            var $image = $('<img>').attr('src','images/beagle_.jpg');   //temp hardcoded
//            var $image = $('<img>').attr('src',$(this).attr('src'));      //is prob gonna work
            var $image = $('<img>');
            //add image to div with class modal-content
            $modalContent.append($image);
            //add div with class modal-content to div with class modal-dialog
            $modalDialog.append($modalDialog);
            //add div with class modal-dialog to div with class modal
            $modal.append($modalDialog);
            //add div with class modal to the container
            $('#image_container').append($modal);
        }

        function handleImageClick() {
            $(this).attr('data-toggle','modal');
            //change image source in the modal

            //show the modal


            console.log('this this right now: ', this);
            console.log('this image right now: ', $($image));

//            $(this).attr({'data-toggle':'modal','data-target':$modal});



//            var $container = $('<div>').addClass('container');
//            var $modal = $('<div>').addClass('modal fade').attr('role','dialog');
//            var $modal_content = $('<div>').addClass('modal-content');
//            var $image = $('<img>').attr('src','images/beagle_.jpg');
////            var $image = $('<img>').attr('src',$(this).attr('src'));      //is prob gonna work
//            $image.attr('width','100%');
//            $modal_content.append($image);
//            $modal.append($modal_content);
//
//            $modal.append('#imageContainer');
////            $('body').append($container);
//            console.log('this is ',this);
//            $(this).attr({'data-toggle':'modal','data-target':$modal});
        }

        load_files();
    </script>
</head>
<body></body>
</html>

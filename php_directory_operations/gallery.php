<!DOCTYPE html>
<html>
<head>
    <script src="https://code.jquery.com/jquery-2.1.4.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet"
          type="text/css"/>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function () {
            console.log('document go')

            createBlankModalAndImageContainer();
            load_files();
        })

        function createBlankModalAndImageContainer() {
            //create div with id imageConatiner
            var imageContainer = $('<div>').attr('id','imageContainer');
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
            //add div with class modal to the div with id imageContainer
            $('imageContainer').append($modal);
            //add image container to the body
            $('body').append(imageContainer);
        }

        function load_files() {
            $.ajax({
                url: 'get_images.php',
                dataType: 'json',
                success: function (response) {
                    if(response.success){
                        var images = response.files;
//                        var $container = $('<div>').addClass('container').attr('id','imageContainer');
                        var $container = $('#imageContainer');
                        for (var i = 0; i < images.length; i++) {
                            var $image = $('<img>').attr({
                                src: images[i],
                                width: '25%'
                            });
                            $image.click(handleImageClick);
                            $container.append($image);
                        }
                    }
                },
                error: function (response) {
                    console.log('no connection');
                }
            });
        }



        //when image is clicked, the modal's image should be changed to actively clicked image and the modal should appear
        function handleImageClick() {
//            $(this).attr('data-toggle','modal');
            //find modal in the image_container

            //change image source in the modal
            var $modal = $('#imageModal');

            console.log('modal', $modal);
            var $image = $modal.find('img').attr('src','images/beagle_.jpg');
//            var $image = $('<img>').attr('src','images/beagle_.jpg');   //temp hardcoded
//            $image.attr('src',$(this).attr('src'));      //is prob gonna work
            //show the modal
//            $modal.show();
            $modal.modal();
            $modal.show();

//            $(this).attr({'data-toggle':'modal','data-target':$modal});
            $(this).attr('data-target',$modal);
            $(this).attr('data-toggle','modal');

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
    </script>
</head>
<body></body>
</html>

<!DOCTYPE html>
<html>
<head>
    <script src="https://code.jquery.com/jquery-2.1.4.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet"
          type="text/css"/>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function () {
            load_files();
        });

        function load_files() {
            var imageContainer = $('<div>').attr('id','imageContainer');
            $('body').append(imageContainer);

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
            //find modal
            var $modal = $('#imageModal');
            //change image source in the modal with the image of the clicked image
            var $imageSrc = $(this).attr('src');
            $modal.find('img').attr({src:$imageSrc, width:'100%'});
            //activate modal
            $modal.modal();
        }
    </script>
</head>
<body>
    <div id="imageModal" class="modal">
        <div class="modal-content">
            <img> <!--image source will be loaded dynamically on click-->
        </div>
    </div>
</body>
</html>
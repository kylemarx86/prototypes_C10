//Create GLOBAL variable below here on line 2
var global_result;

$(document).ready(function(){
    $('button').click(function(){
        console.log('click initiated');
        $.ajax({
            dataType: 'json',
            url: 'http://ax.itunes.apple.com/WebObjects/MZStoreServices.woa/ws/RSS/topMovies/json',
            success: function(result) {
                console.log('AJAX Success function called, with the following result:', result);
                global_result = result;
                var first_movie = global_result.feed.entry[0]['im:image'][2].label;

                //FS3 - Adding the images
                var movieImages = [];
                var movieInfo = [];
                for(var i = 0; i < global_result.feed.entry.length; i++){
                    movieImages[i] = global_result.feed.entry[i]['im:image'][2].label;
                    movieInfo[i] = global_result.feed.entry[i]['title'].label;
                    $currentImage = $('<img>').attr({'src': movieImages[i], 'title': movieInfo[i]});

                    $('#main').append($currentImage);
                }
            }
        });
        console.log('End of click function');
    });
});
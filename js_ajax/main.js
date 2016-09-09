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
                // var movieDivs = [];
                for(var i = 0; i< global_result.feed.entry.length; i++){
                    var $movieDiv = $('<div>');
                    (function(){
                        var index = i;
                        // movieDivs.push('target_element', $movieDiv);
                        movieImages[index] = global_result.feed.entry[index]['im:image'][2].label;
                        movieInfo[index] = global_result.feed.entry[index]['title'].label;
                        $currentImage = $('<img>').attr({'src': movieImages[index], 'title': movieInfo[index]});
                        // $movieDiv = $('div');
                        $movieDiv.text(movieInfo[index]);
                        $movieDiv.addClass('imgBlock');
                        $movieDiv.append($currentImage);
                    })();
                    $('#main').append($movieDiv);
                }
            }
        });
        console.log('End of click function');
    });
});
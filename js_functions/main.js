//funciton writing a message to the console
function myMessage(){
    console.log("They may take our lines, but they will never take our functions!");
}
//function adding two numbers together and writing answer to the console
function add(x,y){
    var sum = x + y;
    console.log("The sum of "+ x + " and " + y + " is " + sum);
}
//new adding function with a return value
function add2(x, y){
    var total = x + y;
    return total;
}
//the result of adding two specific numbers with the add2 function
    //used in button 'ADD #2' on index.html
add2result = add2(10, 36);
//
function cardFlip(element){
    $(element).hide();
}
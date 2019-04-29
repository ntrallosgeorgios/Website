/*
 * Author: Georgios
 * Target: apply. html
 * Purpose: Validate form
 * Created: 19/9/2017
 * Last Update: 13/9/2017
 * Credits: assignment part 2
 */

"use strict";

var numbImg = 0; //we define the first number of the images to 0 of the [0,1,2]
var slog = "IT solutions is an Australia’s leading IT Services Provider. We have a strong team of IT specialists all around Melbourne. We employ only the most talented IT consultants and our helpdesk locating 20 minutes from the Center of Melbourne. With our knowledge your success is secured.";
var lett = 0;

function rotaSli() {


    var slides = document.getElementsByClassName("ItSlideShow"); // array of the images
    //here we take any picture from transform aver 
    for (var i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }



    numbImg++; // here add every time one image number 

    // here check if the number of image is greater tha then length
    // and if it is gived the number 1 to start from the start
    if (numbImg > slides.length) {
        numbImg = 1;
    }


    // because it gives the number 1 the images because are in array they mast start from 0 
    //display the privious image as a block using css
    slides[numbImg - 1].style.display = "block";

    setTimeout(rotaSli, 3000); // Change image every 2 seconds
}



function typWrit() {

    // check the letters if they are bigger than the text of the string
    if (lett < slog.length) {
        document.getElementById('phom').innerHTML += slog.charAt(lett); // use th charAt fucntion that return specific character in the tring and we put it inside the html
        lett++; // after that we add one letter every time
        setTimeout(typWrit, 75); // we use the timer and used a loop with speed 75 until print all the character                                   
    }
}

function init() {

    rotaSli();
    typWrit();
}

window.onload = init;
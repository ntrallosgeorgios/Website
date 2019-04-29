/*
 * Author: Georgios
 * Target: apply. html
 * Purpose: Validate form
 * Created: 19/9/2017
 * Last Update: 23/9/2017
 * Credits: assignment part 2
 */

"use strict";

var alError = "";

function valid() {

   // var isValid = false;
    var isValid = true;
   /* var valDate = validInputDate();
    var valState = checkState();
    var valOthSk = choosenSkills();
    */
    var DBA = document.getElementById('isDBA').checked;
    var SQL = document.getElementById('isSQL').checked;
    var Oracle = document.getElementById('isOracle').checked;
    var Linux = document.getElementById('isLinux').checked;
    var isNetwroking = document.getElementById('isNetwroking').checked;
    var VPN = document.getElementById('isVPN').checked;
    var Cisco = document.getElementById('isCisco').checked;
    var othSkills = document.getElementById('othSkills').checked;

    /*
    // if all them are true... then the validation is true...
    if (valDate && valState && valOthSk) {
        isValid = true;
    } else {
        var alMess = document.getElementById('errMess');
        alMess.innerHTML = alError;
        alError = "";
        var isValid = false;
    }
    */

    // if the validation is true then stores the values to the localstorage
    if (isValid) {
        var genders = getGender();
        stJobSeakerApp(genders, DBA, SQL, Oracle, Linux, isNetwroking, VPN, Cisco, othSkills)
    }

    return isValid;

}


// we check the date.
function validInputDate() {

    var dateVal = true;
    var curYear = new Date();
    var getDate = document.getElementById('dateCe').value;
    var pattern = /^\d{1,2}\/\d{1,2}\/\d{4}$/;

    if (!getDate.match(pattern)) {
        alError += "Your date must have follow that forman dd/mm/yyyy \n";
        dateVal = false;
    }

    var splYear = getDate.split('/');
    var fifYearOld = curYear.getFullYear() - 15;
    var eighYearOld = curYear.getFullYear() - 80;

    // With that we check if the format of the year is valid
    // plus if the input is correct for the days, months and year
    if ((splYear[0] < 1) || (splYear[0] > 31)) {

        alError += "The input date must be between 1 and 31 \n";
        dateVal = false;
    }

    if ((splYear[1] < 1) || (splYear[1] > 12)) {

        alError += "The input year must be between 1 and 12 \n";
        dateVal = false;
    }

    if ((splYear[2] > fifYearOld) || (splYear[2] < eighYearOld)) {

        alError += "You can't apply if you are under 15 and over 80 old ! \n";
        dateVal = false;

    }
    if (splYear[2] > curYear.getFullYear()) {
        alError += "The input year must be under that year " + curYear.getFullYear() + "\n";
        dateVal = false;
    }

    return dateVal;
}

// take the selected state and check if the first number is something like the numbers of the states
function checkState() {

    var corState = true;
    var state = document.getElementById('state').value;
    var getpostcode = document.getElementById('postCod').value;
    var postcode = getpostcode.toString();

    switch (state) {
        case "vic":
            if (postcode[0] == '3' || postcode[0] == '8') {
                corState = true;
            } else {
                alError += "The post code of VIC must start from 3 or 8\n"
                corState = false;
            }
            break;
        case "nsw":
            if (postcode[0] == '1' || postcode[0] == '2') {
                corState = true;
            } else {
                alError += "The post code of NSW must start from 1 or 2\n"
                corState = false;
            }
            break;
        case "qld":
            if (postcode[0] == '4' || postcode[0] == '9') {
                corState = true;
            } else {
                alError += "The post code of QLD must start from 4 or 9\n"
                corState = false;
            }
            break;
        case "act":
        case "nt":
            if (postcode[0] == '0') {
                corState = true;
            } else {
                alError += "The post code of NT must start from 0\n"
                corState = false;
            }
            break;
        case "wa":
            if (postcode[0] == '6') {
                corState = true;
            } else {
                alError += "The post code of WA must start from 6\n"
                corState = false;
            }
            break;
        case "sa":
            if (postcode[0] == '5') {
                corState = true;
            } else {
                alError += "The post code of SA must start from 5\n"
                corState = false;
            }
            break;
        case "tas":
            if (postcode[0] == '7') {
                corState = true;
            } else {
                alError += "The post code of NT must start from 7\n"
                corState = false;
            }
            break;
        default:
            alError += "The postcode is not in Australia!!\n"
            corState = false;
    }


    return corState;
}

// we verify that when the check box other values exist then we must fill the other skills.
function choosenSkills() {

    var othSk = true;
    var othSkil = document.getElementById("othSkills").checked;
    var textArea = document.getElementById("isOthSki").value;

    // if ithSkil is checked then the function continues
    if (othSkil) {
        if (textArea.length < 1) {
            alError += "You must put something to other skills or uncheck it!!";
            othSk = false;
        }
    }

    return othSk;
}

// We create that fucntion to get the selected value of the gender
function getGender() {

    var gen = "Unknown";

    // create an array with the Genders
    var genArray = document.getElementById('genders').getElementsByTagName('input');


    for (var i = 0; i < genArray.length; i++) {
        if (genArray[i].checked) {
            gen = genArray[i].value;
        }
    }

    return gen;
}


// Store all the values to the localStorage
function stJobSeakerApp(genders, DBA, SQL, Oracle, Linux, isNetwroking, VPN, Cisco, othSkills) {

    var jobID = document.getElementById('jobReNum').value;
    var firstNam = document.getElementById('FirName').value;
    var lastNam = document.getElementById('LasName').value;
    var date = document.getElementById('dateCe').value;
    var street = document.getElementById('StrAddr').value;
    var SubTown = document.getElementById('SubTown').value;
    var state = document.getElementById('state').value;
    var postCod = document.getElementById('postCod').value;
    var email = document.getElementById('email').value;
    var phone = document.getElementById('phone').value;
    var isOthSki = document.getElementById('isOthSki').value;

    var skills = "";
    if (DBA) skills = "DBA";
    if (SQL) skills += " SQL";
    if (Oracle) skills += " Oracle";
    if (Linux) skills += " Linux";
    if (isNetwroking) skills += " Networking";
    if (VPN) skills += " VPN";
    if (Cisco) skills += " Cisco";
    if (othSkills) skills += " othSkills";

    localStorage.jobID = jobID;
    localStorage.firstNam = firstNam;
    localStorage.lastNam = lastNam;
    localStorage.date = date;
    localStorage.gender = genders;
    localStorage.street = street;
    localStorage.SubTown = SubTown;
    localStorage.state = state;
    localStorage.postCod = postCod;
    localStorage.email = email;
    localStorage.phone = phone;
    localStorage.skills = skills;
    localStorage.isOthSki = isOthSki;

}

// with that function restore the values and keep them in the page
function retriveFieldOfTheForm() {

    if (localStorage.jobID != undefined) {
        document.getElementById('jobReNum').value = localStorage.jobID;
    }

    if (localStorage.firstNam != undefined) {
        document.getElementById('FirName').value = localStorage.firstNam;
    }

    if (localStorage.lastNam != undefined) {
        document.getElementById('LasName').value = localStorage.lastNam;
    }

    if (localStorage.date != undefined) {
        document.getElementById('dateCe').value = localStorage.date;
    }

    if (localStorage.street != undefined) {
        document.getElementById('StrAddr').value = localStorage.street;
    }

    if (localStorage.SubTown != undefined) {
        document.getElementById('SubTown').value = localStorage.SubTown;
    }

    if (localStorage.postCod != undefined) {
        document.getElementById('postCod').value = localStorage.postCod;
    }

    if (localStorage.email != undefined) {
        document.getElementById('email').value = localStorage.email;
    }

    if (localStorage.phone != undefined) {
        document.getElementById('phone').value = localStorage.phone;
    }
    if (localStorage.isOthSki != undefined) {
        document.getElementById('isOthSki').value = localStorage.isOthSki;
    }

    if (localStorage.gender != undefined) {

        // check if one of the values is selected from defore... and if yes
        // we use the localstorage to check it again
        switch (localStorage.gender) {
            case 'M':
                document.getElementById('male').checked = true;
                break;
            case 'F':
                document.getElementById('female').checked = true;
                break;
        }
    }

    if (localStorage.state != undefined) {

        // create an array with options of drop down menu 
        var stAr = document.getElementById('state').getElementsByTagName('option');

        // check if one value of the array is equal with the value of the localstorage
        // and after that select the value of the drop down if it's correct
        for (var i = 0; i < stAr.length; i++) {
            if (stAr[i].value == localStorage.state) {
                stAr[i].selected = true;
                break;
            }
        }

    }

    if (localStorage.skills != undefined) {

        var sk = localStorage.skills.split(" ");
        var skAr = document.getElementById('sk').getElementsByTagName('input');

        for (var i = 0; i < skAr.length; i++) {
            for (var e = 0; e < sk.length; e++) {
                if (skAr[i].value == sk[e]) {
                    skAr[i].checked = true;
                }
            }
        }

    }

}

// we set the value from the clicked job
// and we store it in the localStorage.
function clickedJob() {

    var jobid = this.id;

    if (jobid == 'aplBut1') {

        localStorage.job = 'AB123';
    }

    if (jobid == 'aplBut2') {

        localStorage.job = 'BA345';
    }

}

/*
// we use it in the apply.html to print the job ID 
function jobPrint() {

    document.getElementById("choose_job").textContent = localStorage.job;
    document.getElementById("choosen").value = localStorage.job;

}

// is the init function for the jobs.html
// we identify the which href clicked
function initJobs() {

    var jobs = document.getElementsByName('jobApply');

    for (var i = 0; i < jobs.length; i++) {
        jobs[i].onclick = clickedJob;
    }
}
*/

// is the init function for the form
function initForm() {

    var verifForm = document.getElementById('formApply');

   // jobPrint(); // we print the job that we select from the job.html
    retriveFieldOfTheForm(); // we prefill the form values.

    verifForm.onsubmit = valid;


}

window.onload = initForm;

/*
window.onload = function() {
    if (document.getElementById('aplBut1')) initJobs();
    if (document.getElementById('formApply')) initForm();
};
*/



  <!-- FORM HANDLING -->

function Validate(){
  var formtrue;
  var tel = document.forms["vform"]["telefone"].value;
  var ira = document.getElementById("customCheckbox1");
  var pass =  document.getElementById("customCheckbox2");
  var tak =  document.getElementById("customCheckbox3");
  var prm =  document.getElementById("customCheckbox4");
  var ibnd = document.forms["vform"]["ibindi"].value;
  var akarerebyabuze = document.forms["vform"]["akarerebyabuze"].value;
  var umugi = document.forms["vform"]["umugi"].value;
  var itariki = document.forms["vform"]["itariki"].value;
  var amazinayuwataye = document.forms["vform"]["amazinayuwataye"].value;
  var livedistrict = document.forms["vform"]["livedistrict"].value;
  var livecity = document.forms["vform"]["livecity"].value;


  if (akarerebyabuze == "" || umugi == "") {
    document.getElementById('diserror').innerHTML ="<small class='text-danger'><b>" + "Andika aho byaburiye.<b></small>";
    formtrue = false;
  }
  if (itariki == "") {
    document.getElementById('itariki_error').innerHTML ="<small class='text-danger'><b>" + "igihe byaburiyeho.<b></small>";
    formtrue = false;
  }
  if (!(ira.checked || pass.checked || tak.checked || prm.checked) && ibnd=="") {
    document.getElementById('property_error').innerHTML ="<small class='text-danger'><b>" + "Hitamo ibyo wataye cyangwa wandike.<b></small>";
    formtrue = false;
  }
  if (livecity== "" || amazinayuwataye== "" || livedistrict== "") {
    document.getElementById('custm_error').innerHTML ="<small class='text-danger'><b>" + "Uzuza umwirondoro wawe neza.</b></small>";
    formtrue = false;
  }
  if (tel == "" || isNaN(tel) || tel.length < 10 ){
    document.getElementById('telefone_error').innerHTML ="<small><b class='text-danger'>" + "Shyiramo imibare 10.</b></small>";
    formtrue = false;
  }
  if (formtrue == false) {
    return false;
  }
}




function validateFound(){
  var formtrue;
  var tel = document.forms["foundform"]["telefone"].value;
  var ira = document.getElementById("customCheckboxIrangamuntu");
  var pass =  document.getElementById("customCheckboxPassport");
  var tak =  document.getElementById("customCheckboxIcyangombwa_cyubutaka");
  var prm =  document.getElementById("customCheckboxPerimi");
  var ibnd = document.forms["foundform"]["ibindi"].value;
  var akarerebyabuze = document.forms["foundform"]["akarerebyabuze"].value;
  var umugi = document.forms["foundform"]["umugi"].value;
  var itariki = document.forms["foundform"]["itariki"].value;
  var amazinayuwataye = document.forms["foundform"]["amazinayuwataye"].value;
  var livedistrict = document.forms["foundform"]["livedistrict"].value;
  var livecity = document.forms["foundform"]["livecity"].value;


  if (akarerebyabuze == "" || umugi == "") {
    document.getElementById('diserror1').innerHTML ="<small class='text-danger'><b>" + "Andika aho wabitoraguye.<b></small>";
    formtrue = false;
  }
  if (itariki == "") {
    document.getElementById('itariki_error1').innerHTML ="<small class='text-danger'><b>" + "Igihe byatoraguwe.<b></small>";
    formtrue = false;
  }
  if (!(ira.checked || pass.checked || tak.checked || prm.checked) && ibnd=="") {
    document.getElementById('property_error1').innerHTML ="<small class='text-danger'><b>" + "Hitamo ibyo wabitoraguye cyangwa wandike.<b></small>";
    formtrue = false;
  }
  if (livecity== "" || amazinayuwataye== "" || livedistrict== "") {
    document.getElementById('custm_error1').innerHTML ="<small class='text-danger'><b>" + "Uzuza umwirondoro wawe neza.</b></small>";
    formtrue = false;
  }
  if (tel == "" || isNaN(tel) || tel.length < 10 ){
    document.getElementById('telefone_error1').innerHTML ="<small><b class='text-danger'>" + "Andika imibare 10.</b></small>";
    formtrue = false;
  }
  if (formtrue == false) {
    return false;
  }
}


  <!-- VALIDATE IBINDI -->
  
var title = document.querySelector("#title");
var max = 60;
title.addEventListener('keyup',function() {
  var left = document.getElementById('left');
    if (title.value.length > max) {
         title.value = title.value.substring(0, max);
         title.style.border = "2px solid red";
    } else {
        left.textContent = max - title.value.length;
        title.style.border = "1px solid green";
    }
});


<!-- SWITCH TABS -->

function openCity(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace("active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();

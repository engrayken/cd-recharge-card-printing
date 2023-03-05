
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}

function servicenav() {
  var x = document.getElementById("servicenav");
  if (x.className === "servicenav") {
    x.className += "servicenav";
  } else {
    x.className = "servicenav";
  }
}


function msgnav() {
  var x = document.getElementById("msgnav");
  if (x.className === "msgnav") {
    x.className += "msgnav";
  } else {
    x.className = "msgnav";
  }
}



function sidebar() {
  var x = document.getElementById("sidebar");
  if (x.className === "sidebar") {
    x.className += " responsive";
  } else {
    x.className = "sidebar";
  }
}
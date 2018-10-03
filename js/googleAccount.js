window.onload = function () {
    onLoad();
}

function onLoad() {
    gapi.load('auth2', function () {
        gapi.auth2.init();
    });
}

function onSignIn(googleUser) {
    var profile = googleUser.getBasicProfile();

    /*   if (profile.getEmail().includes("@tlu.ee")) { */
    var userName = profile.getName();
    var userEmail = profile.getEmail();
    var sessionStatus = "create";

    $.post("./php/session.php", { userName: userName, userEmail: userEmail, sessionStatus: sessionStatus });
    $.get("./php/db/isUserAdmin.php", function (isAdmin) {
        if (isAdmin == "true") {
            window.location = "./admin.php";
        } else if (profile.getEmail().includes("@tlu.ee")) {
            window.location = "./main.php";
        } else if (!profile.getEmail().includes("@tlu.ee") && isAdmin != "true") {
            alert("Palun logi sisse kasutades enda TLÜ kontot.");
            signOut();
        }
    });
}

function signOut() {
	var sessionStatus = "destroy";
        $.post("./php/session.php", { sessionStatus: sessionStatus });
	document.location.href = "https://www.google.com/accounts/Logout?continue=https://appengine.google.com/_ah/logout?continue=http://localhost:5555/~haavmihk/suvepraktika/index.html";

  }
function isAdmin() {
    $.get("./php/db/isUserAdmin.php", function (result) {
        if (result != "true") {
            alert("Teil puudub ligipääs");
            window.location = "./main.php";
        }
    });
}
window.onload = function() {
    onLoad();
}

function onLoad() {
    gapi.load('auth2', function () {
        console.log("Success");
        gapi.auth2.init();
    });
}

function onSignIn(googleUser) {
    var profile = googleUser.getBasicProfile();

    if (profile.getEmail().includes("@tlu.ee")) {
        var userName = profile.getName();
        var userEmail = profile.getEmail();
        var sessionStatus = "create";

        $.post("./php/session.php", {userName:userName, userEmail:userEmail, sessionStatus:sessionStatus});
        
        window.location = "./main.php";
    } else {
        alert("Palun logi sisse kasutades enda TLÜ kontot.");
        signOut();
        console.log('User signed out.');
        window.location.reload(true)
    }
}

function signOut() {
    var auth2 = gapi.auth2.getAuthInstance();
    auth2.signOut().then(function () {
        var sessionStatus = "destroy";
        $.post("./php/session.php", {sessionStatus:sessionStatus});
        console.log('User signed out.');
        window.location = "./index.html";
    });
}
function getUserInfo() {
    var storedEmail = localStorage.getItem("email");
    var storedPassword = localStorage.getItem("password");

   

    return {
        email: storedEmail,
        password: storedPassword
        
    };
}


function updateProfile() {
    var userInfo = getUserInfo();

    
    if (userInfo.email) {
        document.getElementById("profileEmail").innerText = userInfo.email;
    }

    
}
function check() {
    $.ajax({
        url: 'http://localhost/vendor/redis.php',
        method: 'GET',
        success: function(response) {
            if (response.data === true) {
                window.location.href = 'profile.html';
            } else {
                window.location.href = 'login.html';
            }
        },
        error: function(error) {
            console.error('Error:', error);
            window.location.href = 'login.html';
        }
    });
}

window.onload = function () {
    updateProfile();
};
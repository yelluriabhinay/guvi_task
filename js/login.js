function submitForm() 
{
    var formData = $("#myForm").serialize();

    $.ajax({
        type: "POST",
        url: "../DATABASE/Login.php",
        data: formData
        
    });
}

function login() {
    
    var enteredUsername = document.getElementById("email").value;
    var enteredPassword = document.getElementById("password").value;

    
    var storedUsername = localStorage.getItem("email");
    var storedPassword = localStorage.getItem("password");

    
    if (enteredUsername === storedUsername && enteredPassword === storedPassword) 
    {
        alert("Login successful!");
       
    } 
    else 
    {
        alert("Invalid username or password.");
    }
}
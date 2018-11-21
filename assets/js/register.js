function checkPasswordsMatch() {
    var password = document.getElementById('password');
    var password2 = document.getElementById('password2');
    var message = document.getElementById('confirmMessage');

    var goodColor = "#66cc66";
    var badColor = "#ff6666";

    if(password.value == password2.value){
        password2.style.backgroundColor = goodColor;
        message.style.color = goodColor;
        message.innerHTML = "Password Match"
    }else {
        password2.style.backgroundColor = badColor;
        message.style.color = badColor;
        message.innerHTML = "Passwords Do Not Match"
    }
}
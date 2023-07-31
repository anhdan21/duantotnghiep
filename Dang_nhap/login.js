function login (){
    event.preventDefault();
    var username = document.getElementById("username").value;
    var password = document.getElementById("password").value;

    var user = {
        username: username,
        password: password,
    }
    if(user = null){
        alert ("Vui long nhap day du thong tin");
    }
    if(username == "admin" && password == "123456789"){
       
        alert("thanh cong")
    }
    else{
        alert("Dang nhap that bai");
    }
}
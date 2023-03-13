const api = "https://63a689f7318b23efa7ab5f8e.mockapi.io/api/login";

function getInfo() {
    var a = "";
    var valid = false;
    var username = document.getElementById('user').value;
    var password = document.getElementById('password').value;
    axios.get(`${api}`).then(res => {
        var myJson = res.data;
        for (var i = 0; i < myJson.length; i++) {
            if ((username == myJson[i].username) && (password == myJson[i].password)) {
                valid = true;
                a = myJson[i].email

                break;
            }
        }
        if (valid == true) {

            // localStorage.setItem("username", username)
            // localStorage.setItem("email", a)
            window.location = "http://127.0.0.1:5500/duanthaydinh/pageuser.html"
            alert(username + " bạn đăng nhập thành công!")

            
            valid = false;
        } else {
            alert("Vui lòng kiểm tra tài khoảng của bạn")
            ressetlogin()
        }
    })
}



function regiter() {

    var name1 = document.getElementById('userres').value
    var email = document.getElementById('email').value
    var passwordres = document.getElementById('passwordres').value
    axios.get(`${api}`).then(res => {
        for (var i = 0; i < res.data.length; i++) {
            if (email == res.data[i].email) {
                alert('Email đã tồn tại')
                return
            }if(name1 == res.data[i].email){
                alert('Tài khoản đã tồn tại')
                return
            }
        }
        // post data
        var data = {
            username: name1,
            email: email,
            password: passwordres,

        }
        axios.post(api, data)
            .then(() => {
                alert("Đã đăng ký thành công")
                location.reload()
            })
    })



}




function ressetlogin() {
    document.getElementById('user').value = '';
    document.getElementById('password').value = '';
}

function ressetlogin() {
    document.getElementById('userres').value = '';
    document.getElementById('email').value = '';
    document.getElementById('passwordres').value = '';

}


var x = document.getElementById('login');
var y = document.getElementById('register');
var z = document.getElementById('btn');

function register() {
    x.style.left = "-400px";
    y.style.left = "50px";
    z.style.left = "110px";

}

function login() {
    x.style.left = "50px";
    y.style.left = "400px";
    z.style.left = "0";

}

isBool = true;

function showHidden() {
    if (isBool) {
        document.getElementById("password").setAttribute("type", "text");
        document.getElementById("passwordres").setAttribute("type", "text");

        isBool = false;
    } else {
        document.getElementById("password").setAttribute("type", "password");
        document.getElementById("passwordres").setAttribute("type", "password");
        isBool = true
    }
}

function formValidation(){
const name = document.getElementById("name");
const phoneNumber = document.getElementById("phone");
const email = document.getElementById("email");
var pass = document.getElementById("password");
var cpass =document.getElementById("cpassword");
    var letters = /^[A-Za-z]+$/;
    var mail_format = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    if(!name.value.match(letters))
    {
        alert('Username must have alphabet characters only');
        name.focus();
        return false;
    }
    else if(!phoneNumber.value.match(/^[1-9][0-9]{9}$/)) {
        alert("Phone number must be 10 characters long number and first digit can't be 0!");
        phoneNumber.focus();
        return false;
    }
    else if(!email.value.match(mail_format))
    {
        alert("You have entered an invalid email address!");
        email.focus();
        return false;
    }
    else if(pass.value.length < 6)
    {
        alert("Password length must be atleast 6 characters ");
        return false;
    }
    else if (pass.value != cpass.value) {
        alert ("\nPassword did not match: Please try again...")
        return false;
    }
    else{
        return true;
    }
}

function al(){
    alert("already register")
    }
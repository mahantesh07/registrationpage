function validateform(){
  var fname=document.form1.fname.value;
  var lname=document.form1.lname.value;
  var phone=document.form1.phone.value;
  var email=document.form1.email.value;
  var pwd=document.form1.password.value;
if (fname==null || fname==""){
    document.getElementById("first").innerHTML="Please enter your first name";
    return false;
}else if (lname==null || lname==""){
    document.getElementById("last").innerHTML="Please enter your last name";
    return false;
}
else if (isNaN(phone)){
  document.getElementById("numloc").innerHTML="Please enter valid phone number";
    return false;
}
else if (phone.length<10){
  document.getElementById("numloc").innerHTML="Not a valid 10-digit phone number";
    return false;
}
else if(email==null || email==""){
  document.getElementById("mail").innerHTML="Please enter your email id";
    return false;
}
else if(pwd==null || pwd==""){
  document.getElementById("pwd").innerHTML="Please enter your password";
    return false;
}
}

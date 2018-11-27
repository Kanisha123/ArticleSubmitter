function validate(frm1)
{
var p1=frm1.Password.value;
var p2=frm1.passwordConfirm.value;

if(p1!=p2)
{
alert("Password not match");
return false;
}

if(frm1.terms.checked==false)
{
alert("Please Select CheckBox");
return false;
}

else
{
return true;
}

}

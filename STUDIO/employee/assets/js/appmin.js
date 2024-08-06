function validation()
{
    if(document.getElementById("id").value=="1032013" |
		document.getElementById("id").value=="1032014"
       && document.getElementById("key").value=="panda")
    {
        location.href="apphome.html";
    }
    else
    {
        alert( "validation failed" );
      
    }
}
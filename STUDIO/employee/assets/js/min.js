
function validation()
{
    if(document.getElementById("id").value=="1032013" |
		document.getElementById("id").value=="1032014" |
		document.getElementById("id").value=="1032016"
       && document.getElementById("key").value=="panda")
    {
        location.href="home.html";
    }
    else
    {
        alert( "validation failed" );
      
    }
}
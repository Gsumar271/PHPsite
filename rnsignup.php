<?php
include_once 'rnheader.php';

echo <<<_END

   
<script>

function checkUser(user)
{
    
    if(user.value=="")
    {
        document.getElementById('info').innerHTML=''
        return;
    }
    params = "user="+user.value;
    request = new ajaxRequest()
    request.open("POST", "rncheckuser.php", true);
    request.setRequestHeader("Content-type",
        "application/x-www-form-urlencoded")
    request.setRequestHeader("Content-length", params.length)
    request.setRequestHeader("Connection", "close")
    
    request.onreadystatechange=function()
    { 
        if(this.readystate==4)
        {
            if(this.status==200)
            {
                if (this.responseText!=null)
                {
                    document.getElementById('info').innerHTML=
                        this.responseText
                }
                else alert("Ajax error: No data recieved")
            }
         }
         
     }
     request.send(params)   
}

function ajaxRequest()
{
	try
	{
		var request = new XMLHttpRequest()
	}
	catch(e1)
	{
		try 
		{
			request = new ActiveXObject("Msxml2.XMLHTTP")
		}
		catch(e2)
		{
			try
			{
				request = new ActiveXObject("Microsoft.XMLHTTP")
			}
			catch(e3)
			{
				request = false;
			}
		}
	}
	return request;
    
    
}
</script>
<h3>Sign up form</h3>
_END;

$error = $user = $pass = "";
if (isset($_SESSION['user']))
    destroySession();

if (isset($_POST['user']))
{
    $user = sanitizeString($_POST['user']);
    $pass = sanitizeString($_POST['pass']);
    
    if ($user =="" || $pass == "")
    {
        $error = "Not all fields are entered<br /><br />";
    }
 else
        
 {
     $query = "SELECT * FROM rnmembers WHERE user = '$user'";
     
     if (mysql_num_rows(queryMysql($query)))
     {
         $error = "That username already exists<br /><br />";
     }
 else
     {
        $query = "INSERT INTO rnmembers VALUES('$user','$pass')"; 
        queryMysql($query);
        die("<h4>Account created</h4>Please log in.");
      
     }
        
 
 }
}

echo <<<_END
<form method='post' action = 'rnsignup.php'>$error
Username <input type = 'text' maxlength ='16' name = 'user' value = '$user'
    onblur ='checkUser(this)'/><span id='info'></span><br />
Password <input type = 'password' maxlength ='16' name = 'pass' 
    value = 'pass' /><br />
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
<input type = 'submit' value = 'Signup' />
</form>
_END;
?>

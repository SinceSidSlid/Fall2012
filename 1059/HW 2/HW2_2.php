<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<title>An XHTML 1.0 Strict standard template</title>
	<meta http-equiv="content-type" 
		content="text/html;charset=utf-8" />

    <?php
        if($_POST['Change'] == "Toggle")
    {   
        echo "
        <style type=\"text/css\">
            #box{
                width:700px;
                background-color:#000000;
            }

            #header{
                color:#3577FF;
            }

            #p1{
                color:#3577FF;
            }

            #p2{
                color:#3577FF;
            }
        </style>
        ";
    }
    else
    {
        echo "
        <style type=\"text/css\">
            #box{
                width:500px;
                background-color:#FFFFFF;
            }

            #header{

            }

            #p1{

            }

            #p2{

            }
        </style>
        ";  
    }
    ?>
</head>

<body>
<div id="box">
<h1 id="header">This is the Toggle Page</h1>

<p id="p1">When you press the button below, the CSS on the page will change.</p>

<p id="p2">So give it a try!</p>

<form action="HW2_2.php" method="post">
    
    <p>
     <?php
     
        if($_POST['Change'] == "Toggle") {   
            echo "<input type=\"submit\" name=\"Change\" value=\"Toggle Back!\" />";
        }

        else{   
            echo "<input type=\"submit\" name=\"Change\" value=\"Toggle\" />";
        }


        ?>

    </p>

</form>

</div>



</body>

</html>
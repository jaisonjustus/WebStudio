<?php if(!class_exists('raintpl')){exit;}?><!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <title>Login Page</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

        <link rel="stylesheet" href="<?php echo $site;?>media/styles/test.css" type="text/css" media="screen"/>
    </head>
    <body>
        <div id="wrapper">
            <div id="form-wrapper">
                <form name="loginForm" action="<?php echo $site;?>profile/login" method="POST">
                    <ul>
                        <li>
                            <?php echo $userName;?>

                        </li>
                        <li>
                            <?php echo $passWord;?>

                        </li>
                        <li>
                            <input type="submit" name="submit"/>
                        </li>
                    </ul>
                </form>
            </div>
        </div>
    </body>
</html>

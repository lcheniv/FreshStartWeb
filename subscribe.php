<html>

    <head>
        <title>Subscribe | FS</title>
    </head>

    <link rel="stylesheet" type="text/css" href="subscribe_style.css">

    <body>

    <div id="form">

            <form method="post" action="">

                  <table>

                        <h2>Want to subscribe? Please fill out the following form: </h2>
                        <tr>
                            <td colspan=2>
                                <span id="font_edit"><strong>Tell us what you thought:</strong></span>
                            </td>
                        </tr>  

                        <tr>
                            <td>Want to contact us? (Share with us your favorite shows):</td>
                            <td>
                                <select name="sendto"> 
                                    <option value="lcheniv@gmail.com">Lawrence</option> 
                                    <option value="salil.depsi@gmail.com">Syed</option>
                                </select>
                            </td>
                        </tr>
                        
                        <tr>
                            <td><font color=red>*</font> Email:<br></td>
                            <td><input size=25 name="Email"></td>
                        </tr> 
                        
                        <tr>
                            <td>Subscribe to <br> mailing list?</td>

                            <td><input type="radio" name="list" value="No"> No thanks.<br> 
                                <input type="radio" name="list" value="Yes" checked> Yes, I want to more Fresh Starts.<br>
                            </td>
                        </tr>  
                        
                        <tr>
                            <td colspan=2>Message:</td>
                        </tr> 
                        
                        <tr>
                            <td colspan=2 align=center><textarea name="Message" rows=10 cols=50></textarea></td>
                        </tr> 
                        
                         <tr>
                             <td colspan=2 align=center>
                             <input type=submit name="send" value="Submit">
                             </td>
                        </tr>  
                        
                        <tr>
                            <td colspan=2 align=center><small> <font color=red>*</font> indicates a field is required</small></td>
                        </tr>  

                </table>

            </form> 

            <?php

              $to = $_REQUEST['sendto'];  
              $from = $_REQUEST['Email'];  
              $headers = "From: $from";  
              $subject = "Received the following data";   

              $fields = array();  
              $fields{"Email"} = "Email";   
              $fields{"list"} = "Mailing List";  
              $fields{"Message"} = "Message";   
              $body = "We have received the following information:\n\n"; 

              foreach($fields as $a => $b){ 

                  $body .= sprintf("%20s: %s\n",$b,$_REQUEST[$a]);

              }   

                   $headers2 = "From: noreply@freshstart.com";  
                   $subject2 = "Thank you for contacting the Fresh Start team!";  
                   $autoreply = "Thank you for contacting us. We hope you enjoy our selection as much as we have. From time to time we will send you e-mails"
                                . "letting you know that we have added a new feature or added more of a selection." 
                                . "If you have any more questions, contact us at lcheniv@gmail.com or salil.depsi@gmail.com."
                                . "Or return to http://codd.cs.gsu.edu/~lchen21/Project1/main.html and fill out another sign-up form.";
                   
                   if($from == '') {
                       
                       print "Please enter an e-mail. It is a required field.";

                   } else {  
                                    $send = mail($to, $subject, $body, $headers);  
                                    $send2 = mail($from, $subject2, $autoreply, $headers2);  
                        
                        if($send)  {

                            header( "Location: http://codd.cs.gsu.edu/~lchen21/Project1/thankyou.html" );

                        }  else  {

                            print "We encountered an issue, please try again later."; 

                    } 
                } 
            
            ?>

            </div>

            <div id="navbar">
            <table>
                 <tr>
                    <td><a href="main.html"> Home </a></td>                      
                    <td><a href="lawrence.php">Lawrence</a></td>
                    <td><a href="jaffar.php">Syed</a></td>
                </tr>
            </table>
        </div>
            
        </body>

</html>
<?php
$firstname = $lastname = $email = $message = "";
$firstname_Err = $lastname_Err = $email_Err = $message_Err = "";

                        
if ($_SERVER['REQUEST_METHOD']=="POST"){
    if (empty($firstname = htmlspecialchars(strip_tags($_POST['TonPrenom'])))) {
        $firstname_Err = "First name is required";
        $border_Err;
        }else{
            NULL;
    };

    if (empty($lastname = htmlspecialchars(strip_tags($_POST['TonNom'])))) {
        $lastname_Err = "Last name is required";
        }else{
            NULL;
    };

    $gender = htmlspecialchars(strip_tags($_POST['TonSex']));

    $email = filter_var($_POST['TonCourrier'], FILTER_SANITIZE_EMAIL);
    
    $email = $_POST['TonCourrier'];
    if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
        $email_Err = "is not a valid email address";
    } else {
        NULL;
    };
    
    $country = htmlspecialchars(strip_tags($_POST['TonPays']));

    $subject = htmlspecialchars(strip_tags($_POST['TonTheme']));

    if (empty($message = htmlspecialchars(strip_tags($_POST['TonBlabla'])))) {
        $message_Err = "You have to provide us with a message";
        }else{
            NULL;
    };

    $gender = $_POST['TonSex'];
    $country = $_POST['TonPays'];
    $subject = $_POST['TonTheme'];

    if (isset($_POST['Submitreset'])){
        if ($_POST['Submitreset']=="Reset") {
            $firstname = $lastname = $email = $message = "";
            $gender = "Male";
            $country = "Belgium";
            $subject = "other";
            $firstname_Err = $lastname_Err = $email_Err = $message_Err = $success = $error = "";
        }
    };
    //echo "<pre>";
    //print_r ($_POST);
    
    
    if(isset($_POST["rendu"])){
        if($firstname_Err OR $lastname_Err OR $email_Err OR $message_Err == ""){
            $to = "$email";
            $subject = 'Request to Hackers Poulette';
            $reply = 'You succesfully sent your request to our services!';
            $headers = "From".$from;
            if (mail($to, $subject, $reply, $headers)) {
               echo "success";
            } else {
               echo "error";
            }
        }else{
            NULL;
        }
    }
};



/*
echo "<pre>";
print_r($_SERVER);
echo "</pre>";
*/
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Exercise: Make a contact-form. Second month of the training. Use of PHP</title>
        <link rel="shortcut icon" type="image/png" href="assets/img/hackers-poulette-logo.png"/>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">    </head>
        <link rel="stylesheet" href="assets/css/style.css">
    </head>

    <body>
        <div class = "body">
        <div class="container">

            <div class = "row mt-4 text-center">
                <div class = "col-12 col-md-1">
                    <a class="nav-link" href="">Home</a>
                </div>
                <div class = "col-12 col-md-10">
                    <h1>Feel free to contact us!</h1>
                    <p>Seeking informations, willing to solve a problem or to send love to Johnson's coaches?</p>
                    <p>You just are at the the right place!</p>
                </div>
                
            </div>
                                         
            <div class = "row text-center">
                <div class = "col-12 mt-6">
                    <img src="assets/img/hackers-poulette-logo.png" alt="logo de l'enteprise Hackers-Poulette" class="img-responsive">
                </div>               
            </div>
            <div class ="row mt-10 text-center">
                <div class = "col-12">
                    <h5>Please, keep in mind you have to fill all the fields bellow in order us to help you our best</h5>
                    <p>We guarantee you an answer within <strong>48 hours</strong> at max</p>
                </div>
            </div> 

            <form method="POST" action='index.php?'>   

                <div class ="row mt-2 text-center">
                    <div class ="col-12 col-md-6 text-center">
                        <label for="TonPrenom">Your first name is:</label>
                        <input class="form-control" type="text" name="TonPrenom" alt= "indicate your first name" value = <?php echo "$firstname"?>>
                        <span class="error">* <?php echo $firstname_Err;?></span>
                    </div>

                    <div class ="col-12 col-md-6 mt-1 text-center">
                        <label for="TonNom">Your last name is:</label>
                        <input class="form-control" type="text" name="TonNom" alt= "indicate your last name" value = <?php echo "$lastname"?>>
                        <span class="error">* <?php echo $lastname_Err;?></span>
                    </div>

                    <div class ="col-12 col-md-6 mt-2 text-center">
                        <label for="TonSex">Your gender is:</label><br>
                        <select name="TonSex" size="1" class="form-control" alt= "choose your gender">
                            <option value="Male" <?php if (isset($gender) && $gender=="Male") echo "selected";?>>Male</option>
                            <option value="Female" <?php if (isset($gender) && $gender=="Female") echo "selected";?>> Female</option>
                            <option value="Other" <?php if (isset($gender) && $gender=="Other") echo "selected";?>> Other</option>
                        </select>
                        <span class="error">*</span>
                    </div>

                    <div class ="col-12 col-md-6 mt-2 text-center">
                    <label for="TonCourrier">Your e.Mail adress is:</label>
                        <input class="form-control" type="email" name="TonCourrier" alt= "indicate your email" value = <?php echo "$email"?>>
                        <span class="error">* <?php echo $email_Err;?></span>
                    </div>

                    <div class ="col-12 col-md-6 text-center">
                        <label for="TonPays">Your country is:</label><br>
                        <select name="TonPays" size="1" alt= "choose your country" class="form-control">
                            <option value="Belgium" <?php if (isset($country) && $country=="Belgium") echo "selected";?>>Belgium</option>
                            <option value="France" <?php if (isset($country) && $country=="France") echo "selected";?>> France</option>
                            <option value="Luxemburg" <?php if (isset($country) && $country=="Luxemburg") echo "selected";?>> Luxemburg</option>
                            <option value="Switzerland" <?php if (isset($country) && $country=="Switzerland") echo "selected";?>> Switzerland</option>
                            <option value="JohnsonLand" <?php if (isset($country) && $country=="JohnsonLand") echo "selected";?>> JohnsonLand</option>
                        </select>
                        <span class="error">*</span>
                    </div>

                    <div class ="col-12 col-md-6 mt-1 text-center">
                        <label for="TonTheme">Subject of your message:</label><br>
                        <select name="TonTheme" size="1" alt= "choose your subject" class="form-control">
                            <option value="Other" <?php if (isset($subject) && $subject=="Other") echo "selected";?>> Other</option>
                            <option value="Emily" <?php if (isset($subject) && $subject=="Emily") echo "selected";?>>About Emily that is soooo great</option>
                            <option value="Marvin" <?php if (isset($subject) && $subject=="Marvin") echo "selected";?>> About Marvin who is soooo intelligent</option>
                            <option value="Congrats-us" <?php if (isset($subject) && $subject=="Congrats-us") echo "selected";?>> You wish to congrat our team</option>
                            <option value="trouble-shooting" <?php if (isset($subject) && $subject=="trouble-shooting") echo "selected";?>> You wish to solve a problem</option>
                        </select>
                    </div>

                    <div class ="col-12 mt-2 text-center">
                        <label for="TonBlabla">Your message</label>
                    </div>
                    <div class ="col-12 mt-1 text-center">
                        <textarea id="TonBlabla"name="TonBlabla"rows="5"cols="50" alt= "provide us your message" class="form-control"><?php if(isset($message))echo"$message";?></textarea><br>
                        <div class="error">* <?php if (isset($message_Err)) echo "$message_Err";?></div>
                    </div>

                    <div class = "col-6 text-center">
                        <input type="submit" value="submit">
                    </div>
                    <div class = "col-6 text-center">
                    <input type= "hidden" name="rendu" value="1">
                        <input type="submit" name="Submitreset" id="Submitreset" value="Reset" />
                    </div>
                </div>
                <div>
                     <!-- H o n e y p o t -->
                    <label class="flycatcher" for="firstname"></label>
                    <input class="flycatcher" autocomplete="off" type="text" id="firstname" name="firstname" placeholder="Your firstname here">
                    <label class="flycatcher" for="lastname"></label>
                    <input class="flycatcher" autocomplete="off" type="text" id="lastname" name="lastname" placeholder="Your lastname here">
                    <label class="flycatcher" for="email"></label>
                    <input class="flycatcher" autocomplete="off" type="email" id="email" name="email" placeholder="Your e-mail here">
                    <label class="flycatcher" for="subject"></label>
                    <input class="flycatcher" autocomplete="off" type="text" id="subject" name="subject" placeholder="Your subject here">
                    <label class="flycatcher" for="message"></label>
                    <input class="flycatcher" autocomplete="off" type="text" id="message" name="message" placeholder="Your message here">
                </div>            
            </form>

            <footer class="row mt-4">
                <div class="col-12 col-md-6">                  
                    <p>Legal disclaimer: By watching this webpage you allow us to use all your datas as we wish. You will be spamed as you've never been before.</p>
                </div>
                <div class="col-12 col-md-6">
                    <p>This webpage is currently powered by: <a href="https://github.com/MatthieuDuranton" class="btn">Matthieu</a> and is his rightful property. You don't care because you have no use of it anyway</p>                  
                    
                </div>
            </footer>
        </div>
    </div>

        
    


        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script src="https://kit.fontawesome.com/ca40c2b93d.js"></script>
        <script src="assets/js/script.js"></script>
    </body>
</html>
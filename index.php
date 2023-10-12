<?php
require('user_validator.php');

if(isset($_POST['submit'])){
    //validate the entries

    $validation = new UserValidator($_POST);

    $errors = $validation->validateForm(); //call method using ref

    //save data to db

}




?>
  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="style.css"> 
</head>
<body>
    
    <div class="new-user">
        <h2>Create new user</h2>
        <!--submit form to this page only-->
        <form action="<?php echo $_SERVER['PHP_SELF'] ; ?>" method="POST">
            <label for="">Username:</label>
            <input type="text" name="username" value="<?php echo htmlspecialchars($_POST['username']) ?? '' ; ?>">
            <div class="error">
                <?php echo $errors['username']?? '' ;?> <!--Null coalescing is a binary operator in some programming languages that allows us to assign a default value to a variable if it is null or undefined -->
            </div>


            <label for="">Email:</label>
            <input type="text" name="email" value="<?php echo htmlspecialchars($_POST['email']) ?? '' ; ?>">
            <div class="error">
                <?php echo $errors['username']?? '' ;?>
            </div>

            <input type="submit" value="submit" name="submit">

        </form>
    </div>

</body>
</html>

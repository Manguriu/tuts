<?php

$errors = array('email'=>'', 'title'=>'' , 'ingridients'=>'');

if(isset($_GET['submit'])){
//checking the inputs
    if(empty($_GET['email'])){
        $errors['email'] = 'An email is required <br />';
    } else{
        $email = $_GET['email'];
        if(!filter_var( $email, FILTER_VALIDATE_EMAIL)){
               $errors['email'] ='must be a valid email address';
        }
    }
    
    if(empty($_GET['title'])){
        $errors['title'] ='A title is required <br />';
    } else{
        $title = $_GET['title'];
        if(!preg_match('/^[a-zA-z\s]+$/',$title)){
            $errors['title'] ='use charcters only';
        }
    }

    if(empty($_GET['ingridients'])){
        $errors['ingridients'] ='ingridients are required <br />';
    }else{
        //$ingridients= $_GET['ingridients'];
        //if(!preg_match('/^[a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*s/',$ingridients)){
               // echo'include commas'; 
       // }
       $errors['ingridients'] = htmlspecialchars($_GET['ingridients']);
    }

}
?>

<!DOCTYPE html>
<html>

<?php include('header.php');?>

<section class="container grey-text">
    <h4 class="center">add a pizza</h4>
    <form class="white" action="add.php" methods="GET">
        <label>Your Email:</label>
        <input type="text" name="email">
        <div class ="red-text"><?php echo $errors['email'];?></div>
        <label>pizza title:</label>
        <input type="text" name="title">
        <div class ="red-text"><?php echo $errors['title'];?></div>
        <label>ingridients: (comma seperated):</label>
        <input type="text" name="ingridients">
        <input type="submit" name="submit" value="submit" class="btn brand z-depth-0">

    </form>
</section>

<?php include('footer.php');?>

</body>
</html>

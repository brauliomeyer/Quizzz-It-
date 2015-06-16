<?php
	session_start();
    echo $_SESSION['score'];
    include 'controller/database.php';

    //Set question number
    $number = (int) $_GET['n']; 

    /*
    *   Get Question
    */
    $query = "SELECT * FROM questions WHERE question_number = $number";

    //Get result from query
    $result = $mysqli->query($query) or die($mysqli->error.__LINE__);
    $question = $result->fetch_assoc();

    /*
    *   Get choices
    */
    $query = "SELECT * FROM choices WHERE question_number = $number";

    //Get result from query
    $choices = $mysqli->query($query) or die($mysqli->error.__LINE__);
    
    /*
    *   Get total question
    */
    $query = "SELECT * FROM questions";
    $results = $mysqli->query($query) or die($mysqli->error.__LINE__);
    $total = $results->num_rows;


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Quizzz it now!</title>
    <link rel="stylesheet" href="view/css/style.css" type="text/css">
    <link rel="stylesheet" href="view/css/bootstrap.css">
    <script src="lib/jquery-2.1.3.js" type="text/javascript"></script>
    <script src="lib/bootstrap.js" type="text/javascript"></script>    
</head>
<body>
   
    <header>
        <div class="container">
            <h1>Quizzz it now!</h1>
            <p>Question #<?php echo $question['question_number']; ?> out of 
            <?php echo $total; ?></p>
        </div>
    </header>
    
    <main>
       <div class="container">
           <div class="current">
                  <i><h2 class="currentHeader"><?php echo $question['text']; ?></h2></i>

                   <form method="post" action="process.php?n=">
                   <ul class="choices">
                <?php while($row = $choices->fetch_assoc()): ?>
                <li>
<input name="choice" type="radio" value="<?php echo $row['id'];?>"><?php echo $row['text'];?>
                </li>
                <?php endwhile; ?>
                   </ul>                                    
        <input class="start btn btn-default" name="submit" type="submit" value="submit">
        <input type="hidden" name="number" value="<?php echo $number;?>">
               </form>          
           </div>
        </div>
    </main>
    
    <footer>
        <div class="container">
            <div>Copyright &copy; 2015 TBM</div>
        </div>
    </footer>
    
</body>
</html>







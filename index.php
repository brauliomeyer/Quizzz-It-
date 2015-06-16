<?php
	session_start();
    include 'controller/database.php';
?>
<?php 

    /*
    *   Get Total Questions
    */
    $query = "SELECT * FROM  questions";
    
    //Get results from query
    $results = $mysqli->query($query) or die($mysqli->error.__LINE__);
    $total = $results->num_rows;
    
    $result = $mysqli->query($query) or die($mysqli->error.__LINE__);
    $question = $result->fetch_assoc();
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
            <a href="add_to_db.php" class="start btn btn-default">Add Quizzz items!</a>
        </div>
    </header>
   
    <main>
       <div class="container">           
           <div class="current">
                <h2 class="currentHeader">Test Your PHP knowledge</h2>
            <p>This is a multiple choice quiz to test your knowledge of PHP.</p>
            <ul>
                <li><strong>Number of Questions: </strong><?php echo $total; ?></li>
                <li><strong>Type: </strong><?php echo $question['type']; ?></li>
                <li><strong>Estimated Time: </strong><?php echo $total * 1; ?> minutes</li><br><br>
                <a href="question.php?n=1" class="start btn btn-default">Start Quiz!</a>
            </ul>
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







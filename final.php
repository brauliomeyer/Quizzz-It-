<?php
	session_start();
    echo $_SESSION['score'];
    include 'controller/database.php';
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
        </div>
    </header>
   
    <main>
       <div class="container">           
           <div class="current">
                <h2 class="currentHeader">Test Your PHP knowledge</h2>
                <p>You are done with the Quizzz.</p>
                <p>Congrats, you have completed the test!</p>
                <p>Final score: <?php echo $_SESSION['score']; ?></p>
                <a class="start btn btn-default" href="question.php?n=1">Start Quiz again!</a>
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







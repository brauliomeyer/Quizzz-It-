<?php
    include 'controller/database.php';
   
    if(isset($_POST['submit']) == "submit") 
    {
        //Get the POST number and text vars
        $question_number = addslashes ( $_POST['question_number']);
        $question_text = addslashes ( $_POST['question_text']);
        $correct_choice = addslashes ( $_POST['correct_choice']);        

        //Get the choice array vars
        $choices = $choices = array();
            $choices[1] = addslashes ( $_POST['choice1']);
            $choices[2] = addslashes ( $_POST['choice2']);
            $choices[3] = addslashes ( $_POST['choice3']);
            $choices[4] = addslashes ( $_POST['choice4']);
            $choices[5] = addslashes ( $_POST['choice5']);
    
    
        
        //Question query
        $sql =  "INSERT INTO questions (question_number,text) VALUES('$question_number','$question_text')";
        
        //Run query
        $query = $mysqli->query($sql) or die($mysqli->error.__LINE__);
        
        //Validate insert vars
        if($query)
        {
            foreach($choices as $choice => $value)
            {
                if($value != '')
                {
                    if($correct_choice == $choice)
                    {
                        $is_correct = 1;
                    }   else
                        {
                            $is_correct = 0;
                        }
                    //Choices query
                    $sql =  "INSERT INTO choices (question_number,is_correct,text) VALUES('$question_number','$is_correct','$value')";
                    //Run query
                    $query = $mysqli->query($sql) or die($mysqli->error.__LINE__);
                    
                    //Validate insert
                    if($query)
                    {
                        continue;
                    }   else 
                        {
                            die('error: ('. $mysqli->errno . ') '. $mysqli->error.__LINE__);
                        }
                }
            }
            $msg = "Questions added!";
            //header("Location:add_to_db.php");
            //exit();
        }        
    }

    /*
    *   Get total
    */  
    $sql = "SELECT * FROM questions";

    //Get the results
    $questions = $mysqli->query($sql) or die($mysqli->error.__LINE__);
    $total = $questions->num_rows;
    $next = $total+1;

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
                <h2 class="currentHeader">Add A Question to the quizzz.</h2>
                <div><?php if(isset($msg)) { echo "<h1 class='currentHeader'>$msg</h1>" ;} ?></div>
            <p>
                <form method="post" action="add_to_db.php">
                <p class="extra_space">
                    <label for="question_number">Question number: </label>
                    <input type="number" value="<?php echo $next; ?>" name="question_number" required>
                </p>
                <p class="extra_space">
                    <label for="question_text">Question text: </label>
                    <input name="question_text" type="text" required>
                </p>                             
                <p class="extra_space">
                    <label for="choice1">Choice #1: </label>
                    <input name="choice1" type="text">
                </p>
                <p class="extra_space">
                    <label for="choice2">Choice #2: </label>
                    <input name="choice2" type="text">   
                </p>
                <p class="extra_space">
                    <label for="choice3">Choice #3: </label>
                    <input name="choice3" type="text">
                </p>
                <p class="extra_space">
                    <label for="choice4">Choice #4: </label>
                    <input name="choice4" type="text">
                </p>
                <p class="extra_space">
                    <label for="choice5">Choice #5: </label>
                    <input name="choice5" type="text">
                </p>
                <p class="extra_space">
                    <label for="correct_choice">Correct Choice Number: </label>
                    <input name="correct_choice" type="number">
                </p>
                <p class="extra_space">
               <input name="submit" type="submit" class="start btn btn-default" value="submit">
                </p>

                   </form>                                                    
            </p>
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
<!DOCTYPE html>
<!--This was a collaborative effort amongst all group members involved. Jeremy designed what you actually see on the page, from the logo, to the background, to the font and really laid out what was needed and started the database development. Chris spearheaded the development of the code and ensured that we can successfullyread and write to the database. Garrett configured the server to host our custom logo and background, along with finalizing the developing of the actual database holding the questions and answers and ensuring proper functionality of the radio buttons.-->
<html>
<head>
<meta name='viewport' content='width=device-width, initial-scale=1'>
</head>
<body>

</body>
<style>
    body, html {
        height: 100%;
        margin: 0;
        background-image: url('https://gstorage89.blob.core.windows.net/beardlogo/SoftBG.png');
        background-size: cover;
        background-attachment: fixed;
        background-position: center;
        background-repeat: no-repeat;
    }
    .trivia-image {
        background-image: url('https://gstorage89.blob.core.windows.net/beardlogo/BGOG.png');
        height: 30%;  
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        position: relative;
    }
    .trivia-text button {
        border: none;
        outline: 0;
        display: inline-block;
        padding: 10px 25px;
        color: black;
        background-color: #ddd;
        text-align: center;
        cursor: pointer;
    }
    .QuestionStyle{
        font-family:fantasy;
        font-size: 20pt;
        border-collapse: collapse;
        text-align: left;
        border-bottom: 1px solid;
        color: floralwhite;
    }
    .scores:hover{
        background-color: darkgray;
    }
    aside{
        font-family:fantasy;
        font-size: 10pt;
        border-collapse: collapse;
        width: 15%;
        position:absolute;
        left:80%;
        top:35%;
        padding: 2px;
        text-align: right;
        border-bottom: 1px solid;
        color: floralwhite;
    }
</style>

<?php
    $link = mysqli_init();

    //conditionals to make sure it connects
    if (!$link) { 
        die('mysqli_init failed'); 
    }
    if (!mysqli_real_connect($link, 'iss414mysql.mysql.database.azure.com', 'group5@iss414mysql', 'Iss414POQNH7J!', 'group5', 3306)) { 
        die('Connect Error (' . mysqli_connect_errno() . ') ' . mysqli_connect_error()); 
    }

    $DisplayForm = TRUE;

    //Background is Displayed
    echo "<div class='trivia-image'><div class='trivia-text'></div></div>";

    //Code is triggered once the submit button is pressed.
    if (isset($_POST['Submit'])){
        //sets up variables
        $sql = "SELECT * FROM Q_AND_A";
        $rs = mysqli_query($link, $sql);
        $correct = array();
        $answered = array();
        $c = 0;
        for($i = 0; $i < mysqli_num_rows($rs); $i++){
            $answered[$i] = 0;
        }
        $scored = 0;
        $answered[0] = $_POST["Q0"];
        $answered[1] = $_POST["Q1"];
        $answered[2] = $_POST["Q2"];
        $answered[3] = $_POST["Q3"];
        $answered[4] = $_POST["Q4"];
        $answered[5] = $_POST["Q5"];
        $answered[6] = $_POST["Q6"];
        $answered[7] = $_POST["Q7"];
        $answered[8] = $_POST["Q8"];
        $answered[9] = $_POST["Q9"];
        while($row = mysqli_fetch_assoc($rs)){
            //Retrieves Correct Answers
            $correct[$c] = $row["QA_CORRECT"];

            //tests answers
            if ($correct[$c] == $answered[$c]) {
                $scored = $scored + 1;
            }
            $c = $c + 1;
        };
        echo "<H1><LEFT><B><font color='FFFFFF'>FINAL SCORE:</font></B></LEFT>";
        echo $scored;
        //sets variables for query
        $SCO_Username = $_POST['Username'];
        $SCO_Score = $scored;
        $SCO_Date = date("Y-m-d");

        //makes sql string
        $SQLString = "INSERT into SCORE (SCO_USERNAME, SCO_SCORE, SCO_DATE) VALUES ('" . $SCO_Username . "', '" . $SCO_Score . "', '" . $SCO_Date . "');";

        //Runs the SQL string
        if (mysqli_query($link, $SQLString)) {
            echo "<p>Your try has been recorded!";
        }
        else{
            echo "<p>error";
        }
        $DisplayForm = FALSE;
    }

    //Creates top 5 from Score Board
    //sets up variables
    $sql = "SELECT * FROM Score ORDER BY SCO_SCORE DESC";
    $rs = mysqli_query($link, $sql);
    $names = array();
    $scores = array();
    $dates = array();
    //starting HTML code to set up the score board
    echo "<aside><font color'white'><table><tr style='border-bottom: 1px solid'><th>Username</th><th>Score</th><th>Date</th></tr>";
    for ($c = 0; $c < 5; $c++){
        //gets variables
        $row = mysqli_fetch_assoc($rs);
        $names[$c] = $row["SCO_USERNAME"];
        $scores[$c] = $row["SCO_SCORE"];
        $dates[$c] = $row["SCO_DATE"];

        //HTML code mixed in with variables to create table
        echo "<tr class = 'scores' style='border-bottom: 1px solid'>";
        echo "<td class = 'scores'>";
        echo $names[$c];
        echo "</td>";
        echo "<td class = 'scores' style='text-align:left'>";
        echo $scores[$c];
        echo "</td>";
        echo "<td class = 'scores'>";
        echo $dates[$c];
        echo "</td>";
        echo "</tr>";
    }
    //end of Top 5 Scores
    echo "</table></font></aside>";

    //if not previously submitted
    if ($DisplayForm){
        //sets up vaiables
        $sql = "SELECT * FROM Q_AND_A";
        $rs = mysqli_query($link, $sql);
        $questions = array();
        $a1 = array();
        $a2 = array();
        $a3 = array();
        $a4 = array();
        $c = 0;
        //starts form
        echo "<form action='TriviaGame.php' method='post' class='QuestionStyle' style='width:70%; position:absolute; left:5%'>";
        while($row = mysqli_fetch_assoc($rs)){
            //gets variables from database
            $questions[$c] = $row["QA_QUESTION"];
            $a1[$c] = $row["QA_A1"];
            $a2[$c] = $row["QA_A2"];
            $a3[$c] = $row["QA_A3"];
            $a4[$c] = $row["QA_A4"];

            //prints out questions and the answers

            echo $questions[$c];
            echo "<p>";

            echo "<input type='radio' name='Q".$c."' id='Q".$c."1' value='1' class='QuestionStyle'>";
            echo "<label for='Q".$c."1' class='QuestionStyle'>".$a1[$c]."</label>";

            echo "<input type='radio' name='Q".$c."' id='Q".$c."2' value='2' class='QuestionStyle'>";
            echo "<label for='Q".$c."2' class='QuestionStyle'>".$a2[$c]."</label>";
            echo "<p>";

            echo "<input type='radio' name='Q".$c."' id='Q".$c."3' value='3' class='QuestionStyle'>";
            echo "<label for='Q".$c."3' class='QuestionStyle'>".$a3[$c]."</label>";

            echo "<input type='radio' name='Q".$c."' id='Q".$c."4' value='4' class='QuestionStyle'>";
            echo "<label for='Q".$c."4' class='QuestionStyle'>".$a4[$c]."</label>";
            echo "<br><br>";

            $c = $c + 1;
        };

        //finishes off the form
        echo "Username:
            <input type='text' name='Username'>
            <input type='submit' name='Submit' value='Submit'>
        </form>";
    }
    mysqli_close($link);
?>
</body>
</html>

<?php
    $con = new mysqli("IPBAZY", "NAZWABAZY", "HASŁO", "NAZWATABELI");
    $query = $con->query("SELECT * FROM uczniowie");
    $imie = "";
    $final = "";
    if ($query->num_rows > 0){
        while ($row = $query->fetch_assoc()){
            $imie = $imie.$row['id'].": ".$row['imie']." ".$row['nazwisko']."<br/>";
        }
    }
    if(isset($_POST['wyslij'])&&isset($_POST['numer'])){
        $id = $_POST['numer'];
        $que = $con->query("SELECT * FROM uczniowie WHERE id=$id");
        if($que->num_rows > 0){
            while($roww = $que->fetch_assoc()){
                if($id == 13){
                    $final = "KRETYN";
                } else {
                    $final = "ID: ".$roww['id']."<br/>Imię: ".$roww['imie']."<br/>Nazwisko: ".$roww['nazwisko']."<br/>IQ: ".$roww['IQ'];

                }
            }
        } 
        
        else {
            $final = "Nie ma osoby o podanym ID.";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        #rodzic {
    font-size:1.2em;
    margin-left: 60px;
}

#rodzic:after {
    content:'';
    display:block;
    clear:both;
}

#dziecko {
    float:left;
    width: 300px;
    height: 600px;
    margin: 18px;
    padding-top: 10px;
    border: solid red 2px;
    text-align: center;
    background-color:lightblue;
}
    </style>

</head>
<body>

        <div id="rodzic">
            <div id="dziecko"><?php echo $imie?></div>
            <div id="dziecko">
                <form method="post" name="form" action="">
                    <input type="number" name="numer"><br/>
                    <input type="submit" name="wyslij" value="wyslij">
                </form>
            </div>
            <div id="dziecko"><?php echo $final; ?></div>
        </div>

</body>
</html>
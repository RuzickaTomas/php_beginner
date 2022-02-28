<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="">
    <title></title>
</head>
<body>

<header>
    <!-- Variables  for declaration need to use sign of $  -->
<!-- $name = "Evgeniya"; -->
<?php
    $nameMain="Evgeniya";
    echo $nameMain;
    echo $nameMain;
    echo $nameMain;
    echo $nameMain;
    echo $nameMain;
    echo $nameMain;
    echo $nameMain;

    $yearOfBirth=1990;
    echo $yearOfBirth;
    echo $yearOfBirth;
    echo $yearOfBirth;
    echo $yearOfBirth;
    echo $yearOfBirth;
    echo $yearOfBirth;
 $jobInPosititon="emloers"; //string
 $tax=10000;//number
 $size=38.5;//float
//  $test="100" //string
$noticeTag ="<h1> TEXT FROM notice tag</h1>";
//  Concatinetion
  echo $jobInPosititon ." ". $tax ." ". $size;

  echo $noticeTag;
  echo 20+15;
  echo "<br>";
  echo 20-10;
  echo "<br>";
  echo 20*10;
  echo "<br>";
  echo 10/7;
  echo "<br>";
  echo 3+5*10;
  
?>
<?php
    include"contact.php";
?>

</header>
<main>
<h2>Notice</h2>
<p> Text... text...
    Text... text...
    Text... text...
    Text... text...
    Text... text...
</p>
</main>
<?php
    include"footer.php";
?>


<h1> Start1</h1>
<div class="demo">
    <ul>
        <li><a href="">home</a></li>
        <li><a href="">home</a></li>
        <li><a href="">home</a></li>
        <li><a href="">home</a></li>
        <li><a href="">home</a></li>
    </ul>
</div>
<h1> Start</h1>

<?php
// "Ctrl /"  automaticly create comment 
// inserting h1 tag by php
// $name  this is a variable declaration
$name = "Blog foodies and nitty gritty"
?>
<!-- Call the variable with notes from php -->
<h1><?php echo $name?></h1>
<!-- without call, directly inserting the notes with teg of HTML -->
<?php 
echo $name_of_Notes="<h1>Something something</h1>";
echo $name_of_Notes2 ="<p>Something else something else</p>";
?>

<h1>TEST:</h1>
<form action="formular.php" method="post">
<input type="text" placeholder="Jméno" name="firstName" required/>
<input type="text" placeholder="Příjmení" name="lastName" required/>
<input type="date" placeholder="Datum narození" name="birthday" required pattern="\d{2}\.\d{2}\.\d{4}"/>
<select placeholder="Zdravotní pojišťovna" name="healthInsurence" required>
    <?php 
        $arr = array(111 => "Všeobecná zdravotní pojišťovna ČR (VZP)", 
                     201 => "Vojenská zdravotní pojišťovna ČR (VoZP)", 
                     205 => "Česká průmyslová zdravotní pojišťovna (ČPZP)",
                     207 => "Oborová zdravotní pojišťovna zam. bank, poj. a stav. (OZP)	",
                     209 => "Zaměstnanecká pojišťovna Škoda (ZPŠ)	",
                     211 => "Zdravotní pojišťovna ministerstva vnitra ČR (ZPMV)	",
                     213 => "Revírní bratrská pokladna, zdrav. pojišťovna (RBP)	",
                    );
        foreach ($arr as $key => $value) {
          echo "<option value=\"".$key."\">".$value."</option>";
        }
    ?>
</select>
<input type="text" placeholder="Telefon" name="phone"/>
<input type="email" placeholder="E-mail" name="email" required/>
<input type="submit" value="Prihlas" />
<input type="reset" value="Zrus" />
</form>
<?php 
    $birthday = new DateTime($_POST['birthday']);    
    $interval = $birthday->diff(new DateTime('NOW'));
    $period = $interval->y;
    if ($period < 80) {
        echo "Pro tuto věkovou kategorii není funkce podporována!";
        return 0;
    }
    $phone = $_POST['phone'];
    $phoneMatch = preg_match('/(\+420)?\d{9}/', $phone);
    if ($phoneMatch == 0 || $phoneMatch == false) {
        echo "Formát telefoního čísla není podporován!";
        return 0;
    }
    echo "<ul>
    <li>".$_POST['firstName']."</li>".
    "<li>".$_POST['lastName']."</li>".
    "<li>".$birthday->format('d.m.Y')."</li>".
    "<li>".$arr[$_POST['healthInsurence']]."</li>".
    "<li>".$phone."</li>".
    "<li>".$_POST['email']."</li></ul>";
?>


</body>
</html>


<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // collect value of input field
  $name = $_POST['string'];
  if (empty($name)) {
    
  } else {
      $firstCharacter = substr($name, 0, 1);
      if ($firstCharacter == "/"){
          //commands
          $action = substr($name, 1, 3);
          //login
          if ($action == "ave"){

          }
          //logout 
          elseif($action == "dve"){

          }
      }else{
      if (!empty($_SERVER["HTTP_CLIENT_IP"])){
    $ip = $_SERVER["HTTP_CLIENT_IP"];
}elseif(!empty($_SERVER["HTTP_X_FORWARDED_FOR"])){
    $ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
}else{
    $ip = $_SERVER["REMOTE_ADDR"];
}
$date = $date = date('Y-m-d H:i:s');
    include_once 'settings.php';
    $conn = new mysqli($db_server, $db_username, $db_password, $db_dbname);

    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    $sql = "INSERT INTO chat ( string, user, thetime, ip )
            VALUES ( '$name', 'notyet', '$date', '$ip' );";
$result = $conn->query($sql);
var_dump($result);
echo $ip;
echo $date;
echo $name;
  }}
}
?>
<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="utf-8">
    <title>Simple chatting system</title>
    <style>
        :root {
            --home-bg-color: #f2f3ee;
            --menu-bg-color: #cbcbc2;
            --silde-btn-border: #808080;
            --slide-btn-bg: #ddf2db;
            --slide-btn-hoverbg: #f1fff1;
            --alpha-green: rgba(33, 96, 47, 0.51);
            --icon-hover-color: #344a39;
            --icon-hover-bg: #709680;
            --text-color: #616161;
            --border-color: #709680;
            --heading-color: #344a39;
            --box-shadow-color: #b5b5ac;
            --lightest-green: #86a58d;
            --light-green: #9ab09a;
            --dark-green: transparent;
            --box-shadow: 0px 0px 3px 5px var(--box-shadow-color);
            --border-radius: 60px 5px;
            --fade-green: rgba(57, 87, 64, 0.55);
        }

        *,
        *::before,
        *::after {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            list-style: none;
        }

        body,
        html {
            width: 100%;
            font-size: 20px;
            color: var(--text-color);
            font-weight: normal;
            font-family: sans-serif;
            background-color: var(--home-bg-color);
        }

        #ham-menu {
            display: none;
        }

        label[for="ham-menu"] {
            display: block;
            position: fixed;
            bottom: 24px;
            left: 20px;
            z-index: 999;
            width: 60px;
            height: 60px;
            background-color: var(--home-bg-color);
            border-radius: 15px;
            border: 2px solid var(--border-color);
        }

        .ham-menu {
            width: 25vw;
            height: 100%;
            position: fixed;
            top: 0;
            visibility: hidden;
            transform: translate(-110%);
            z-index: 998;
            background-color: var(--lightest-green);
            transition: 1s;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .ham-menu>ul {
            display: flex;
            flex-flow: column nowrap;
            justify-content: space-around;
            padding: 20px;
            height: 50%;
        }

        .ham-menu>ul>li {
            font-size: 3rem;
            white-space: nowrap;
            letter-spacing: 0.15em;
            cursor: pointer;
            color: rgb(97, 97, 97);
        }

        #ham-menu:checked+label {
            background-color: transparent;
            border-color: var(--dark-green);
        }

        #ham-menu:checked~div.ham-menu {
            transform: translate(0px);
            visibility: visible;
        }

        .full-page-green {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: var(--dark-green);
            z-index: 997;
            opacity: 0;
            visibility: hidden;
            display: none;
            transition: 500ms;
            position: fixed;
            top: 0;
            left: 0;
        }

        #ham-menu:checked~div.full-page-green {
            display: block;
            opacity: 1;
            visibility: visible;
        }

        [for="ham-menu"]>div {
            width: 100%;
            height: 100%;
            display: flex;
            flex-flow: column wrap;
            align-content: center;
            align-items: center;
        }

        .menu-line {
            display: block;
            width: 17px;
            height: 2px;
            margin: 10px 0 5px;
            border-top-left-radius: 2px;
            border-bottom-left-radius: 2px;
            background-color: var(--border-color);
            transition: 500ms;
            transform-origin: right center;
        }

        [for="ham-menu"]>div>span:nth-child(4),
        [for="ham-menu"]>div>span:nth-child(5),
        [for="ham-menu"]>div>span:nth-child(6) {
            border-top-left-radius: 0;
            border-bottom-left-radius: 0;
            border-top-right-radius: 2px;
            border-bottom-right-radius: 2px;
            transform-origin: left center;
        }

        #ham-menu:checked+label span {
            background-color: black;
        }

        #ham-menu:checked+label span:nth-child(2),
        #ham-menu:checked+label span:nth-child(5) {
            transform: scale(0);
        }

        #ham-menu:checked+label span:nth-child(1) {
            transform: translateY(17px) rotate(45deg);
        }

        #ham-menu:checked+label span:nth-child(4) {
            transform: translateY(17px) rotate(-45deg);
        }

        #ham-menu:checked+label span:nth-child(3) {
            transform: translateY(-17px) rotate(-45deg);
        }

        #ham-menu:checked+label span:nth-child(6) {
            transform: translateY(-17px) rotate(45deg);
        }

        p {
            display: inline;
            font-size: 1.8rem;
            line-height: 1.5em;
            word-spacing: 0.5em;
            letter-spacing: 0.1em;
        }

        a {
            font-size: 1.6rem;
            line-height: 1.5em;
            word-spacing: 0.5em;
            letter-spacing: 0.1em;
            display: inline;
            font-weight: bold;
            padding: 7px;
            color: var(--icon-hover-bg);
        }

        a::after {
            content: "\e806";
            display: inline-block;
            font-family: fontello;
            padding: 5px;
            font-size: 1.6rem;
            transform: rotate(-90deg);
        }

        .text {
            font-size: 2.5rem;
            line-height: 1.5em;
            word-spacing: 0.5em;
            letter-spacing: 0.1em;
        }

        .title {
            font-size: 3rem;
            line-height: 1.5em;
            word-spacing: 0.5em;
            letter-spacing: 0.1em;
            color: var(--icon-hover-bg);
            padding: 10px;
        }

        .heading {
            font-size: 6rem;
            line-height: 1.5em;
            word-spacing: 0.5em;
            letter-spacing: 0.1em;
        }

        .centre-text {
            text-align: center;
        }

        .bold-text {
            font-weight: bold;
        }

        .send {
            width: 100%;
            height: 250px;
            font-size: 30px;
            display: flex;
            flex-direction: row;
        }

        .content {
            min-height: calc(100vh - 250px);
        }

        .submit {
            width: 100%;
            height: 100%;
            font-size: 40px;
        }

        textarea {
            width: 80%;
            height: 100%;
            font-size:30px;
        }
    </style>

</head>

<body>
    <header></header>
    <main>
        <!-- left bar start--><input type="checkbox" id="ham-menu">
        <label for="ham-menu">
            <div class="hide-des">
                <span class="menu-line"></span>
                <span class="menu-line"></span>
                <span class="menu-line"></span>
                <span class="menu-line"></span>
                <span class="menu-line"></span>
                <span class="menu-line"></span>
            </div>

        </label>
        <div class="full-page-green"></div>
        <div class="ham-menu">
            <ul class="centre-text bold-text">
                <li>Home</li>
                <li>Categories</li>
                <li>Services</li>
                <li>Shop</li>
                <li>Support</li>
                <li>Contact us</li>

            </ul>
        </div>
        <!--left bar end-->
        <!--main window start-->
        <div class="content"><?php
    include_once 'settings.php';
    $conn = new mysqli($db_server, $db_username, $db_password, $db_dbname);

    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    send("Connected successfully");
    $sql = "SELECT string, user, thetime FROM chat";
$result = $conn->query($sql);
var_dump($result);
var_dump($conn);
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    send( "" . $row["string"]. " - " . $row["user"]. "(" . $row["thetime"]. ")");
  }
} else {
  send( "0 results");
}

    function send($message){
        echo $message ."<hr>";
    }
?></div>
        <!--main window end-->
        <!--input start-->
            <script>
function keySend(event) {
if (event.ctrlKey && event.keyCode == 13) {
document.getElementById("sending").click();
}
}

    </script>
        <form target="_self" method="post" class='send'><textarea onkeydown="keySend(event);" name="string"></textarea>
            <div style="display: flex; flex-direction: column; width:20%">
                <button class="submit" id="sending" type="submit">Send</button>
                <button type="reset" class="submit">Reset</button>
            </div>
        </form>
        <!--input end-->
    </main>
    <footer></footer>
</body>

</html>
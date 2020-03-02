<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Space - Universe</title>


    <!-- Styles -->
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/css/index.css">
    <link rel="stylesheet" href="/css/contact.css">
</head>
<body link="white" vlink="white" alink="white">
<body>
<header>
    <div class="title"></div>

    <?php
    $navs = array('Home', 'Solar System', 'Videos', 'Gallery', 'About', 'Contact');    //  сам массив менюшки и непосредственное получение айдишника страницы
    if(isset($_GET['id']))
        $id = $_GET['id'];
    else
        $id = 0;
    ?>
    <nav>
        <ul>
            <?php
            foreach($navs as $key => $nav):                                    //как стало в php
                ?>
                <li> <?php if($key <> $id) {?>
                    <a href="lab2.php?id=<?=$key?>"><?=$nav?></a>
                    <?php } else { ?>
                    <a class="active" href="#"><?=$nav?></a>
                    <?php } ?>
                </li>

            <?php endforeach;?>
        </ul>
    </nav>

   <!-- <ul>
        <li><a href="index.html">Home</a></li>                                  //как было в html
        <li><a href="solarsystem.html">Solar System</a></li>
        <li><a href="video.html">Videos</a></li>
        <li><a href="gallery.html">Gallery</a></li>
        <li><a href="about.html">About</a></li>
        <li><a class="active" href="#">Contact</a></li>

    </ul>-->
</header>

<!-- Contact section -->
<section style="padding-top: 100px; padding-bottom: 90px;" class="about">
    <div class="about-header">

    </div>


    <div class="card">
    <form method="POST" >

        <textarea name="message" class="feedback-input" placeholder="Message"><?php if (isset($_POST['enter'])) { echo $_POST['message'];}?></textarea>
        <br><input type="submit" name="enter" value="SUBMIT">


    <?php
    $inputLine='';
    if (isset($_POST['enter'])) {
        $inputLine = $_POST['message'];
    }

   // $inputLine =strtolower($inputLine) ;
    $num=preg_match_all('~o~iu',strtolower($inputLine));

    $arr = explode(" ", $inputLine);

    $upperWords = [];
    $pupLetter = [];

    foreach($arr as $k => $v){
        if(($k+1) % 3 == 0){
            $v = mb_strtoupper($v);
            $upperWords[] = $v;
        }else{
            $upperWords[] = $v;
        }
    }

    foreach($upperWords as $k => $v){
        $v1 = preg_split('//u', $v, null, PREG_SPLIT_NO_EMPTY);
        if(isset($v1[2]))
            $v1[2] = preg_replace('~(.*+)~u', '<font color = #4a00e0>\1</font>', $v1[2]);
        $v1 = implode("", $v1);
        $pupLetter[] = $v1;
    }
$value =  implode(" ", $pupLetter);
    ?>
        <h3><?php echo $value?></h3>
        <h3><?php echo 'Number of "о" and "О": ';
           echo $num; ?></h3>

       </form>
    </div>
</section>
<br>
<br>
<br>
<br>
<br>

<footer>
    <p>&#169; 2020 <a href="https://www.instagram.com/orange_list/?hl=ru">KSENIA TSYBULKO</a></p>
</footer>
</body>
</html>
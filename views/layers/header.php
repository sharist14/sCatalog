<?php User::checkLogIn(); ?>

<!DOCTYPE>
<html>
<head>
    <title>Repelet.ru</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link href="/template/css/style.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="/template/js/jquery-1.3.2.min.js"></script>
    <script type="text/javascript" src="/template/js/script.js"></script>
    <!-- CuFon: Enables smooth pretty custom font rendering. 100% SEO friendly. To disable, remove this section -->
    <script type="text/javascript" src="/template/js/cufon-yui.js"></script>
    <script type="text/javascript" src="/template/js/arial.js"></script>
    <script type="text/javascript" src="/template/js/cuf_run.js"></script>
    <!-- CuFon ends -->
</head>
<body>
<div class="main">
    <div class="main_resize">
        <div class="header">
            <div class="logo">
                <h1><a href="/">Repele<span>t</span><small>Cataloging you equip</small></a></h1>
            </div>
            <div class="search">
                <form method="get" id="search" action="">
                      <span>
                          <input type="text" name="s" id="s" placeholder = "Поиск..."/>
                          <input name="searchsubmit" type="image" src="/template/images/search.gif" value="Go" id="searchsubmit" class="btn"  />
                      </span>
                </form>
                <!--/searchform -->
                <div class="clr"></div>
            </div>

            <div class="menu_nav">
                <ul>
                    <li class = <?php echo ($way == NULL) ? "active" : ""; ?>><a href="/">Главная</a></li>
                    <li class = <?php echo ($way == "equip") ? "active" : ""; ?>><a href="/equip/pc">Оборудование</a></li>
                    <li class = <?php echo ($way == "work") ? "active" : ""; ?>><a href="/work">Рабочие места</a></li>
                    <li class = <?php echo ($way == "project") ? "active" : ""; ?>><a href="/project">Проекты</a></li>
                    <li class = <?php echo ($way == "info") ? "active" : ""; ?>><a href="/info">Информация</a></li>
                </ul>
                <div class="clr"></div>
            </div>
            <div class="register_main">
                <div class="register_main_left">
                    <h4>Здравствуй, <a href="/cabinet/<?php echo $_SESSION['user']; ?>"><?php echo $_SESSION['user']; ?></a></h4>
                </div>
                <div class="register_main_right">
                    <a href="/user/logout">Выход</a>
                </div>                    

                <div class="clr"></div>
            </div>

            <div class="clr"></div>


            <div class="hbg"><img src="/template/images/header_images2.jpg" width="946" height="268" alt="header images" /></div>
        </div>
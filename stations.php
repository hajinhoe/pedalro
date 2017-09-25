<!doctype html>
<html lang="ko">
<html>
    <head>
    <!-- Global Site Tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-106918650-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments)};
  gtag('js', new Date());

  gtag('config', 'UA-106918650-1');
</script>

        <link rel="stylesheet" href="style/styles.css">
        <title>페달로 정보 서비스</title>
        <meta name="viewport" content="width=device-width, initial-scale=0.5">
        <meta charset="UTF-8">
        <!-- 아이폰 웹 앱 부분-->
        <link rel="apple-touch-icon" href="apple-touch-icon.png" />
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <meta name="apple-mobile-web-app-status-bar-style" content="black" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script> <!-- it is jquery.... 배워서 수정좀 ㅜㅜ -->
            $(window).load(function() {
                $('.menu').on('click', function (e) {
                    if ($(e.target).closest('ul').parent('nav.nav').length) {
                        if ($(this).hasClass('expanded')) {
                            $(this).children('.submenu').hide();
                            $(this).removeClass('expanded');
                        } else {
                            $('.submenu').css('display', 'none');
                            $(this).children('.submenu').show();
                            $(this).addClass('expanded');
                        }
                    }
                });
            });
        </script>
    </head>
    <body>
    <div class="flex-container">
        <header>
            <h1>페달로 정보 서비스</h1>
        </header>

        <nav class="nav">
            <ul>
                <li><a class="active" href="index.html">처음으로</a></li>
                <li><a href="maps.html">지도</a></li>
                <li><a href="stations.php?station=all">전체</a></li>
                <li class = "menu">
                    <a href="#railway">역별</a>
                    <ul class="submenu">
                        <li><a href="stations.php?station=신길온천역">신길온천</a></li>
                        <li><a href="stations.php?station=안산역">안산</a></li>
                        <li><a href="stations.php?station=고잔역">고잔</a></li>
                        <li><a href="stations.php?station=초지역">초지</a></li>
                        <li><a href="stations.php?station=중앙역">중앙</a></li>
                        <li><a href="stations.php?station=한양대앞">한대앞</a></li>
                        <li><a href="stations.php?station=상록수역">상록수</a></li>
                        <li><a href="stations.php?station=반월역">반월</a></li>
                    </ul>
                </li>
                <li class = "menu">
                    <a href="#univ">대학별</a>
                    <ul class="submenu">
                        <li><a href="stations.php?station=한양대">에리카(한양대)</a></li>
                        <li><a href="stations.php?station=서울예술대">서울예대</a></li>
                        <li><a href="stations.php?station=30904">안산대</a></li>
                        <li><a href="stations.php?station=신 안산대">신안산대</a></li>
                    </ul>
                </li>
            </ul>
        </nav>

        <article class="article">
            <section>
                <?php
                if ($_GET['station'] == "신길온천역") {
                    print "신길온천역에는 온천도 없고, 페달로 정거장도 없습니다.";
                    } else if ($_GET['station'] == "동별") {
                    print "준비중입니다.";
                    } {include 'display_stations.php';}
                ?>
            </section>
        </article>

        <footer class="footer">
            <p>작성 중입니다. <a href="../">페이지에 관한 문의</a></p>
        </footer>
    </div>
    <script> //대여 불가능할 시 빨간색으로 표시합니다
        var i = 0;
        while (document.getElementsByClassName("available")[i] !== undefined) {
            if(document.getElementsByClassName("available")[i].innerHTML.indexOf("대여가능 :   \t\t\t\t\t\t\t\t\t\t0  \t\t\t\t\t\t\t\t\t\t") > 0) {
                document.getElementsByClassName("available")[i].style.backgroundColor = "red";
            } else{
            }
            i++;
        }
    </script>
    </body>
</html>
<?php
#ini_set('display_errors', 1);
#ini_set('display_startup_errors', 1);
#error_reporting(E_ALL);

require("data.php");

$data = getData();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <!-- Hover CSS -->
    <link rel="stylesheet" href="./css/hover.css" media="all">

    <!-- My CSS - Always last -->
    <link rel="stylesheet" href="./css/style.css">

    <!-- Favicon -->
    <link rel="icon" href="./images/favicon.gif" type="image/gif">

    <!-- Scroll Reveal Lib -->
    <script src="https://unpkg.com/scrollreveal"></script>

    <title>Homepage</title>
</head>

<body>
    <main>
        <div class="container pt-5">
            <h1 class="slide-in">
                <span class="font-weight-bold">PROJECT:</span>
                <br>
                <span class="font-italic">DARK-GAMING</span>
            </h1>

            <h5 class="description grow m-5">
                Since year 2016, we provide you the best League of Legends community you could imagine!<br>
                Come and join one of the most customized TS3 server with a
                <a href="#lol">League of Legends system</a>!
            </h5>

            <div class="row text-uppercase p-5">
                <div class="col grow">
                    <a href="ts3server://dark-gaming.eu">
                        <img src="./images/ts.png" alt="TeamSpeak" class="m-3" width="150">
                        <h4 class="p-2">Join Us</h4>
                    </a>
                </div>
                <div class="col grow">
                    <a href="#vote">
                        <img src="./images/vote.png" alt="Vote" class="m-3" width="150">
                        <h4 class="p-2">Vote</h4>
                    </a>
                </div>
                <div class="col-12 grow">
                    <a href="#rewards">
                        <img src="./images/reward.png" alt="Earn Rewards" class="m-3" width="150">
                        <h4 class="p-2">Earn Rewards</h4>
                    </a>
                </div>
            </div>
        </div>
    </main>

    <section id="community">
        <div class="container text-uppercase">
            <h2 class="pt-3 font-weight-bolder">COMMUNITY STATISTICS</h2>

            <div class="row p-4 justify-content-center">
                <div class="col-6 col-md-4">
                    <h3 class="stats">
                        <?=$data["online"]?>
                    </h3>
                    <p class="text-light">Online</p>
                </div>
                <div class="col-6 col-md-4">
                    <h3 class="stats">
                        <?=$data["newMembers"]?>
                    </h3>
                    <p class="text-light">New Members This Month</p>
                </div>
                <div class="col-6 col-md-4">
                    <h3 class="stats">
                        <?=$data["votes"]?>
                    </h3>
                    <p class="text-light">Votes</p>
                </div>
            </div>
        </div>
    </section>

    <section id="vote" class="bg-special-1">
        <div class="container">
            <h2 class="pt-3 font-weight-bolder">VOTING</h2>

            <p class="p-3 text-light">
                Support us by voting for the server,
                <br>and you will earn rewards <b class="text-uppercase">TWICE</b> as fast!
            </p>
            
            <a href="https://teamspeak-servers.org/server/13373/vote">
                <p class="vote p-3 font-weight-bolder">CLICK TO VOTE</p>
            </a>
        </div>
    </section>



    <section id="rewards">
        <div class="container">
            <h2 class="pt-3 font-weight-bolder">RANKING REWARDS</h2>
            <p class="text-light">The more time you spend being on the TS3 server, the more rewards you
                get!<br>You can get your own private channel, earn special icons, specific permissions & more!<br>List of all rewards can
                be found on the TS3 server!</p>
        </div>
    </section>


    <section id="lol" class="bg-special-2">
        <div class="container">
            <h2 class="pt-3 font-weight-bolder">
                LEAGUE OF LEGENDS<br>
                INTEGRATION
            </h2>

            <p class="p-3 m-0">
                Flex with your League of Legends rank,<br>
                show them your favorite champions,<br>
                and more!<br>
                <br>
                This can be done through our own<br>
                <i class="h5">UNIQUE LEAGUE OF LEGENDS & TEAMSPEAK INTEGRATION!</i>
            </p>
        </div>
    </section>

    <section id="bot">
        <div class="container">
            <h2 class="pt-3 font-weight-bolder">1 BOT, 100 CLIENTS</h2>
            <p class="text-light">
                Our bots with our own-made scripts take care of almost the server,<br>
                <b>music for your ears, ranking system, channel system, server's statistics..</b><br>
                <br>
                <i class="h5">Bots take care of everything!</i>
            </p>
        </div>
    </section>

    <section id="jhin-video">
        <video autoplay muted loop class="w-100">
            <source src="./videos/jhin.mp4" type="video/mp4"> Your browser does not support HTML5 video.
        </video>
    </section>

    <footer>
        <div class="container p-3">
            <a class="hosting" href="https://crew.sk/?ref=ACIXUDGCJU"><img src="./images/crew.png" class="mw-100 p-1"></a>
            <p class="text-light">
                &copy; Copyright <?=date("Y")?> - dark-gaming.eu - <span class="font-weight-bolder">All Rights Reserved</span>
            </p>
            <p class="text-light">
                <i>Community Owner | JavaScript Developer | Customer Support</i><br>
                <span class="font-weight-bolder">Created by <i class="text-light">DrWarpMan</i></span></p>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <script>
        // Reveal animations
        ScrollReveal().reveal('.slide-in', {
            distance: '50%',
            delay: 50,
            origin: 'left',
            duration: 600,
            rotate: {
                x: 50,
                y: 0,
                z: -50
            }
        });

        ScrollReveal().reveal('img', {
            delay: 0,
            origin: 'top',
            duration: 800
        });

        ScrollReveal().reveal('section', {
            delay: 100,
            origin: 'top',
            duration: 850,
            beforeReveal: function () {
                animateNumbers();
            }
        });

        // Bugfix
        var _run = false;
        function animateNumbers() {
            if (_run) return;

            $('.stats').each(function () {
                $(this).prop('Counter', 0).animate({
                    Counter: $(this).text()
                }, {
                    duration: 3500,
                    easing: 'swing',
                    step: function (now) {
                        $(this).text(Math.ceil(now));
                    }
                });
            });

            _run = true;
        }

        // Scroll animations
        $("main a").each(function (_, element) {         
            if(element.href !== "ts3server://dark-gaming.eu")
            {
                $(element).click(function () {
                    $('html, body').animate({
                        scrollTop: $($(element).attr("href")).offset().top
                    }, 500);
                });
            }
        });
    </script>
</body>

</html>
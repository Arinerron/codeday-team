<html>

    <body>
        <div class="container-full cool-red">
            <div class="row cool-red">
                <div class="col-lg-12 text-center v-center">
                     <?php if(!isSignedIn())
                        echo "<h1>" . SITE_TITLE ."</h1><p class=\"lead\">" . SITE_TITLE . " is a simple site to connect you with fellow developers.</p> <br class=\"\"> <form class=\"col-lg-12\"> <div class=\"input-group\" style=\"width:340px;text-align:center;margin:0 auto;\"> <input id=\"email\" type=\"text\" class=\"form-control input-lg\" title=\"Don\'t worry. We hate spam, and will not share your email with anyone.\" placeholder=\"Enter your email address...\"> <span class=\"input-group-btn\"><button class=\"btn btn-lg btn-primary\" type=\"button\" href=\"javascript:window.location.href = 'register?email=' + document.getElementById('email').value;\" onclick=\"window.location.href = 'register?email=' + document.getElementById('email').value;\" value=\"OK\">OK</button></span> </div> </form>";
                        else {
                            $arr = array("Welcome back, " . $_SESSION['username'] . "!", "Aloha!", "Hey!", "Howdy, " . $_SESSION['username'] . "!", "Hello again!", "Sup, " . $_SESSION['username'] . "!");
                            echo "<h1>" . $arr[array_rand($arr)] . "</h1>";
                        }
                     ?>

                     <br>
                </div>
            </div>
        </div>

        <?php showSimilar() ?>
    </body>
</html>

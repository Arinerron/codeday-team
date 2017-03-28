<?php
    include_once "includes/functions.php";
    include_once "includes/strings.php";

    if(!SECURE) {
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);
    }
?>

<head>
    <title><?php $sitename = htmlspecialchars(NAME); echo $sitename; ?></title>
    <meta http-equiv="content-language" content="en" />
    <meta name="description" content="<?php echo $sitename; ?>" />
    <meta name="keywords" content="<?php echo $sitename; ?>" />
    <meta http-equiv="content-type" content="text/html"; charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="theme-color" content="#ec644b" />
    <meta name="msapplication-navbutton-color" content="#ec644b" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <link rel="stylesheet" type="text/css" href="/css/styles.css">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel=icon href=/favicon.png>
    <nav>
        <div id="custom-bootstrap-menu" class="navbar navbar-default navbar-fixed-top" role="navigation">
            <div class="container-fluid">
                <div class="navbar-header"><a class="navbar-brand" href="/" style="font-family: monospace !important"><?php echo $sitename; if(!SECURE) echo ' / <b style="color:red;">development mode</b>';?></a>
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-menubuilder"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse navbar-menubuilder">
                    <ul class="nav navbar-nav navbar-left">
                        <?php
                            if(isSignedIn()) {
                                echo '
                                    <li><a href="/profile/' . htmlspecialchars($_SESSION['username']) . '/">' . SHORT_USER_PROFILE . '</a></li>
                                    <li><a href="/settings/">' . SHORT_USER_SETTINGS . '</a></li>
                                ';
                                if($_SESSION['rank'] != 0) {
                                    echo '<li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">' . SHORT_USER_MODERATE . ' <span class="caret"></span></a>
                                        <ul class="dropdown-menu">
                                          <li><a href="/admin/attempts/">Login Attempts</a></li>
                                          <li><a href="/admin/users/">Users</a></li>
                                        </ul></li>';
                                }

                                echo '<li><a href="/logout/?csrf=' . getCSRFToken() . '">' . SHORT_USER_LOGOUT . '</a></li>';
                            } else {
                                if(CAN_LOGIN)
                                    echo "<li><a href=\"/login/\">" . SHORT_USER_LOGIN . "</a></li>";
                                if(CAN_REGISTER)
                                    echo "<li><a href=\"/register/\">" . SHORT_USER_REGISTER . "</a></li>";

                            }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <!--
    > ████████╗███████╗███████╗███╗   ██╗██████╗ ███████╗██╗   ██╗ ██████╗ ██████╗ ███████╗
    > ╚══██╔══╝██╔════╝██╔════╝████╗  ██║██╔══██╗██╔════╝██║   ██║██╔═══██╗██╔══██╗██╔════╝
    >    ██║   █████╗  █████╗  ██╔██╗ ██║██║  ██║█████╗  ██║   ██║██║   ██║██████╔╝███████╗
    >    ██║   ██╔══╝  ██╔══╝  ██║╚██╗██║██║  ██║██╔══╝  ╚██╗ ██╔╝██║   ██║██╔═══╝ ╚════██║
    >    ██║   ███████╗███████╗██║ ╚████║██████╔╝███████╗ ╚████╔╝ ╚██████╔╝██║     ███████║
    >    ╚═╝   ╚══════╝╚══════╝╚═╝  ╚═══╝╚═════╝ ╚══════╝  ╚═══╝   ╚═════╝ ╚═╝     ╚══════╝
    > teendev0ps/sp1@sh
    -->

    <br><br>

    <script src="/js/jquery.js" crossorigin="anonymous"></script>
    <script src="/js/bootstrap.min.js" crossorigin="anonymous"></script>
    <script src="/js/main.js" crossorigin="anonymous"></script>
<?php
if(isset($_COOKIE['dark'])){
    $cookie = $_COOKIE['dark'];
	if($cookie == 'true')
	    echo '<link rel="stylesheet" href="/css/dark.css">';
}
?>
</head>

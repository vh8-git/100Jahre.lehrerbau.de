<?php
//Der mainController steuert den grundsätzlichen Seitenaufbau und stellt die einzelnen
//Seiteninhalte nach Bedarf (über eine switch) zusammen.
 

// BAUT DEN SEITENINHALT AUF
switch ($page) {
    
    case 'home' :
        
        // benötigte Funktionen laden (MODELS)
        
        // benötigten Controller laden (CONTROLLERS)

        require_once APP_PATH . 'controllers/cont.chronikedit.php';


        //Setzt den Werte für die Variablen $header, socNav, barNav und selectNav die dann in header.php und footer.php genutzt werden.
        $script['header'] = '';
        $script['barNav'] = file_get_contents(APP_PATH . 'views/barriereNav.php');
        $script['fraktionNav'] = file_get_contents(APP_PATH . 'views/fraktionNav.php');
        $script['socialNav'] = file_get_contents(APP_PATH . 'views/socialNav.php');
        $script['cmsButton'] = file_get_contents(APP_PATH . 'views/cmsButton.php');

        // Seite zusammensetzen (VIEWS)
        require_once APP_PATH . 'views/head.php';
        //require_once APP_PATH . 'views/loginButton.php';
        require_once APP_PATH . 'views/header.php';
        require_once APP_PATH . 'views/stages/work.php';
        require_once APP_PATH . 'views/footer.php';
        require_once APP_PATH . 'views/foot.php';
        break;

    case 'workedit' :

        if (isset($_SESSION['login']) && $_SESSION['login'] == 1) {

            // benötigte Funktionen laden (MODELS)

            // benötigten Controller laden (CONTROLLERS)

            require_once APP_PATH . 'controllers/cont.workedit.php';


            //Setzt den Werte für die Variablen $header, socNav, barNav und selectNav die dann in header.php und footer.php genutzt werden.
            $script['header'] = '';
            $script['barNav'] = file_get_contents(APP_PATH . 'views/barriereNav.php');
            $script['fraktionNav'] = file_get_contents(APP_PATH . 'views/fraktionNav.php');
            $script['socialNav'] = file_get_contents(APP_PATH . 'views/socialNav.php');
            $script['cmsButton'] = file_get_contents(APP_PATH . 'views/cmsButton.php');

            // Seite zusammensetzen (VIEWS)
            require_once APP_PATH . 'views/head.php';
            //require_once APP_PATH . 'views/loginButton.php';
            require_once APP_PATH . 'views/header.php';
            require_once APP_PATH . 'views/stages/workEdit.php';
            require_once APP_PATH . 'views/footer.php';
            require_once APP_PATH . 'views/foot.php';
            break;

        } else {
            header('Location: /login');
            break;
        }



    case 'chronik' :


        if (isset($_SESSION['login']) && $_SESSION['login'] == 1) {


            // benötigte Funktionen laden (MODELS)

        // benötigten Controller laden (CONTROLLERS)
        require_once APP_PATH . 'controllers/cont.chronik.php';

        //Setzt den Werte für die Variablen $header, socNav, barNav und selectNav die dann in header.php und footer.php genutzt werden.
        $script['header'] = '<div class="stageBackground bgImageWork"></div>';
        $script['barNav'] = file_get_contents(APP_PATH . 'views/barriereNav.php');
        $script['fraktionNav'] = '';
        $script['socialNav'] = file_get_contents(APP_PATH . 'views/socialNav.php');


        // Seite zusammensetzen (VIEWS)
        require_once APP_PATH . 'views/head.php';
        //require_once APP_PATH . 'views/loginButton.php';
        require_once APP_PATH . 'views/header.php';
        require_once APP_PATH . 'views/stages/chronik.php';
        require_once APP_PATH . 'views/footer.php';
        require_once APP_PATH . 'views/foot.php';
        break;


        } else {
            header('Location: /login');
            break;
        }

    case 'chronikedit' :

        if (isset($_SESSION['login']) && $_SESSION['login'] == 1) {
            // benötigte Funktionen laden (MODELS)

            // benötigten Controller laden (CONTROLLERS)
            require_once APP_PATH . 'controllers/cont.chronikedit.php';

            //Setzt den Werte für die Variablen $header, socNav, barNav und selectNav die dann in header.php und footer.php genutzt werden.
            $script['header'] = '<div class="stageBackground bgImageWork"></div>';
            $script['barNav'] = file_get_contents(APP_PATH . 'views/barriereNav.php');
            $script['fraktionNav'] = '';
            $script['socialNav'] = file_get_contents(APP_PATH . 'views/socialNav.php');


            // Seite zusammensetzen (VIEWS)
            require_once APP_PATH . 'views/head.php';
            //require_once APP_PATH . 'views/loginButton.php';
            require_once APP_PATH . 'views/header.php';
            require_once APP_PATH . 'views/stages/chronikEdit.php';
            require_once APP_PATH . 'views/footer.php';
            require_once APP_PATH . 'views/foot.php';
            break;

        } else {
            header('Location: /login');
            break;
        }


    case 'datasecure' :

        $script['header'] = '';
        $script['barNav'] = file_get_contents(APP_PATH . 'views/barriereNav.php');
        $script['fraktionNav'] = '';
        $script['socialNav'] = file_get_contents(APP_PATH . 'views/socialNav.php');


        require_once APP_PATH . 'views/head.php';
        //require_once APP_PATH . 'views/loginButton.php';
        require_once APP_PATH . 'views/header.php';
        require_once APP_PATH . 'views/stages/datasecure.php';
        require_once APP_PATH . 'views/footer.php';
        require_once APP_PATH . 'views/foot.php';
        break;
    
    case 'login' :
        
        //Weiche damit eingelockte User direkt zur Seite Userinfo weitergeleitet werden haben. Dafür muss die Variabel $_SESSION['login'] = 1 sein.
        if (isset($_SESSION['login']) && $_SESSION['login'] == 1) {
            header('Location: createUrl(["page" => "userInfo"])');
            break;
        
        } else {

            $script['header'] = '';
            $script['barNav'] = file_get_contents(APP_PATH . 'views/barriereNav.php');
            $script['fraktionNav'] = '';
            $script['socialNav'] = file_get_contents(APP_PATH . 'views/socialNav.php');

            require_once APP_PATH . 'controllers/cont.login.php';
        
        require_once APP_PATH . 'views/head.php';
        //require_once APP_PATH . 'views/loginButton.php';
        require_once APP_PATH . 'views/header.php';
        require_once APP_PATH . 'views/stages/login.php';
        require_once APP_PATH . 'views/footer.php';
        require_once APP_PATH . 'views/foot.php';
        break;
        }

    case 'logout' :
        
        require_once APP_PATH . 'models/func.logout.php';
        
        logout();
        
        header('Location: /home');
        break;
    
    case 'hidden' :
        
        break;
    
    
    default :

        header('Location: /home');
        break;
        
}

$_SESSION['intro'] = '0';
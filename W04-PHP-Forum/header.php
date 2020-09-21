

    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="nl" lang="nl">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="description" content="A short description." />
        <meta name="keywords" content="put, keywords, here" />
        <title>PHP-MySQL forum</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    </head>
    <body>
            <nav class="navbar-inverse">
                <div class="container-fluid">
                    <ul class="nav navbar-nav">
                        <li><a href="/wbd2/index.php">Home</a> 
                        <li><a href="/wbd2/create_topic.php">Create Discussion</a></li>
                    </ul>
                </div>
            </nav>
            
            <div class="jumbotron text-center mb-0">
    
            <?php
                if(!isset($_SESSION)) 
                { 
                    session_start(); 
                } 
                if($_SESSION['signed_in'])
                {
                    
                    echo '
                    <div class="col-lg-12 text-right">Not you? <a href="signout.php">Sign out</a></h5></div><div class="row"></div>';
                    echo '<div class="jumbotron text-center mb-0">
                    <h1>Hello, ' . $_SESSION['user_name'] . '</h1><p> By : 13518038 - K1 - Inka Anindya Riyadi</p></div>';
                }
                else
                {   
                    
                    echo '<div class="col-lg-12 text-right"><h5> <a href="signin.php">Sign in</a></div>';
                    echo '<div class="jumbotron text-center mb-0">
                    <h1>Hello! </h1>
                    <p>By: 13518038 - K1 - Inka Anindya Riyadi</p>
                </div>';
                }
            ?>
            </div> 
            
        </div>
        <div id="content">

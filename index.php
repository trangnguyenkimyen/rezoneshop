<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="logo.svg" type="image/icon type">    
    <title>Re-zone | Luxury Fashion & Beauty</title>    

    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Helvetica, sans-serif;
            font-size: 15px;
            color: #545540;

            height: 100vh;
            width: 100%;            
        }

        .content {
            padding-left: 25px;
        }

        header nav {
            position: absolute;
        }

        .main-top-background {
            width: 100%;            
        }
        
    </style>
        
</head>

<body>
    <header>
        <?php require_once("navbar.php"); ?>
    </header>

    <main>
        <div class="wrapper-video">
            <!-- Demo video -->
            <video autoplay muted loop id="myVideo" class="main-top-background">
                <source src="video/background.mp4" type="video/mp4">
            </video>            
        </div>

        <div class="content">
                      
        </div>  
    </main>
</body>

</html>
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
        .container{
            position: relative;
            opacity: 0.75;
        
        }
        .container:hover {
            opacity: 1;
        }

        .new_arrivals {
            position: relative;
            z-index: -1;

        }
        .new_arrivals img{
            margin:0;
            width: 300px;
            height: 500px;
    
        }
        
        .content{
            font-size:30px;
            color: white;
            margin:30px;
            position: absolute;
            z-index: 0;
            opacity: 1;
            font-weight: bold;
        }

        header nav {
            position: absolute;
        }

        .main-top-background {
            width: 100%;            
        }

        .new{
            height: 600px;
            width:100%;
            margin:0;
            display: grid;
            position: relative;
            z-index:-1;
            overflow:hidden;
        }

        .list_new{
            display:flex;
            width:calc(400px * 14);
            animation: scroll 80s linear infinite;
        }

        @keyframes scroll{
            0%{
                transform: translateX(0);
            }
            100%{
                transform: translateX(calc(-400px * 9));
            }
        }

        .img_new{
            height: 600px;
            width: 400px;
            display:flex;
       
        }

        .img_new img{
            width:100%;
        }

        .line-1{
            height: 2px;
            background: #595945;
            width:400px; 
            margin-bottom: 16px;
        }
        .content_newarrivals{
            font-size:40px;
            margin:16px 0px 0px 24px;
            font-family: Fantasy;
            color: #A6A59C;
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

        <div class="content_newarrivals">
            <p>NEW ARRIVALS</p> 
        </div>

        <!-- newarrivals -->
        <div class="new">
            <div class="list_new">
                <div class="img_new">
                    <img src="img/1.jpg"/> 
                </div>
                <div class="img_new">
                    <img src="img/2.jpg"/>  
                </div>
                <div class="img_new">
                    <img src="img/3.jpg"/> 
                </div>
                <div class="img_new">
                    <img src="img/4.jpg"/> 
                </div>
                <div class="img_new">
                    <img src="img/5.jpg"/> 
                </div>
                <div class="img_new">
                    <img src="img/6.jpg"/> 
                </div>
                <div class="img_new">
                    <img src="img/7.jpg"/> 
                </div>
                
                <!-- 2 -->
            
                <div class="img_new">
                    <img src="img/1.jpg"/> 
                </div>
                <div class="img_new">
                    <img src="img/2.jpg"/>  
                </div>
                <div class="img_new">
                    <img src="img/3.jpg"/> 
                </div>
                <div class="img_new">
                    <img src="img/4.jpg"/> 
                </div>
                <div class="img_new">
                    <img src="img/5.jpg"/> 
                </div>
                <div class="img_new">
                    <img src="img/6.jpg"/> 
                </div>
                <div class="img_new">
                    <img src="img/7.jpg"/> 
                </div>
            </div>
        </div>  
    </main>

    <footer>
        <?php require_once("footer.php");?>
    </footer>
</body>

</html>
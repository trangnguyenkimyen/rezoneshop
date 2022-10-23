<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap');

        nav {
            color: #ffffff;
            font-weight: bold;             
            width: 100%;                               
        }        

        nav a,
        button {
            font: inherit;
            color: inherit;
        }

        nav button {
            background: transparent;
            border: none;
        }

        nav a {
            text-decoration: none;
        }

        nav svg {
            fill: #ffffff;
            width: 20px;
            height: 20px;            
        }

        .dropdown-right button {
            margin-left: 25px;
        }

        .male {
            margin-left: 30px;
        }

        .dropdown {            
            position: relative;
            background: transparent;

            height: 12vh;  
            display: flex;
            justify-content: space-between;
            align-items: center;

            padding: 0 25px;
            transition: all 0.15s ease-out;
        }

        .dropdown:hover {
            background: #ffffff;
            color: #545540;
        }

        .dropdown:hover .dropdown-right svg {
            fill: #545540;
        }

        .dropdown:hover .dropdown-right svg:hover {
            fill: black;
        }

        .drop-btn:hover {
            text-decoration: underline;
        }

        .dropdown-left, .dropdown-right {
            display: flex;
        }

        .dropdown-content li {
            display: inline;
            margin-right: 20px;
            transition: color 0.3s;
        }

        .dropdown-content {
            z-index: -1;
            list-style: none;
            position: absolute;
            margin-top: 10px;
            padding: 20px;
            background: #ffffff;

            font-weight: normal;
            border-top: none;

            opacity: 0;
            transform: translateY(-160%); /* start position */            
            transition: transform 0.65s ease-in-out;
            transition-delay: 0.05s;
        }

        .dropdown-content li:hover {            
            color: #7596b8;
            cursor: pointer;
        }

        .dropdown-content li a:hover {
            cursor: pointer;
        }

        .dropdown-btn-content:hover .dropdown-content {
            opacity: 1;
            transform: translateY(-20%); /* end position */            
        }

        .dropdown-btn-content:hover .wrapper-drop-btn {
            height: 12vh;                        
        }

        .shop-name {
            font-family: "Montserrat", sans-serif;
            font-size: 30px; 
            
            position: absolute;
            left: 45%;
        }

        .shop-name:hover {            
            color: black;
        }

        .wrapper-navbar {
            position: relative;
            z-index: 13;
        }

        .wrapper-drop-btn {
            height: 100%;
            display: flex;
            align-items: center;

            transition: height;
        }        

    </style> 
</head>

<body>
    <div class="wrapper-navbar">        
        <nav>        
            <div class="dropdown">
                <div class="dropdown-left">
                    <div class="dropdown-btn-content female">
                        <div class="wrapper-drop-btn">
                            <button class="drop-btn"><a href="female.php?page=main-page">Female</a></button>
                        </div>
                                                
                        <ul class="dropdown-content">                            
                            <li><a href="female.php?page=tops">Tops</a></li>
                            <li><a href="female.php?page=bottoms">Bottoms</a></li>
                            <li><a href="female.php?page=dresses">Dresses</a></li>
                            <li><a href="female.php?page=sporty">Sporty</a></li>
                        </ul>                        
                    </div>               
                    
                    <div class="dropdown-btn-content male">
                        <div class="wrapper-drop-btn">
                            <button class="drop-btn"><a href="male.php?page=main-page">Male</a></button>
                        </div>

                        <ul class="dropdown-content">                            
                            <li><a href="male.php?page=tops">Tops</a></li>
                            <li><a href="male.php?page=bottoms">Bottoms</a></li>
                            <li><a href="male.php?page=suits">Suits</a></li>
                            <li><a href="male.php?page=sporty">Sporty</a></li>
                        </ul>
                    </div>                
                </div>            
 
                <button class="shop-name"><a href="index.php">Re-zone</a></button>                

                <div class="dropdown-right">                     
                    <?php if(isset($_SESSION["User_name"])) {
                        ?>
                        <button>
                            <?php 
                                echo "Hi ".$_SESSION["User_name"];                                
                            ?>
                        </button>
                        <?php                                              
                    }?>                                       
                    <div class="dropdown-btn-content">
                        <div class="wrapper-drop-btn">
                            <button>
                                <a href="login.php">                    
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                        <title>Login</title>
                                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                                        <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                                    </svg>
                                </a>
                            </button> 
                        </div>
                    </div>              
                     
                    <button>
                        <a href="search.php">                    
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                <title>Search</title>
                                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                            </svg>
                        </a>
                    </button>

                    <button>
                        <a href="bag.php">                    
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bag" viewBox="0 0 16 16">
                                <title>Bag</title>
                                <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z"/>
                            </svg>
                        </a>
                    </button>

                </div>
            </div>
        </nav>
    </div>    
</body>
</html>
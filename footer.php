<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,500;0,600;0,700;1,300&display=swap');
        body{
            margin:0;
            padding:0;  
            line-height:1.5;
        }

        .footer{
            background: black;
            box-sizing: border-box;
            bottom: 0;            
        }

        .container{
            max-width: 1200px;

            margin: auto;
        }

        .f_row{
            display: flex;
            padding: 20px 0px 20px 60px;
        }

        .f_colum{
            width: 33%;
            color: white;
            display: inline-block;
        }

        .f_colum ul{
            padding:0;
            font-size: 14px;
            font-family: 'Poppins', sans-serif;
        }

        .f_colum ul li:not(:last-child){
            margin-bottom:10px;
        }

        .f_colum ul li a{
            font-size: 14px;
            text-transform: capitalize;
            display: block;
            transition: all 0.3s ease;
        }

        .f_colum ul li a:hover{
            padding-left:5px;

        }
        .f_colum h4{
            font-family: 'Poppins', sans-serif;
            font-size: 16px;
            position: relative;
            text-transform: capitalize;
            margin-bottom:30px;
            font-weight:500;
            padding:0;
        }

        .f_colum h4::before{
            content:'';
            position: absolute;
            left:0;
            bottom:-10px;
            background-color: #545540;
            height: 2px;
            width: 50px;
        }

        .follow_us{
            padding: 10px;
        }

        .f_colum .follow_us a{
           height:40px;
           width:40px;
           display: inline-block;
           background-color: #B2B2B2;   
           border-radius: 50%;
           text-align: center;
           line-height:40px; 
           color: black;
        }

        .f_colum .follow_us a:not(first-child){
            margin-right:10px;
        }
        .f_colum .follow_us a:hover{
            background-color: white;
        }
        .footer ul {
            list-style: none;
        }
        
        footer li a{
            text-decoration: none;
            color: white;
        }
    </style>
</head>
<body>
    <footer class="footer">
        <div class ="container">
            <div class="f_row">
                <div class="f_colum">
                    <h4>COMPANY</h4>
                    <ul>
                        <li><a href="#">About us</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Our Services</a></li>
                    </ul>
                </div>

                <div class="f_colum">
                    <h4>CUSTOMER SERVICES</h4>
                    <ul>
                        <li><a href="#">FAQ</a></li>
                        <li><a href="#">Shipping</a></li>
                        <li><a href="#">Payment Options</a></li>
                    </ul>
                </div>

                <div class="f_colum">
                    <h4>FOLLOW US</h4>
                    <ul>
                        <div class="follow_us">
                            <a href="https://www.facebook.com/profile.php?id=100087379351280" target="_blank"><i class="fab fa-facebook-f"></i></a>
                            <a href="https://www.instagram.com/lfab_rezone/" target="_blank"><i class="fab fa-instagram"></i></a>
                            <a href="https://twitter.com/Rezone71147470" target="_blank"><i class="fab fa-twitter"></i></a>
                        </div>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>
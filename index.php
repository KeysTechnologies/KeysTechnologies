<html>
    <head>
        <title>Login</title>
        <style>
            body
            {
                background-color:#9ED2BE;
            }
            div{
                height:400px;
                width:400px;
                border:2px solid black;
                border-radius:50%;
                background-color:black;
                color:white;
                text-align:center;
                position:absolute;
                left:35%;
                top:15%;
            }
            input
            {
                width:60%;
                height:8%;
                padding:20px;
            }
            button
            {
                height:100px;
                width:100px;
                border-radius:50%;
                background-color:red;
                color:white;
                position:absolute;
                left:55%;
                bottom:15%;
            }
        </style>
    </head>
    <body>
        <form action="<?php $_SERVER['PHP_SELF']?>" method="post" autocomplete="off">
        <div>
            <h1 style="margin-top:25%;">LOGIN</h1>
            <input type="text" placeholder="Username" name="username"><br><br>
            <input type="password" placeholder="Password" name="password"><br> 
            <input type="checkbox" onclick="show()" style="width:auto;padding:auto;height:auto;">Show password
        </div>
        <button>LOGIN</button>
        </form>
        <script>
            function show()
            {
                var password=document.getElementsByTagName("input")[1];
                if(password.type=="password")
                {
                    password.type="text";
                }
                else
                {
                    password.type="password";
                }
            }
        </script>
        <?php
            if(isset($_POST['username']))
            {
                $conn=new mysqli("localhost","root","","Keys");
                if($conn->connect_error)
                {
                    die("connection failed");
                }
                $sql="Select Password from admin where Username='$_POST[username]'";
                $result=$conn->query($sql);
                if($result->num_rows>0)
                {
                    while($row=$result->fetch_assoc())
                    {
                        if($row["Password"]==$_POST["password"])
                        {
                            echo "<script>window.location.href='Home.php'</script>";
                        }
                        else
                        {
                            echo "<script>alert('Wrong Password')</script>";
                        }
                    }
                }
                else
                {
                    echo "<script>alert('Enter correct userName')</script>";
                }
                $conn->close();
            }
        ?>
    </body>
</html>
<html>
    <head>
        <title>Create Student</title>
        <style>
            body
            {
                background-color:#9ED2BE;
                color:black;
            }
            table
            {
                position:absolute;
                left:40%;
                top:25%;
            }
            td
            {
                font-size:20px;
            }
            fieldset
            {
                height:50%;
                width:50%;
            }
            h1
            {
                position:absolute;
                left:42%;
                top:10%;
            }
            button
            {
                padding:5px;
                width:100px;
                background-color:white;
                color:#9ED2BE;
                border-radius:20px;
                cursor:pointer;
            }
        </style>
    </head>
    <body>
        <h1>Registration form</h1>
        <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post" autocomplete="off">
            <table>
                <tr>
                    <td>Student ID</td>
                    <td><input type="text" name="id" required></td>
                </tr>
                <tr>
                    <td>FirstName</td>
                    <td><input type="text" name="fname" required></td>
                </tr>
                <tr>
                    <td>LastName</td>
                    <td><input type="text" name="Lname" required></td>
                </tr>
                <tr>
                    <td>Gender</td>
                    <td><input type="radio" value="Male" name="Gender">Male<input type="radio" value="Female" name="Gender">Female</td>
                </tr>
                <tr>
                    <td>Course</td>
                    <td>
                        <select name="course" required>
                            <option value="">Select course</option>
                            <option value="Core Java">Core Java</option>
                            <option value="Python">Python</option>
                            <option value="Full Stack">Full Stack</option>
                            <option value="Web Technologies">Web Technologies</option>
                            <option value="Internship">Internship</option>
                            <option value="Manual">Manual</option>
                            <option value="Automation">Automation</option>
                            <option value="SQL">SQL</option>
                            <option value="Tally">Tally</option>
                            <option value="MS-office">MS-Office</option>
                            <option value="PowerBI">PowerBI</option>
                            <option value="C">C</option>
                            <option value="C++">C++</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Mobile</td>
                    <td><input type="number" name="mobile" required></td>
                </tr>
                <tr>
                    <td>Mail</td>
                    <td><input type="email" name="mail"></td>
                </tr>
                <tr>
                    <td>College Name</td>
                    <td><input type="text" name="college" required></td>
                </tr>
                <tr>
                    <td>Year of Pass</td>
                    <td><input type="number" name="yop"></td>
                </tr>
                <tr>
                    <td>Fees</td>
                    <td><input type="number" name="fees" required></td>
                </tr>
                <tr>
                    <td>Timings</td>
                    <td><input type="time" name="FTimings">To<input type="time" name="TTimings"></td>
                </tr>
                <tr>
                <td></td>
                <td><button name="submit">CREATE</button></td>
            </tr>
            </table>
        </form>
        <?php
        if(isset($_POST['submit']))
        {
            $conn=new mysqli("localhost","root","","keys");
            if($conn->connect_error)
            {
                die("connection Failed");
            }
            $sql="insert into students(ID,FirstName,LastName,Gender,Course,Mobile,Mail,College,YOP,Fees,FTime,TTime) values('$_POST[id]','$_POST[fname]','$_POST[Lname]','$_POST[Gender]','$_POST[course]','$_POST[mobile]','$_POST[mail]','$_POST[college]','$_POST[yop]',$_POST[fees],'$_POST[FTimings]','$_POST[TTimings]')";
            if($conn->query($sql))
            {
                echo "<script>alert('Registered successfully');
                        window.location.href='Home.php'</script>";
            }
            else
            {
                echo "<script>alert('The id already exists')</script>";
            }
        }
        ?>
    </body>
</html>
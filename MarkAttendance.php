<?php
session_start();
?>
<html>
    <head>
        <title>Attendance</title>
        <style>
            body
            {
                background-color:#9ED2BE;
            }
            #table
            {
                position:absolute;
                top:10%;
                left:45%;
            }
            table
            {
                position:absolute;
                top:20%;
                width:80%;
                margin-left:10%;
            }
            #submit{
                position:absolute;
                bottom:10%;
                left:50%;
            }
        </style>
    </head>
    <body>
        <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post" id="table">
            <b>Select Batch</b>
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
            <button name="submit">Submit</button>
        </form>
        <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
        <table id="list" border="2px">
                <tr>
                    <th>Status</th>
                    <th>ID</th>
                    <th>FirstName</th>
                    <th>LastName</th>
                    <th>From</th>
                    <th>To</th>
                </tr>
            </table>
            <button name="mark" id="submit">Mark</button>
        </form>
        <?php
            if(isset($_POST['submit']))
            {
                $conn=new mysqli("localhost","root","","keys");
                if($conn->connect_error)
                {
                    die("Connection Failed");
                }
                $_SESSION['course']=$_POST['course'];
                $sql="Select ID,FirstName,LastName,FTime,TTime from students where Course='$_POST[course]'";
                $result=$conn->query($sql);
                if($result->num_rows>0)
                {
                    while($row=$result->fetch_assoc())
                    {
                        echo "<script>
                        var table=document.getElementById('list');
                        var row=table.insertRow(-1);
                        var check=row.insertCell(0);
                        var cell=row.insertCell(1);
                        var cell1=row.insertCell(2);
                        var cell2=row.insertCell(3);
                        var cell3=row.insertCell(4);
                        var cell4=row.insertCell(5);
                        check.innerHTML='<input type=checkbox name=$row[ID] value=present>';
                        cell.innerHTML='$row[ID]';
                        cell1.innerHTML='$row[FirstName]';
                        cell2.innerHTML='$row[LastName]';
                        cell3.innerHTML='$row[FTime]';
                        cell4.innerHTML='$row[TTime]';
                        </script>";
                    }
                }
                else
                {
                    echo "<script>alert('No record found')</script>";
                }
            }
            ?>
        <?php
            if(isset($_POST['mark']))
            {
                $day=date("dmy");
                $day="day".$day;
                $conn=new mysqli("localhost","root","","keys");
                $sql="SHOW COLUMNS FROM `students` LIKE '$day'";
                $result=$conn->query($sql);
                if($result->num_rows>0)
                {
                }
                else
                {
                    $column="alter table students add column $day varchar(10)";
                    $conn->query($column);
                }
                $sql="Select ID from students where Course='$_SESSION[course]'";
                $result=$conn->query($sql);
                if($result->num_rows>0)
                {
                    while($row=$result->fetch_assoc())
                    {
                        if($_POST[$row['ID']]=="present")
                        {
                            $state="present";
                        }
                        else
                        {
                            $state="absent";
                        }
                        $sql1="update students set $day='$state' where ID='$row[ID]'";
                        if($conn->query($sql1))
                        {
                            echo "<script>alert('Attendance Marked');
                                    window.location.href='Home.php';</script>";
                        }
                        else
                        {
                            echo "<script>alert('Failed')</script>";
                        }
                    }
                }
                $conn->close();

            }
        ?>
    </body>
</html>
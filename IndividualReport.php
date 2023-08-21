<html>
    <head>
        <title>Report</title>
        <style>
            form
            {
                position:absolute;
                top:10%;
                left:45%;
            }
            body
            {
                background-color:#9ED2BE;
            }
            table
            {
                position:absolute;
                top:20%;
                width:80%;
                margin-left:10%;
            }
        </style>
    </head>
    <body>
        <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post" autocomplete="off">
            <b>Enter id</b>
            <input type="text" name="id">
            <button name="submit">Submit</button>
        </form>
        <table id="list" border="2px">
            <tr>
                <th>ID</th>
                <th>FirstName</th>
                <th>LastName</th>
                <th>From</th>
                <th>To</th>
                <th>Fees</th>
            </tr>
        </table>
        <?php
            if(isset($_POST['submit']))
                {
                    $conn=new mysqli("localhost","root","","keys");
                    if($conn->connect_error)
                    {
                        die("Connection Failed");
                    }
                    $sql="Select ID,FirstName,LastName,FTime,TTime,Fees from students where ID='$_POST[id]'";
                    $result=$conn->query($sql);
                    if($result->num_rows>0)
                    {
                        while($row=$result->fetch_assoc())
                        {
                            echo "<script>
                            var table=document.getElementById('list');
                            var row=table.insertRow(-1);
                            var cell=row.insertCell(0);
                            var cell1=row.insertCell(1);
                            var cell2=row.insertCell(2);
                            var cell3=row.insertCell(3);
                            var cell4=row.insertCell(4);
                            var cell5=row.insertCell(5);
                            cell.innerHTML='$row[ID]';
                            cell1.innerHTML='$row[FirstName]';
                            cell2.innerHTML='$row[LastName]';
                            cell3.innerHTML='$row[FTime]';
                            cell4.innerHTML='$row[TTime]';
                            cell5.innerHTML='$row[Fees]';
                            </script>";
                        }
                    }
                    else
                    {
                        echo "<script>alert('No record found')</script>";
                    }
                }
        ?>
    </body>
</html>
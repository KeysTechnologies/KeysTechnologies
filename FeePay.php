<html>
    <head>
        <title>Fee Pay</title>
        <style>
            body
            {
                background-color:#9ED2BE;
            }
            #table
            {
                position:absolute;
                left:40%;
                top:35%;
            }
            td
            {
                font-size:20px;
            }
            #details
            {
                position:absolute;
                left:40%;
                top:10%;
            }
        </style>
    </head>
    <body>
    <?php
            if(isset($_POST['submit']))
            {
                $conn=new mysqli("localhost","root","","keys");
                if($conn->connect_error)
                {
                    die("connection failed");
                }
                $sql="SELECT FirstName,Course,Fees,RFees FROM students where ID='$_POST[id]'";
                $result=$conn->query($sql);
                if($result->num_rows>0)
                {
                    while($row=$result->fetch_assoc())
                    {
                        $name=$row['FirstName'];
                        $course=$row['Course'];
                        $tfee=$row['Fees'];
                        $rfee=$row['RFees'];
                    }
                }
            }
        ?>
        <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post" autocomplete="off" id="details">
            <b>Enter id</b>
            <input type="text" name="id">
            <button name="submit">Submit</button>
        </form>
        <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post" id="table">
            <table id="list">
                <tr>
                    <td>Name</td>
                    <td><input type="text" readonly value="<?php echo $name ?>">
                </tr>
                <tr>
                    <td>Course</td>
                    <td><input type="text" readonly value="<?php echo $course ?>">
                </tr>
                <tr>
                    <td>Total Fees</td>
                    <td><input type="text" readonly value="<?php echo $tfee ?>">
                </tr>
                <tr>
                    <td>Remanining Fees</td>
                    <td><input type="text" readonly value="<?php echo $rfee ?>">
                </tr>
                <tr>
                    <td>Fees to be paid</td>
                    <td><input type="number">
                </tr>
            </table>
            <button name="pay">Pay</button>
        </form>
        <?php
            if(isset($_POST['pay']))
            {
                $conn=new mysqli("localhost","root","","keys");
                if($conn->connect_error)
                {
                    die("connection failed");
                }
                
            }
        ?>
    </body>
</html>
<html>
<head>
    <title>Home</title>
    <style>
        body
        {
            background-color:#9ED2BE;
        }
        #navigation
        {
            display:block;
            padding-top:10px;
            background-color:#354259;
            height:50px;
        }
        button
        {
            color:#354259;
            font-weight:bold;
            width:16%;
            padding:10px;
            cursor:pointer;
            background-color:#9ED2BE;
        }
        h1
        {
            color:white;
            font-size:70px;
            text-align:center;
            margin-top:20%;
        }
        div
        {
            display:none;
        }
    </style>
</head>
<body>
    <div id="navigation">
        <a href="CreateStudent.php"><button style="margin-left:20px;">Create Student</button></a>
        <a href="ViewDetailsNav.html"><button>View Details</button></a>
        <a href="MarkAttendance.php"><button>Mark Attendance</button></a>
        <a href=""><button>Attendance Report</button></a>
        <a href="FeePay.php"><button>Fee pay</button></a>
        <a href="index.php"><button>Log out</button></a>
    </div>
    <h1>WELCOME TO KEYS</h1>
    <script>
        function show()
        {
            alert("hi");
            var element=document.getElementById("Student");
            element.style.display="block";
        }
    </script>
</body>
</html>
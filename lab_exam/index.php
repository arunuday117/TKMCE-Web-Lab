<?php
 $con=mysqli_connect("localhost","root","","emp_db");
 if(!$con){
     printf("Connection Failed",mysqli_connect_error());
 }
 else{
     $msg["con"]="Connection Successfull";
     if(isset($_POST['submit'])){
         $emp_id=$_POST['emp_id'];
         $emp_name=$_POST['emp_name'];
         $job_name=$_POST['job_name'];
         $m_id=$_POST['m_id'];
         $salary=$_POST['salary'];
         $flag=0;
         if(empty($emp_id)){
             $msg["emp_id"]="*Employee ID reuired";
             $flag=1;
         }
         if(empty($emp_name)){
            $msg["emp_name"]="*Employee Name reuired";
            $flag=1;
        }
        if(empty($job_name)){
            $msg["job_name"]="*Job Name reuired";
            $flag=1;
        }
        if(empty($m_id)){
            $msg["m_id"]="*Manager ID reuired";
            $flag=1;
        }
        if(empty($salary)){
            $msg["salary"]="*Salary is reuired";
            $flag=1;
        }
        if($flag==0){
            if(!preg_match('/^[a-zA-Z ]*$/',$emp_name)){
                $msg["emp_name"]="*Invalid employee name";
                $flag=1;
            }
            if(!preg_match('/^[a-zA-Z ]*$/',$job_name)){
                $msg["job_name"]="*Invalid job name";
                $flag=1;
            }
            if($flag==0){
                $query="INSERT INTO emp_table(id,emp_name,job_name,mid,salary)VALUES('$emp_id','$emp_name','$job_name','$m_id','$salary')";
                if(mysqli_query($con,$query)){
                    $msg['query']="Data Inserted";
                }
                else{
                    $msg['query']="Data not inserted";
                }
            }
        }
     }
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Details</title>
    <style>
        body{
            display:flex;
            flex-direction: column;
            justify-content: space-between;
            align-items: center;
        }
        div{
            padding:20px;
        }
        form{
            border:1px solid black;
            border-radius:10px;
            padding:20px;
            margin:20px;
        }
        label{
            display:inline-block;
            width:400px;
        }
        input{
            width:200px;
        }
        span{
            color:red;
        }
        table{
            border-collapse:collapse;
            width:100%;
        }
        tr,td,th{
            border:1px solid black;
            width:150px;
        }
        h3{
            text-align:center;
            padding-bottom:20px;
        }
    </style>
</head>
<body>
    <div>
        <form action="" method="post">
        <h3>Employee Details</h3>
            <label>Employee ID </label> <input type="number" name="emp_id">
            <span><?php if(isset($msg['emp_id']))echo$msg['emp_id'] ?></span><br>
            <label>Employee Name </label> <input type="text" name="emp_name">
            <span><?php if(isset($msg['emp_name']))echo$msg['emp_name'] ?></span><br>
            <label>Job Name </label> <input type="text" name="job_name">
            <span><?php if(isset($msg['job_name']))echo$msg['job_name'] ?></span><br>
            <label>Manager ID </label> <input type="number" name="m_id">
            <span><?php if(isset($msg['m_id']))echo$msg['m_id'] ?></span><br>
            <label>Salary </label> <input type="number" name="salary">
            <span><?php if(isset($msg['salary']))echo$msg['salary'] ?></span><br>
            <input type="submit" value="Submit" name="submit"><br>
            <span><?php if(isset($msg['con']))echo$msg['con'] ?></span><br>
            <span><?php if(isset($msg['query']))echo$msg['query'] ?></span>
        </form>
    </div>
    <div>
        <h3>Employee Details</h3>
        <table width="90%">
            <tr>
                <th>Employee ID</th>
                <th>Employee Name</th>
                <th>Job Name</th>
                <th>Manager ID</th>
                <th>Salary</th>
            </tr>
            <?php
                $query=mysqli_query($con,"SELECT * FROM emp_table");
                if(mysqli_num_rows($query)>0){
                    while($row = mysqli_fetch_array($query)){?>
                    <tr>
                        <td><?php echo$row['id']; ?></td>
                        <td><?php echo$row['emp_name']; ?></td>
                        <td><?php echo$row['job_name']; ?></td>
                        <td><?php echo$row['mid']; ?></td>
                        <td><?php echo$row['salary']; ?></td>
                    </tr>
                    <?php }
                }
                else{?>
                    <tr>
                        <td colspan="5">No Rows Selected</td>
                    </tr>
                <?php  
                }
            ?>
        </table>
    </div>
    <div>
        <h3>Employee getting salary greater than 35000</h3>
        <table>
            <tr>
                <th>Employee Name</th>
                <th>Salary</th>
            </tr>
            <?php
                $query=mysqli_query($con,"SELECT emp_name,salary FROM emp_table WHERE salary>35000");
                if(mysqli_num_rows($query)>0){
                    while($row = mysqli_fetch_array($query)){?>
                    <tr>
                        <td><?php echo$row['emp_name']; ?></td>
                        <td><?php echo$row['salary']; ?></td>
                    </tr>
                    <?php }
                }
                else{?>
                    <tr>
                        <td colspan="2">No Rows Selected</td>
                    </tr>
                <?php  
                }
            ?>
        </table>
    </div>
</body>
</html>
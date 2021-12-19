<?php
// session_start();

if(isset($_SESSION['id']))
{
header('location:company.php');
}
include('dbconn.php');
if(isset($_POST['commit']))
{
$username=$_POST['companyname'];
$password=$_POST['year'];
$qry="SELECT * FROM `companydetails` WHERE `CompName`='$username' AND `DataDir`='$password'";

$result=mysqli_query($conn,$qry);
$row=mysqli_num_rows($result);


$this_page=$_SERVER['PHP_SELF'];
$date_auto=date("Y/m/d");
$time_auto=time();

$username=$_COOKIE['username'];

if($row<1)
{
?>
<script>
alert("Username and password does not exist!!!");
window.open('company.php','_self');
</script>
<?php
}
else
{
$data=mysqli_fetch_assoc($result);
$CompId=$data['CompId'];
setCookie('CompId',$CompId,time()+ (10 * 365 * 24 * 60 * 60));
//session_start();
$_SESSION['id']=$id;
$qry="INSERT INTO `logfile` (`LogDate`,`LogTime`,`UserName`,`ActionDone`) VALUES ('$date_auto', '$time_auto' ,'$username','$this_page')";
$result=mysqli_query($conn,$qry);


header('location:admin\dashbord.php');
}

}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Company Details</title>
    <link rel="stylesheet" href="css/stylesheet.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <style type="text/css">
    body {
    font: 13px/20px "Lucida Grande", Tahoma, Verdana, sans-serif;
    color: #404040;
    background: #4B4276 !important;
    }
    table.center {
    margin-left:auto;
    margin-right:auto;
    }
    table
    {
    padding: 25px 50px 75px 100px;
    
    
    background-color:rgb(193, 231, 244);
    background: transparent;
    border-width:5px;
    border-style:double;
    box-shadow: 0 0 20px 1px rgba(0, 0, 0, 0.04);
    
    
    background-color: #ffffff;
    border: 1px solid black;
    opacity: 1;
    filter: alpha(opacity=60);
    
    width: 70%;
    height: 50%;
    
    }
    table td
    {
    padding: 8px 8px;
    }
    </style>
  </head>
  <body>
    
    <div class="alert alert-success" id="success-alert">
  <button type="button" class="close" data-dismiss="alert">x</button>
  <strong>Well Done! </strong> You are successfully logged in.
</div>
    
    <form method="post" action="company.php">
      <table class="center"  style="width:50% ; padding:50px; border: 15px;" bgcolor="white" >
        <tr align="center"><th style="font-size: 25px;padding: 20px;" >Company Details</th></tr><br><br>
        <tr align="center">
          <th style="text-align: justify;font-size: 18px; "> &nbsp; Select Company name :</th>
        </tr>
        <tr>
          
          <td>   <select name="companyname" class="custom-select">
            <?php
            include("dbconn.php");
            $qry = "SELECT * FROM companydetails ORDER BY CompName ASC";
            $result = mysqli_query($conn,$qry);
            while($row = mysqli_fetch_array($result))
            {
            ?>
            <option ><?php echo $row['CompName']; ?></option>
            <?php
            }
            ?>
          </select></td></tr> <br>
          <tr>  <th style="text-align: justify;font-size: 18px;">&nbsp; Select Year</th></tr>
          
          <td > <select name="year" class="custom-select">
            <?php
            include("dbconn.php");
            $qry = "SELECT * FROM companydetails ORDER BY DataDir ASC";
            $result = mysqli_query($conn,$qry);
            while($row = mysqli_fetch_array($result))
            {
            ?>
            <option ><?php echo $row['DataDir']; ?></option>
            <?php
            }
            ?>
          </select></td> </tr>
          <tr><td><p class="submit" align="center"><input type="submit" name="commit" id="submit" value="submit"></p></td></tr>
        </form>
        
        <script>
        // $(window).load(function()
        // {
        // $('#myModal').modal('show');

        // })
     

        // setTimeout(function(){$('#myModal').modal('show');},1000);
      
        $("#success-alert").fadeTo(2000, 500).slideUp(500, function(){
        $("#success-alert").slideUp(500);
});
    

        </script>
        
      </body>
    </html>
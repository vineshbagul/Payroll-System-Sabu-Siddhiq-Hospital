  <link rel="stylesheet" href="../css/stylesheet.css">
     <!-- Latest compiled and minified CSS -->
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>




     <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
     <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">

      <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

      <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
      

     <style type="text/css">
   

  /* define a fixed width for the entire menu */
  .navigation {
    width: 200px;
  }

  /* reset our lists to remove bullet points and padding */
  .mainmenu, .submenu {
    list-style: none;
    padding: 0;
    margin: 0;
  }

  /* make ALL links (main and submenu) have padding and background color */
  .mainmenu a {
    display: block;
    /*background-color: white;*/
    text-decoration: none;
    /*padding: 10px;*/
    color: black;
  }

  /* add hover behaviour */
  .mainmenu a:hover {
      background-color: #594f8d;
  }


  /* when hovering over a .mainmenu item,
    display the submenu inside it.
    we're changing the submenu's max-height from 0 to 200px;
  */

  .mainmenu li:hover .submenu {
    /*display: block;*/
    max-height: 800px;
  }

  /*
    we now overwrite the background-color for .submenu links only.
    CSS reads down the page, so code at the bottom will overwrite the code at the top.
  */

  .submenu a {
    /*background-color: #999;*/
  }

  /* hover behaviour for links inside .submenu */
  .submenu a:hover {
    background-color: #594f8d;
  }

  /* this is the initial state of all submenus.
    we set it to max-height: 0, and hide the overflowed content.
  */
  .submenu {
    overflow: hidden;
    max-height: 0;
    -webkit-transition: all 0.5s ease-out;
  }
    </style>
  </head>
  <body>


   
  <div class="wrapper">
      <div class="sidebar">
          <h2>Sidebar</h2>



          <nav class="navigation">
    <ul class="mainmenu">
     
      <li><a href=""><i class="fas fa-tachometer-alt"></i>Dashbord</a>
        <ul class="submenu">
          <li><a href="DeptMast.php">Department Master</a></li>
          <li><a href="DesiMast.php">Designation Master</a></li>
          <li><a href="BankMast.php">Bank Master</a></li>
          <li><a href="BloodMast.php">Blood Master</a></li>
          <li><a href="BranchMast.php">Branch Master</a></li>
          <li><a href="CatgMast.php">Catgory Master</a></li>
          <li><a href="BankMast.php">Bank Master</a></li>
          <li><a href="LoanBankMast.php">Loan Bank Master</a></li>




        </ul>
      </li>
      
  </nav>
          <ul>
            
              


              <li><a href="EmpMast.php"><i class="fas fa-users"></i>Employee Master</a></li>
              <li><a href="ViewEmp.php"><i class="fas fa-address-card"></i>Employee Details</a></li>
              <li><a href="ViewEmp.php"><i class="fas fa-project-diagram"></i>employee</a></li>
              <li><a href="#"><i class="fas fa-blog"></i>Blogs</a></li>
              <li><a href="#"><i class="fas fa-address-book"></i>Contact</a></li>
              <li><a href="#"><i class="fas fa-map-pin"></i>Map</a></li>
          </ul> 
          <div class="social_media">
            <a href="#"><i class="fab fa-facebook-f"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
        </div>
      </div>


      <div class="main_content">
          <div class="header"> <i class="fas fa-building" style="color:blue;font-weight:bold;font-size: 20px;"></i>&nbsp;&nbsp;<?php echo "".$data['CompName']. "      Year :"; ?><?php echo " ".$data['BegYear']." To ".$data['EndYear']." "; ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-user-alt" style="color:blue;font-weight:bold;font-size: 20;"></i> Welcome !! <?php echo $_COOKIE['username'] ?>
          <a href="../logout.php" style="position: absolute; right: 0 ; background-color: #4B4276;" class="btn btn-info" ><i class="fas fa-sign-out-alt"></i> Logout</a></div> 
        </div>
      </div>
      












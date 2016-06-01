<!DOCTYPE html> 
<html lang="en-US" dir="ltr">  <!--direction of language l to r-->

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>Delivery Services</title>
  <!--Import Google Icon Font-->
  <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!--Import materialize.css-->
  <link type="text/css" rel="stylesheet" href="node_modules/materialize-css/dist/css/materialize.min.css"  media="screen,projection"/>
  <link rel="stylesheet" type="text/css"  href="style.css" />
</head>
<body>

<!-- Dropdown Structure -->
  <ul id="dropdown1" class="dropdown-content">
    <li><a href="#">Teal</a></li>
    <li><a href="#">Salmon</a></li>
    <li><a href="#">Black</a></li>
  </ul>
  <div class="navbar-fixed">
    <nav>
      <div class="nav-wrapper">
        <a href="/index.html" class="brand-logo">Delivery</a>
        <ul class="right ">
          <li><a href="/signup.html">Sign Up</a></li>
          <li><a href="#signup-modal">Sign In</a></li>
          <!-- Dropdown Trigger -->
          <li><a class="dropdown-button" href="#" data-activates="dropdown1">Theme</a></li>
          <li><a href="#shopping-cart" onclick="showHide()"><i class = "material-icons" id="cart">shopping_cart</i></a></li>
        </ul>
      </div>
    </nav>
  </div>
<!-- Cart -->
<!-- http://codepen.io/drehimself/pen/VvYLmV -->
<div class="wrapper" id="shopping-cart">
  <div class="cart">
    <div id="cart-header">
      <span class="badgee">Num Items</span>
      <span class="cart-total">
        <span id='tot'> Total</span> <span id="amount">$40</span>
      </span>
    </div><!-- end cart header -->
    <ul class="cart-items">
      <!-- if empty -->
      <div id='empty'> Empty Cart </div>
      <!-- else -->
      <li class="clearfix">
        <img src="http://economictimes.indiatimes.com/photo/22729131.cms" alt="item1" width="70" height="70"/>
        <span class="item-name">French Fries</span>
        <span class="item-price">$2</span>
        <span class="item-size">Medium</span>
        <span class="item-quantity">Quantity: 01</span>

      </li>
    </ul>
    <div id="cart-footer">  <script type="text/javascript" src="https://js.stripe.com/v1/"></script>
      <form action="" method="POST">
        <!--    <enter data amount here later>-->
        <script
        src="https://checkout.stripe.com/checkout.js" class="stripe-button"
        data-key="pk_live_SiH7iKhWhaCSDkSYNvum1Fju"

        data-amount="999"
        data-name="Food Truck Site"
        data-description="Pay Here!"
        data-image="http://usnwc.org/wp-content/uploads/2015/05/Foodtruck_icon1.png"
        data-locale="auto">
        </script>
      </form>



      <noscript><p>JavaScript is required for the checkout form.</p></noscript>

      <!-- change this path to card.js --></div>
    </div>
  </div>
  <div class="container">

<?php

$servername = "127.0.0.1";
$username = "hanapuan";
$password = "warEhou!se";
$dbname = "hanapuan";

$conn = new mysqli($servername, $username, $password, $dbname);

$p = htmlspecialchars($_POST['pw']);
$name = htmlspecialchars($_POST['email']);

$sql = "SELECT Salt, Verifier from Users where Username='" . $name ."';";

$result = $conn->query($sql);
$verifier;

if($result->num_rows == 1){
//echo $result->num_rows;
$r = $result->fetch_assoc();
$salt = $r['Salt'];
$tableVerifier = $r['Verifier'];
$verifier = $salt . hash("SHA256", $salt . $p);
$matches = strcmp($verifier, $tableVerifier);

if($matches == 0){
 header("Location: http://www.yourwebsite.com/user.php"); /* Redirect browser */
exit();
}
else{
  echo "<br><br><br><h2><center>Incorrect password!</center></h2>";
   echo "<center><br> <button onclick='goBack()'>Go Back?</button></center>";
}

}
else{
  echo "<br><br><br><center><h2>User does not exist!</h2></center>";
   echo "<center><br> <button onclick='goBack()'>Go Back?</button></center>";
}
$conn->close();
?>

</div>
<!-- search -->

<!-- Modal --> <!-- aria hidden is for screen-readers -->
<div class="modalDialog" id="signup-modal" aria-hidden="true">
	<div class="modalInner">
		<h3><div id="signInHeader">Sign In</div></h3>
		<form class="col s12" action="verifyUser.php" method="POST">
			<div class="row">
				<i class = "material-icons signin">email</i>
				       <input id="email" name="email" type="email" class="validate" placeholder="Email">

			</div>
			<div class="row">
				<i class = "material-icons signin" >vpn_key</i>
				<input id="pw" name="pw" type="password" class="validate" placeholder="Password">

			</div>
			<div class="row">
			<button class="btn waves-effect waves-light" type="submit" name="action" id='signupSubmit'><input type="submit">
			</button>

			</div>
			<a href="#close" id="close">x</a>
		</div>
	</div>
</div>

<!-- Bootstrap core JavaScript
  ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
  <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="node_modules/materialize-css/dist/js/materialize.min.js">
  </script>
  <script>
  $(document).ready(function() {
    $('select').material_select();
  });
  
  $('#checkbox').change(function(){
    if (this.checked){
      $("#hideOrNo").fadeIn("slow");
    }
    else if (!this.checked){
      $("#hideOrNo").fadeOut("slow");
    }
  });

  
  </script>
  <script>
  $(document).ready(function(){
    $(".dropdown-button").dropdown();

    $("ul #dropdown1 li").click(function(){
      var string = $(this).text();
      if (string =="Teal"){
        $(".nav-wrapper").css("background-color", "#00bfa5");
      }
      else if (string=="Salmon"){$(".nav-wrapper").css("background-color", "#EE6E73");}
      else if (string =="Black"){$(".nav-wrapper").css("background-color", "#212121");}
    });

  });
  </script>
  <script>
  function showHide(){
    if(document.getElementsByClassName('wrapper')[0].style.opacity == 1){
      document.getElementsByClassName('wrapper')[0].style.opacity = 0;
      document.getElementsByTagName("body")[0].style.background = '#fff';
    }
    else{
      document.getElementsByClassName('wrapper')[0].style.opacity = 1;
      document.getElementsByTagName("body")[0].style.background = 'rgba(0, 0, 0, 0.2)';
    }
  }

  function goBack(){
    window.history.back();
  }
  </script>

</body>
</html>

<?php
if(!isset($_SESSION)){
  session_start();
}
$a = md5(time());
$_SESSION['current'] = $a;
require 'facebook-php-sdk/src/facebook.php';

$facebook = new Facebook(array(
  'appId'  => 'YOUR_APP_ID',
  'secret' => 'YOUR_APP_SECRET',
));

// Get User ID
$user = $facebook->getUser();

if($user){
  ?>
    <html><head><title>Vote</title></head><body>
    #1: <input type="text" name="n1" id="n1" />
    #2: <input type="text" name="n2" id="n2" />
    <button onclick="submitFormm()">Submit!</button>
    </body>
    <script>
    function submitForm(){
      var n1 = document.getElementById('n1').value;
      var n2 = document.getElementById('n2').value;
      var send = "<?php echo $a; ?>"
      var user = "<?php echo $user; ?>"
      var Ajax =new XMLHttpRequest();
      Ajax.open("GET", "vote.php?n1="+n1+"&n2="+n2+"&t="+send+"&u="+user, false);
      Ajax.send();
      alert(Ajax.responseText);
    }
    </script>
    </html>
  <?php 
}

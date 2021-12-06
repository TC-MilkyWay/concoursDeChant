
<?php include('cookie.php'); ?>
<?php include('session.php'); ?>


    <form method="post" action="" >  
      <h1>Se connecter</h1>    
      <div class="inputs">
      <?php include_once('header.php'); ?>
        <input type="email" name="mail" placeholder="email">
        
        <input type="password" name="mdp" placeholder="pass">
        <center><button type="submit">Se connecter</button></center>
      </div>
    </form>
  
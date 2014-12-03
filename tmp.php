<html>
 <body>
 <?
 echo "!!!!!!!!!!!!!!!!";
   if ($_SERVER['REQUEST_METHOD'] == 'POST') {
     echo '<h1>Hello, <b>' . $_POST['name'] . '</b></h1>!';
   }
 ?>
 <form method="POST" action="<?=$_SERVER['PHP_SELF']?>">
   Inter your name: <input type="text" name="name">
   <br>
   <input type="submit" name="okbutton" value="OK">
 </form>
<hr>


<table align="center">
 <tr>
  <td>
   <a href="profile.php?mode=register"><b>Регистрация</b></a>
  </td>
  <td>
   <form method="post"
   action="http://login.rutracker.org/forum/login.php">
  </td>
  <td>Имя:</td>
  <td>
   <input type="text" name="login_username" size="12" tabindex="1"
    accesskey="l">
  </td>
  <td>Пароль:</td>
  <td>
   <input type="password" name="login_password" size="12" tabindex="2">
  </td>
  <td>
   <input type="submit" name="login" value="Вход" tabindex="3">
  </td>
   </form>
  <td>
   <a href="profile.php?mode=sendpassword">Забыли пароль?</a>
  </td>
 </tr>
</table>


 </body>
 </html>

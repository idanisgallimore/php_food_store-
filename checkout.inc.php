<h3>If you are a returning customer, enter your name and email</h3>
<form action="verifycust.php" method="post">
    <input type="text" name="email" placeholder="Enter Email">
    <input type="password" name="password1" placeholder="Enter Password">
    <input type="submit" name="button" value="Login" class="btn">
</form>

<form action="index.php" method="get">
    <input type="submit" name="button" value="Create new account" class="btn">
    <input type="hidden" name="content" value="newcust">
</form>
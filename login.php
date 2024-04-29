<?php
    include_once 'header.php'
?>
    <div class="form">
        <h1 style="text-align: center">SDGP - 109</h1>
        <form action="includes/login.inc.php" method="post">
            <label for="uname">User Name</label>
            <input type="text" id="uname" name="username" placeholder="User Name/Email">

            <label for="password">Password</label>
            <input type="password" id="Password" name="password" placeholder="Password">
            <button name="submit" type="submit">Login</button>
        </form>
        <p style="text-align:center">New account Here! <a href="signup.php">Register</a></p>
    </div>
<?php
    include_once 'footer.php'
?>    
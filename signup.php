<?php
    include_once 'header.php'
?>
    <div class="form">
        <h1 style="text-align: center">SDGP - 109</h1>
        <form action="includes/signup.inc.php" method="post">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" placeholder="Name">
            <label for="email">Email</label>
            <input type="text" id="email" name="email" placeholder="Email">
            <label for="uname">User Name</label>
            <input type="text" id="uname" name="username" placeholder="User Name">
            <label for="password">Password</label>
            <input type="Password" id="Password" name="password" placeholder="Password">
            <label for="password">Comfirm Password</label>
            <input type="Password" id="Password" name="password_confirm" placeholder="Comfirm Password">
            <button name="submit" type="submit">Sign Up</button>
        </form>
        <p style="text-align:center">Already have an account? <a href="login.php">Login</a></p>
    </div>
<?php
    include_once 'footer.php'
?>    
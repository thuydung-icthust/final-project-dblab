<!DOCTYPE html>
<html>

<head>
    <title>Admin</title>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <!-- <script>console_log('a string');</script> -->
    <?php echo $html->includeCss("vendor/grid"); ?>
    <?php echo $html->includeCss("common"); ?>

</head>

<body>

    <header>
        <nav>
            <div class="row">
                <div class="logo-div">
                    <img src="/img/fflogo.png" alt="Omnifood logo" class="logo inline-element">
                    <h3 class="logo inline-element title text-title">SE Restaurant</h3>
                </div>


                <ul class="main-nav js--main-nav">
                    <li><a href="/admin/requests">Requests</a></li>
                    <li><a href="/admin">Statistic</a></li>
                    <!-- <li><a href="#customer-sesion">Customers</a></li> -->
                    <!-- <li><a href="#best-sellers-session">Products</a></li> -->

                    <?php
if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn']) {
    if (isset($_SESSION['isEmployee']) && $_SESSION['isEmployee'] === true) {
        echo "<li class='text-primary'><a href='#features'><i class='fas fa-user-circle icon-small'></i>Hi, {$_SESSION['username']}</a></li>";
        echo "<li class='navbar-item'><a class='navbar-link_customer' href='/employees/logout'>Logout</a></li>";
    } else {
        echo "<li class='navbar-item'><a class='navbar-link_customer' href='/customer/logout'>Logout</a></li>";
    }

} else {
    echo "<li class='navbar-item'><a class='navbar-link_customer' href='/customer/login'>Login</a></li>";
}

?>
                </ul>
                <a class="mobile-nav-icon js--nav-icon"><i class="ion-navicon-round"></i></a>
            </div>
        </nav>
<div class="navbg">
    <div class="container mx-auto d-flex justify-content-between align-items-center w-100 border-bottom border-dark-subtle border-opacity-10">
        <div class="d-flex" style="font-size: 13px;">
            <p class="text-white">Hotline: <span class="text-danger">0123456789</span></p>
        </div>
        <!-- Join Us and Sign In Links -->
        <div class="d-flex gap-2" style="font-size: 13px;">
            <p class="text-light">Store Locations</p>
            <p class="text-light">Check Your Order</p>
            <div class="d-flex gap-2 mt-1">
                <i class="fa-brands fa-facebook" style="color: #ffffff;"></i>
                <i class="fa-brands fa-instagram" style="color: #ffffff;"></i>
                <i class="fa-brands fa-youtube" style="color: #ffffff;"></i>
            </div>
        </div>
    </div>
    <span class="border-bottom border-secondary-subtle"></span>

    <!-- navbar -->
    <nav class="container navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand text-white fs-2" href="index.php">EchoTech</a>
            <div class="input-group w-50 text-center">
                <input type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="button-addon2">
                <button class="btn btn-outline-danger" type="button" id="button-addon2">Search</button>
            </div>
            <div class="d-none d-sm-block">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="login.php">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#">Offer</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#">Cart</a>
                    </li>
                </ul>
            </div>

        </div>
    </nav>

    <!-- categories -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <button class="navbar-toggler bg-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse " id="navbarTogglerDemo01">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 "style="font-size: 15px;">
                    <li class="nav-item text-white">
                        <a class="nav-link active text-white" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item text-white">
                        <a class="nav-link text-white" href="#">Link</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

</div>


<!-- categories -->
<!-- <nav class="navbar navbar-expand-lg">
    <div class="container">
        <button class="navbar-toggler bg-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0" style="font-size: 15px;">
                <?php
                include 'includes/db_config.php'; 
                $sql = "SELECT * FROM categories";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<li class="nav-item text-white">';
                        echo '<a class="nav-link text-white" href="#">' . $row["name"] . '</a>';
                        echo '</li>';
                    }
                }
                $conn->close();
                ?>
            </ul>
        </div>
    </div>
</nav> -->

<?php require 'admin_header.php'; ?>
<div class="d-flex" id="wrapper">
    <!-- Sidebar -->
    <div class="border-end" id="sidebar">
        <div>
            <h4 class="sidebar-heading text-white p-2 text-center">Dashboard</h4>
            <hr>
        </div>
        <ul class="nav flex-column justify-content-center">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="admin_dashboard.php">
                    Home
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    Products
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="">
                    Category
                </a>
            </li>
        </ul>
    </div>

    <div id="content" class="ms-3">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <button class="btn btn-dark" id="sidebarToggle"><i class="fas fa-bars"></i></button>

            <form class="d-flex ms-auto" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <!-- Profile Dropdown -->
            </form>
            <div class="nav-item dropdown">
                <img src="https://via.placeholder.com/40" class="rounded-image nav-link dropdown-toggle" id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" alt="User Avatar">

                <ul class="dropdown-menu dropdown-menu-end " aria-labelledby="profileDropdown">
                    <li><a class="dropdown-item" href="#"></a></li>
                    <li><a class="dropdown-item" href="#">Profile</a></li>
                    <li><a class="dropdown-item" href="#">Settings</a></li>
                    <li><a class="dropdown-item" href="../logout.php">Logout</a></li>
                </ul>
            </div>
        </nav>

        <div class="container-fluid">
            <!-- Main content  here -->
           
        

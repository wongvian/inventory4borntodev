<?php

//session_start();
// include "../include/connect_db.php";
//require 'includes/connect_db_oracle.php';
// require 'include/connect_db.php';
require 'includes/authen.php';
require 'unauthen.php';
include "function.php";
include "config.php";


?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>ระบบจัดการฐานข้อมูล Server สำนักส่งเสริมฯ | <?php echo $pageName; ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="asst_backend/vendor/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="asst_backend/vendor/fontawesome/css/all.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="asst_backend/dist/css/adminlte.min.css">

    <link rel="stylesheet" href="asst_backend/dist/css/style.css">

    <!-- New Color NavColor -->


    <link href="asst_backend/dist/css/datepicker.css" rel="stylesheet" media="screen">
    <link rel="stylesheet" href="asst_backend/vendor/selectpicker/bootstrap-select.css">
    <link rel="stylesheet" type="text/css" href="asst_backend/vendor/datatables/jquery.dataTables.min.css">
    <link rel="stylesheet" href="asst_backend/vendor/toastr/toastr.css">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css">

    <link rel="icon" type="image/png" sizes="16x16" href="includes/img/favicon.ico">

    <link href='https://fonts.googleapis.com/css?family=Kanit:300&subset=thai,latin' rel='stylesheet' type='text/css'>

    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->

    <!-- <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script> -->


    <!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"> -->

<link rel="stylesheet" href="asst_backend/vendor/bootstrap/css/docs.css">

<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> -->


    <style>
        body,
        .sweet-alert {
            font-family: 'Kanit', sans-serif;
            color: #34495e;
        }
    </style>




</head>



<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item">
                    <h5 class="nav-link">
                        ระบบจัดการฐานข้อมูล Server
                </li>

            </ul>



        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <div class="text-center">
            <a href="./" class="brand-link">
            <img src="logo.png" alt="Server Stock" class="brand-image img-circle elevation-3"
            style="opacity: .8">
            <span class="brand-text font-weight-light">Server Stock</span>
            </a>
            </div>
            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->

                <div class="user-panel mt-3 pb-3 d-flex">
                    <div class="image" style="margin: auto 0 auto 0;">

                        <img src="img/wongvian.jpg" class="rounded elevation-2" alt="User Image">
                    </div>
                    <div class="info" style="padding-top: 0px;padding-bottom: 0px;">
                        <div class="d-block" style="color: white;">
                            <div><small><?php echo @$full_name;?></small></div>
                                       
                        </div>
                    </div>
                </div>

                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                        <li class="nav-item">
                            <a href="./Server_Add.php" class="nav-link <?php if ($pageActive == 'Server_Add') echo 'active'; ?>">
                                <i class="nav-icon fa-solid fa-server"></i>
                                <p>เพิ่มข้อมูล Server</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="./Server_list.php" class="nav-link <?php if ($pageActive == 'Server_list') echo 'active'; ?>">
                                <i class="nav-icon fa-solid fa-list"></i>
                                <p>รายการข้อมูล Server</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="./Account_manage.php" class="nav-link <?php if ($pageActive == 'Account_manage') echo 'active'; ?>">
                                <i class="nav-icon fa-solid fa-list"></i>
                                <p>รายการบัญชีผู้ใช้งาน</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="./Permission_list.php" class="nav-link <?php if ($pageActive == 'Permission_list') echo 'active'; ?>">
                                <i class="nav-icon fa-solid fa-list"></i>
                                <p>จัดการข้อมูลสิทธิ์การใช้งาน</p>
                            </a>
                        </li>


                        <li class="nav-item" title="ออกจากระบบ">
                            <a href="logout.php" class="nav-link" data-toggle="modal" data-target="#logout">
                                <i class="nav-icon fas fa-power-off"></i>
                                <p>Logout</p>
                            </a>
                        </li>






                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>
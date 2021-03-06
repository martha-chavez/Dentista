<?php
session_start();
if ($_SESSION["usuario"]  === null) {
  header("Location: ../../index.html");
}
?>
<?php require_once "vistas/parte_superior.php" ?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title> Dentista</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="../../public/css/sb-admin-2.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../../public/css/Dentista.css">
  <!--datables CSS básico-->
  <link rel="stylesheet" type="text/css" href="vendor/datatables/datatables.min.css" />
  <!--datables estilo bootstrap 4 CSS-->
  <link rel="stylesheet" type="text/css" href="vendor/datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">

</head>

<body >

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->

      <div class=" d-none d-md-inline mt-5">

        <a class="sidebar-brand " href="index.php">
          <div class="sidebar-brand-text ">Dentista <sup></sup></div>
        </a>
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

      <!-- Line a de divicion -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="index.php">
          <i class="fas fa-clinic-medical"></i>
          <span>INICIO</span></a>
      </li>

      <!-- Line a de divicion -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Agregar
      </div>
      <!-- CLIENTES -->
      <li class="nav-item fs-5">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#desplegarClientes" aria-expanded="true" aria-controls="collapseTwo" href="">
          <!-- <i class="fas fa-fw fa-cog "></i> -->
          <i class="fas fa-tooth"></i>
          <span>PACIENTES</span>
        </a>
        <div id="desplegarClientes" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <!-- <h6 class="collapse-header">Custom Components:</h6> -->
            <a class="collapse-item" href="">Agregar</a>
            <a class="collapse-item" href="historial.php">Historial</a>
          </div>
        </div>
      </li>
      <!-- CITAS -->
      <li class="nav-item fs-5">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#desplegarNotificacion" aria-expanded="true" aria-controls="desplegarNotificacion" href="">
          <i class="far fa-calendar-check"></i>
          <span>CITAS</span>
        </a>
        <div id="desplegarNotificacion" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <!-- <h6 class="collapse-header">Custom Components:</h6> -->
            <a class="collapse-item" href="notificaciones.php">Agendar Cita</a>
            <a class="collapse-item" href="listarNotificaciones.php">Ver Citas</a>
          </div>
        </div>
      </li>
      <!-- ADMINISTRADORES -->
      <li class="nav-item fs-5">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo" href="">
          <!-- <i class="fas fa-fw fa-cog "></i> -->
          <i class="fas fa-users"></i>
          <span>ADMINISTRADORES</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <!-- <h6 class="collapse-header">Custom Components:</h6> -->
            <a class="collapse-item" href="administrador.php">Agregar</a>
            <a class="collapse-item" href="listarAdministradores.php">Listar</a>
          </div>
        </div>
      </li>







      <!-- Line a de divicion -->
      <hr class="sidebar-divider d-none d-md-block">

    </ul>
    <!-- End of Sidebar -->

    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">
            <!-- Nav Item - Alerts -->
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
                <span class="badge badge-danger badge-counter" id="cantidad"></span>
              </a>
              <div  class="  dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in scrc "aria-labelledby="alertsDropdown"   >
                <h6 class=" d-flex flex-column dropdown-header">
                  Centro de Notificaciones
                </h6>
                <div class="overflow-auto" style="max-width: 320px; max-height: 320px;"  id="not">

                </div>
                <a class="dropdown-item text-center small text-gray-500" href=""></a>
              </div>
            </li>



            <div class="topbar-divider d-none d-sm-block"></div>
            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small text-uppercase"><?php echo $_SESSION["usuario"]; ?></span>
                <img class="img-profile rounded-circle" src="../../public/img/DienteUser.png">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  <?php echo $_SESSION["usuario"]; ?>
                </a>
                <!-- <a class="dropdown-item" href="#">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Settings
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                  Activity Log
                </a> -->
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Cerrar Sesión
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->
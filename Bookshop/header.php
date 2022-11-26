


<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title><?php echo $title; ?></title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>

   <!-- ======= Header ======= -->
   <header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center justify-content-lg-between">

      <h1 class="logo me-auto me-lg-0"> <div class="icon"><i class="bx bx-book" style="color: white; margin-left:4px;"><a href="index.php">Livraria Digital<span>.</span></a></i></div></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto me-lg-0"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto <?php if($title == "Página Inicial"){ echo "active";} ?>" href="./">Inicial</a></li>
          <li><a class="nav-link scrollto <?php if($title == "Equipe"){ echo "active";} ?>" href="./equipe">Equipe</a></li>
          <li class="dropdown "><a href="#"><span>Livros</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="./bnd">Banda desenhada</a></li>
              <li><a href="./cientificos">Científicos</a></li>
              <li><a href="./historias">Histórias</a></li>
              
            </ul>
          </li>
          <li><a class="nav-link scrollto <?php if($title == "Contatos"){ echo "active";} ?>" href="./contactos">Contacte-nos </a></li>
          <li><a class="nav-link scrollto <?php if($title == "Sobre"){ echo "active";} ?>" href="./sobre">Sobre</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
    </div>
  </header><!-- End Header -->


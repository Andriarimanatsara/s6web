<?php
  include('Connexion.php');

  try{
        $mysqlClient = new PDO('mysql:host=localhost;dbname=webs6;charset=utf8', 'root','root');
    }
    catch(Exception $e){
            die('Erreur : '.$e->getMessage());
    }

    $listeCat=listeCategorie($mysqlClient);
    
    $listeSol=listeSolution($mysqlClient);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>Dashio - Bootstrap Admin Template</title>

  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="assets2/bootstrap/css/bootstrap.min.css">
  <!--external css-->
  <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="css/zabuto_calendar.css">
  <link rel="stylesheet" type="text/css" href="lib/gritter/css/jquery.gritter.css" />
  <!-- Custom styles for this template -->
  <link rel="stylesheet" type="text/css" href="style.css">
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet">

  <!-- =======================================================
    Template Name: Dashio
    Template URL: https://templatemag.com/dashio-bootstrap-admin-template/
    Author: TemplateMag.com
    License: https://templatemag.com/license/
  ======================================================= -->
</head>

<body>
  <section id="container">
    <!-- **********************************************************************************************************************************************************
        TOP BAR CONTENT & NOTIFICATIONS
        *********************************************************************************************************************************************************** -->
    <!--header start-->
    <header class="header black-bg">
      <div class="sidebar-toggle-box">
        <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
      </div>
      <!--logo start-->
      <a href="index.html" class="logo"><b>DASH<span>IO</span></b></a>
      <!--logo end-->
      <div class="nav notify-row" id="top_menu">
        <!--  notification start -->
        <ul class="nav top-menu">
          <!-- settings start -->
          <li class="dropdown">
            
          </li>
          <!-- settings end -->
          <!-- inbox dropdown start-->
          <li id="header_inbox_bar" class="dropdown">
            
          </li>
          <!-- inbox dropdown end -->
          <!-- notification dropdown start-->
          <li id="header_notification_bar" class="dropdown">
            
          </li>
          <!-- notification dropdown end -->
        </ul>
        <!--  notification end -->
      </div>
      <div class="top-menu" style="margin-top:2%">
        <ul class="nav pull-right top-menu">
          <li><a class="logout" href="login.html">Logout</a></li>
        </ul>
      </div>
    </header>
    <!--header end-->
    <!-- **********************************************************************************************************************************************************
        MAIN SIDEBAR MENU
        *********************************************************************************************************************************************************** -->
    <!--sidebar start-->
    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
          <li class="mt">
            <a class="active" data-toggle="modal" data-target="#test" href="#">
              <i class="fa fa-dashboard"></i>
              <span>Categorie</span>
              </a>
          </li>
          <li>
            <a data-toggle="modal" data-target="#test2" href="#">
              <i class="fa fa-envelope"></i>
              <span>Solution </span>
              <span class="label label-theme pull-right mail-info"></span>
              </a>
          </li>
        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>
    <!--sidebar end-->
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
          <div class="col-md-12">
            <div class="nav5">
                <div class="card border-light mb-3" style="margin-left:-100%;width:120%;height:50%;">
                    <div class="card-header" style="text-align:center;">Ajouter un contenu</div>
                        <div class="card-body">
                            <form class="form-container" action="traitInsert.php" method="get">
                                <p>Motif :<input type="text" name="motif" placeholder="motif"/></p>
                                <p>Categorie :<select name="categorie">
                                        <?php foreach($listeCat as $liste){ ?>
                                            <option value="<?php echo $liste['id']; ?>"><?php echo $liste['nomC']; ?></option>
                                        <?php } ?>
                                    </select>
                                </p>
                                <p>Detail :<input type="text" name="detail" style="width:200px;min-height:100px" placeholder="Detail"></p>
                                <p>Lieu :<input type="text" name="Lieu" placeholder="Lieu"/></p>
                                <p>Solution :<select name="solution">
                                        <?php foreach($listeSol as $listeS){ ?>
                                            <option value="<?php echo $listeS['id']; ?>"><?php echo $listeS['nomS']; ?></option>
                                        <?php } ?>
                                    </select>
                                </p>
                                <button type="submit" class="btn btn-primary btn-lg btn-block">Causes</button>
                            </form>
                        </div>
                </div>
            </div>
          </div>
          <!-- /col-lg-3 -->
      </section>
    </section>
    <!--main content end-->
    <div class="modal fade" id="test" tabindex="-1" role="dialog" >
      <section id="main-content">
      <section class="wrapper">
          <div class="col-md-12">
            <div class="nav5">
                <div class="card border-light mb-3" style="margin-left:-100%;width: 120%;height:50%;">
                    <div class="card-header" style="text-align:center;">Ajouter un contenu</div>
                        <div class="card-body">
                            <form class="form-container" action="traitCat.php" method="get">
                                <p>Nom :<input type="text" name="categorie"/></p>
                                
                                <button type="submit" class="btn btn-primary btn-lg btn-block">Inserer</button>
                            </form>
                        </div>
                </div>
            </div>
          </div>
          <!-- /col-lg-3 -->
      </section>
    </section>
    </div>
    <div class="modal fade" id="test2" tabindex="-1" role="dialog" >
      <section id="main-content">
      <section class="wrapper">
          <div class="col-md-12">
            <div class="nav5">
                <div class="card border-light mb-3" style="margin-left:-100%;width: 120%;height:50%;">
                    <div class="card-header" style="text-align:center;">Ajouter un contenu</div>
                        <div class="card-body">
                            <form class="form-container" action="ttraitSol.php" method="get">
                                <p>Nom :<input type="text" name="solution" /></p>
                                
                                <p>Detail :<input type="text" name="detail" style="width:200px;min-height:100px" placeholder="Detail"></p>
                                
                                <button type="submit" class="btn btn-primary btn-lg btn-block">Inserer</button>
                            </form>
                        </div>
                </div>
            </div>
          </div>
          <!-- /col-lg-3 -->
      </section>
    </section>
    </div>
  </section>
  <!--footer start-->
    <footer class="site-footer" style="margin-top:5%">
      <div class="text-center">
        <p>
          &copy; Copyrights <strong>Andriarimanatsara M.Nambinina A.</strong>. All Rights Reserved
        </p>
        <div class="credits">
          <!--
            You are NOT allowed to delete the credit link to TemplateMag with free version.
            You can delete the credit link only if you bought the pro version.
            Buy the pro version with working PHP/AJAX contact form: https://templatemag.com/dashio-bootstrap-admin-template/
            Licensing information: https://templatemag.com/license/
          -->
          Copyrights 2022 <a href="#">TemplateMag</a>
        </div>
        <a href="index.html#" class="go-top">
          <i class="fa fa-angle-up"></i>
          </a>
      </div>
    </footer>
    <!--footer end-->
  <!-- js placed at the end of the document so the pages load faster -->
  <script src="lib/jquery/jquery.min.js"></script>

  <script src="assets2/bootstrap/js/bootstrap.min.js"></script>
  <script class="include" type="text/javascript" src="lib/jquery.dcjqaccordion.2.7.js"></script>
  <script src="lib/jquery.scrollTo.min.js"></script>
  <script src="lib/jquery.nicescroll.js" type="text/javascript"></script>
  <script src="lib/jquery.sparkline.js"></script>
  <!--common script for all pages-->
  <script src="lib/common-scripts.js"></script>
  <script type="text/javascript" src="lib/gritter/js/jquery.gritter.js"></script>
  <script type="text/javascript" src="lib/gritter-conf.js"></script>
  <!--script for this page-->
</body>

</html>

  <nav class="main-header  navbar navbar-expand navbar-navy navbar-dark">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>

      <li class="nav-item">
        <a class="nav-link <?php if ($menu == "index") {
                              echo "active";
                            } ?>" href="index.php"><i class="fas fa-home"></i> Home</a>
      </li>

    </ul>


    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item ">
        <a href="" class="nav-link ">
          <?php if (isset($_SESSION['user_firstname'])) : ?>
            <p style="color:white">ยินดีต้อนรับคุณ : <?php echo $_SESSION['user_firstname']; ?> <?php echo $_SESSION['user_lastname']; ?></p>
          <?php endif ?>
          
        </a>

      </li>
    </ul>
  </nav>
  <!-- /.navbar -->
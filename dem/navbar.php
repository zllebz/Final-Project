  <nav class="main-header  navbar navbar-expand navbar-dark"  style="background-color:#f4f6f9"  >
    <ul class="navbar-nav" >
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" style="color:purple"><i class="fas fa-bars"></i></a>
      </li>


    </ul>


    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item ">
        <a href="" class="nav-link ">
          <?php if (isset($_SESSION['user_firstname'])) : ?>
            <p style="color:purple">ยินดีต้อนรับคุณ : <?php echo $_SESSION['user_firstname']; ?> <?php echo $_SESSION['user_lastname']; ?></p>
          <?php endif ?>
          
        </a>

      </li>
    </ul>
  </nav>
  <!-- /.navbar -->
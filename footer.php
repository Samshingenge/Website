<!-- Side Area start -->
  <div class="col-sm-4">
<div class="card mt-4">
  <div class="card-body" style="background-image: url(images/about/parallax-about-2.jpg);">
    <img src="images/isotop/iso2.jpg" class="d-block img-fluid" alt="">
    <hr style="border:1px solid grey">
    <div class="text-center text-white">
     Advance your brand and Business in the age of the Customer taste and the style.Combine experience in digital, marketing advertising landscape.

    </div>
  </div>
</div>
<br>
<div class="card">
<div class="card-header bg-dark text-light">
<h2 class="lead">Sign Up !</h2>
</div>
<div class="card-body">
  <!-- Sign up to newsLetters -->
<div class="input-group mb-3">
  <form action="Thanks.php" method="post">
  <input type="email" class="form-control mb-1" name="BEmail" placeholder="Enter your email" value="" size="50">
  <div class="input-group-append">
    <button type="submit" class="btn btn-primary btn-sm text-center text-center text-white" name="Submit">Subscribe Now</button>
    </form>
  </div>
 </div>
 <!-- Sign up to newsLetters -->
</div>
</div>
<br>
<div class="card">
  <div class="card-header bg-primary text-light">
    <h2 class="lead">Categories</h2>
    </div>
    <div class="card-body">
      <?php
      global $ConnectingDB;
      $sql = "SELECT * FROM category ORDER BY id desc";
      $stmt = $ConnectingDB->query($sql);
      while ($DataRows=$stmt->fetch()) {
        $CategoryId = $DataRows["id"];
        $CategoryName = $DataRows["title"];
        ?>
        <a href="Blog.php?category=<?php echo $CategoryName; ?>"><span class="heading"><?php echo $CategoryName;  ?></span></a><br>

    <?php  } ?>


  </div>

</div>
<br>
<div class="card">
  <div class="card-header bg-info text-white">
    <h2 class="lead"> Recent Posts</h2>
  </div>
  <div class="card-body">
    <?php
    global $ConnectingDB;
    $sql = "SELECT * FROM posts ORDER BY id desc LIMIT 0,5";
    $stmt = $ConnectingDB->query($sql);
    while ($DataRows=$stmt->fetch()) {
      $Id =$DataRows["id"];
      $Title =$DataRows["title"];
      $DateTime =$DataRows["datetime"];
      $Image =$DataRows["image"];



    ?>
    <div class="media">
      <img src="uploads/<?php echo htmlentities($Image); ?>"  class="d-block img-fluid align-self-start" width="90" height="94" alt="">
      <div class="media-body ml-2">
        <a href="FullPost.php?id=<?php echo htmlentities($Id) ; ?>" target="_blank"> <h6 class=" lead"><?php echo htmlentities($Title); ?></h6> </a>
        <p class="small"><?php echo htmlentities($DateTime); ?></p>
      </div>
    </div>
    <hr>
    <?php  } ?>
  </div>
</div>
  </div>
  <!-- side area ENDS -->
  </div>
</div>
<!--Heading ENDS-->

<!--FOOTER BEGINS-->
<footer class="bg-dark text-white">
<div class="container">
  <div class="row">
    <div class="col">
      <p class="lead text-center">BLIND COMMUNICATION <span id="year"></span>&copy; --All right Reserved</p>
    </div>
  </div>
</div>
</footer>
<div style="height:10px; background:grey"></div>
<!--FOOTER ENDS-->


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
<script>
  $('#year').text(new Date().getFullYear());
</script>
</body >
</html>

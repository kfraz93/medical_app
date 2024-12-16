
  <!-- Navbar -->
<?php
include "../includes/header.php";
?>

  <!-- Slider (Carousel) -->
  <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="../images/image_1.jpg" class="d-block w-100" alt="Slide 1">
      </div>
      <div class="carousel-item">
        <img src="../images/image_2.jpg" class="d-block w-100" alt="Slide 2">
      </div>
      <div class="carousel-item">
        <img src="../images/image_1.jpg" class="d-block w-100" alt="Slide 3">
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>

  <!-- Image Grid -->
  <div class="container my-5">
    <div class="row">
      <div class="col-md-6">
        <div class="card">
          <img src="../images/div_pic_1.jpg" class="card-img-top" alt="Image 1">
          <div class="card-body">
            <h5 class="card-title">I can put tile here</h5>
            <p class="card-text">Description for the first image.</p>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card">
          <img src="../images/div_pic_2.jpg" class="card-img-top" alt="Image 2">
          <div class="card-body">
            <h5 class="card-title">I can put 2nd title here</h5>
            <p class="card-text">I can put 2nd description here </p>
          </div>
        </div>
      </div>
    </div>
  </div>

<?php
include "../includes/footer.php"
?>
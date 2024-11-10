<?php




$conn = mysqli_connect('localhost', 'root', '', 'contact_db') or die('connection failed');


if (isset($_POST['submit'])) {

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $number = mysqli_real_escape_string($conn, $_POST['number']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $date = mysqli_real_escape_string($conn, $_POST['date']);

    $insert = "INSERT INTO `contact_form` (name, number, email, date) VALUES ('$name', '$number', '$email', '$date')";
    
    if (!mysqli_query($conn, $insert)) {
      error_log("MySQL Error: " . mysqli_error($conn));
  }

    
    if ($insert){
      $message[] = 'wait for confirmation by call or email!';
    }else {
      $message[] = 'Erreur: ' . mysqli_error($conn);
    }
}


// en cas d'erreur de l'insertion des information dans la base de donnee:
  ini_set('log_errors', 1);
  ini_set('error_log', '/path/to/error.log');
  
 
  

?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>dental clinic</title>
  <!--link font-awesome-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <!--link-cdn-bootstrap-->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="map.css">


  <!-- start navbar section-->
  <nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top shadow ">
    <div class="container-fluid">
      
      <div class="logo">You <i class="fa-solid fa-tooth"></i><span> Smile</span></div>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <ul class="navbar-nav mx-auto ">

          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#home">Home</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="#about">About</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="#services">Services</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="#doctor">Doctor</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="#contact">Contact</a>
          </li>
        </ul>

        <a href="#contact" class="btn btn-outline-success" type="submit">prendre rendez-vous</a>
        </form>
      </div>
    </div>
  </nav>
  <!-- end navbar section-->



<!--start home section-->
<section class="home" id="home">
  <div class="container slide-in-left ">
    <div class="row min-vh-100 align-items-center">
      <div class="content">
        <h3 class="slide-in-left">let's make you smile <br> with our professional dentist</h3>
        <p>Welcome to our clinic, where your smile is our top priority. Our skilled dentists are dedicated to providing <br> exceptional care. We offer a variety of services to meet all your dental needs, ensuring a comfortable <br> and pleasant experience.</p>
        <a href="#contact" class="btn btn-outline-success" type="submit">prendre rendez-vous</a>
      </div>
    </div>
  </div>
</section>
<!--end home section-->





 <!--start about section-->
<section class="about" id="about">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-4">
                <img src="images/about_pic.jpg" alt="aboutpic" class="img-fluid mb-4 mb-md-0">
            </div>
            <div class="col-md-8">
                <span class="text-uppercase font-weight-bold">About us:</span>
                <h3 class="mt-2">Welcome to YouSmile Dental Clinic!</h3>
                <p>
                    At YouSmile Dental Clinic, we are dedicated to providing top-quality dental care and creating beautiful smiles. Our team of experienced dentists prioritizes your oral health and overall well-being. Combining expertise with a compassionate approach, we strive to ensure a positive and comfortable experience for all our patients.
                </p>
                <p>
                    We offer a comprehensive range of dental services, from preventive care and cosmetic dentistry to restorative treatments. Whether you're coming in for a routine check-up or a complete smile makeover, our skilled professionals are here to address all your dental needs with precision and care.
                </p>
                <a href="#contact" class="btn btn-outline-success" type="submit">Prendre rendez-vous</a>
            </div>
        </div>
    </div>
</section>
<!--end about section-->



<!--start services section-->
<section class="services" id="services">
  <div class="container2">
    <div class="title">
      <h1>OUR SERVICES</h1>
      <p>Discover our range of top-notch dental services designed to meet your needs.</p>
    </div>
    <div class="services-grid">
      <div class="b">
        <img class="service_image_details" src="https://d3t5ai5vcxyqte.cloudfront.net/media/xerhpggjxuxmfpsu.svg" alt="dental images">
        <h4>Root Canal Treatment</h4>
        <p>Let's save the tooth.</p>
      </div>
      <div class="b">
        <img class="service_image_details " src="https://d3t5ai5vcxyqte.cloudfront.net/media/xckdqmsbqpdhzlhvwood.svg" alt="dental images">
        <h4>Teeth Whitening</h4>
        <p>Are you eyeing whiter teeth?</p>
      </div>
      <div class="b">
        <img class="service_image_details" src="https://d3t5ai5vcxyqte.cloudfront.net/media/jtklaazjieqhljbboiyao.svg" alt="dental images">
        <h4>Dental Implants</h4>
        <p>Make your implants last a lifetime.</p>
      </div>
      <div class="b">
        <img class="service_image_details" src="https://d3t5ai5vcxyqte.cloudfront.net/media/znrdvnh.svg" alt="dental images">
        <h4>Dentures</h4>
        <p>Know the right type of denture for you.</p>
      </div>
      <div class="b">
        <img class="service_image_details" src="https://d3t5ai5vcxyqte.cloudfront.net/media/pegjpxeakmijzlnklbubfsfun.svg" alt="dental images">
        <h4>Dental Fillings</h4>
        <p>Repairing the decay with fillings that blend in.</p>
      </div>
      <div class="b">
        <img class="service_image_details" src="https://d3t5ai5vcxyqte.cloudfront.net/media/ztyabpe.svg" alt="dental images">
        <h4>Orthodontic Treatment/Braces</h4>
        <p>Never be too shy to smile.</p>
      </div>
    </div>
  </div>
</section>
<!--end services section-->



  
    <!--start doctor section-->
<section class="doctor" id="doctor">
    <div class="container">
        <div class="doctor-card">
            <img src="images/img.png" alt="profile_image" class="doctor-image">
            <h3>Dr. Hadjar</h3>
            <h4>Dental Surgeon </h4>
            <p>Our clinic's Chief Medical Officer, Dr. Hadjar, hails from Algeria and brings a wealth of experience in dental surgery. A graduate of the University of Algiers, she has been committed to excellence in dental care since 2002. Dr. Hadjar combines expertise and compassion to provide top-quality dental services to all our patients.</p>
        </div>
    </div>
</section>
<!--end doctor section-->




  
<!--start map-->
<section class="map">
    <div class="contact-section">
        <div class="opening-hours-block">
            <h2>Opening hours</h2>
            <ul>
                <li><span>dimanche</span> <span>08:00–20:00</span></li>
                <li><span>lundi</span> <span>08:00–20:00</span></li>
                <li><span>mardi</span> <span>08:00–20:00</span></li>
                <li><span>mercredi</span> <span>08:00–20:00</span></li>
                <li><span>jeudi</span> <span>08:00–20:00</span></li>
                <li><span>vendredi</span> <span>09:00–20:00</span></li>
                <li><span>samedi</span> <span>08:00–20:00</span></li>
            </ul>
        </div>
        <div class="map-block">
            <h2>our localisation</h2>
              <div class="map-responsive">
                  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d102364.5348993474!2d3.901183297265615!3d36.701139900000015!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x128dc9a9c1664c29%3A0xfbd8baaa18b76db7!2sCabinet%20dentaire%20Dr%20Kahina%20Hadjar!5e0!3m2!1sfr!2sdz!4v1716769731873!5m2!1sfr!2sdz" width="1000" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
              </div>
        </div>
    </div>
</section>
<!--end map-->





<!-- start contact section -->
<section class="contact" id="contact">
    <div class="titre">
        <h1>Prendre un Rendez-Vous</h1>
    </div>
    <div class="container3">
        <form id="appointmentForm" action="" method="post">
            <div class="information">
              <?php
                if(isset($message)){
                  foreach($message as $message){
                    echo '<p class="message">'.$message.'</p>';
                  }
                } 
              ?>
                <div class="info">
                    <label for="name">Nom:</label>
                    <input type="text" name="name" placeholder="Entrer votre nom ici" required>
                    <label for="number">Numéro:</label>
                    <input type="text" name="number" placeholder="Entrer votre numéro ici" required>
                    <label for="email">Email:</label>
                    <input type="email" name="email" placeholder="Entrer votre email ici" required>
                    <label for="date">Date:</label>
                    <input type="date" name="date" id="appointmentDate" required>
                </div>
                <br>
                <button class="btn btn-outline-success" type="submit" name="submit" value="submit">Prendre rendez-vous</button>
            </div>
        </form>
    </div>
</section>
<!-- end contact section -->

  

  <!--start footer section-->
  <section class="contact_info">
    <div class="container4">
      <div class="inf">
        <i class="fa-solid fa-phone"></i><br>
        <h3>Our Phone Number</h3>
        <p>0779917664</p>
      </div>

      <div class="inf">
        <i class="fa-solid fa-envelope"></i><br>
        <h3>Our Email</h3>
        <p>DrHadjar2024@gmail.com</p>
      </div>

      <style>
        .inf a {
            color: black;
        }
          </style>

          <div class="inf">
              <i class="fa-solid fa-location-dot"></i><br>
              <h3>Our Address</h3>
              <a href="https://maps.app.goo.gl/io8ipQfHX6zxALrA7">https://maps.app.goo.gl/io8ipQfHX6zxALrA7</a>
          </div>
          

    </div>

  </section>
  <!--end footer section-->


  <script src="index.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
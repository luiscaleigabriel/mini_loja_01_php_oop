<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>Mini Shop</title>
  <!-- Favicon-->
  <link rel="icon" type="image/x-icon" href="assets/images/favicon.ico" />
  <!-- Bootstrap icons-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
  <!-- Core theme CSS (includes Bootstrap)-->
  <link href="assets/css/styles.css" rel="stylesheet" />
</head>

<body>
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <?php $this->insert('partials/nav') ?>
  </nav>

   <!-- Header-->
    <header class="bg-dark py-5">
        <?php $this->insert('partials/header') ?>
    </header>

  <!-- Section-->
  <section class="py-5">
    <?= $this->section('content') ?>
  </section>
 
  <!-- Footer-->
  <footer class="py-5 bg-dark">
    <?php $this->insert('partials/footer') ?>
  </footer>
  <!-- Bootstrap core JS-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Core theme JS-->
  <script src="assets/js/scripts.js"></script>
</body>

</html>
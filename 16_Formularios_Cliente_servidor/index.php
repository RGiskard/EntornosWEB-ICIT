<!DOCTYPE html>
<html lang="en">

<head>
    <title>Desde un hosting</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <!--Carrousel-->
    <div id="id_carrousel" class="carousel slide" data-bs-ride="carousel">

        <!-- Indicators/punto -->
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#id_carrousel" data-bs-slide-to="0" class="active"></button>
            <button type="button" data-bs-target="#id_carrousel" data-bs-slide-to="1"></button>
            <button type="button" data-bs-target="#id_carrousel" data-bs-slide-to="2"></button>
        </div>

        <!-- The slideshow/carousel -->
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="./images/perrito.jpg" alt="Los Angeles" class="d-block w-75">
            </div>
            <div class="carousel-item">
                <img src="./images/run_run.jpg" alt="Chicago" class="d-block w-75">
            </div>
            <div class="carousel-item">
                <img src="./images/baby_yoda.jpg" alt="New York" class="d-block w-75">
            </div>
        </div>

        <!-- Left and right controls/icons -->
        <button class="carousel-control-prev" type="button" data-bs-target="#id_carrousel" data-bs-slide="prev">
          <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#id_carrousel" data-bs-slide="next">
          <span class="carousel-control-next-icon"></span>
        </button>
    </div>
    <div>

    <form action="accion.php">
      <div class="mb-3 mt-3">
        <label for="email" class="form-label">Nombre:</label>
        <input type="text" class="form-control" id="email" placeholder="Enter email" name="nombre">
      </div>
      <div class="mb-3">
        <label for="pwd" class="form-label">Edad:</label>
        <input type="number" class="form-control" id="pwd" placeholder="Enter password" name="edad">
      </div>
      <div class="form-check mb-3">
        <label class="form-check-label">
          <input class="form-check-input" type="checkbox" name="remember"> Remember me
        </label>
      </div>
      <button type="submit" class="btn btn-primary">Enviar</button>
    </form> 
    </div>

</body>
<script>
</script>



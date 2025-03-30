<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sisges</title>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <link rel="stylesheet" type="text/css" href="Views/assets/css/navbar.css">
    <link rel="stylesheet" type="text/css" href="Views/assets/css/style.css">

  </head>
  <body>
    
    <section>
        <?php include "modules/navbar.php"; ?>
    </section>

    <main id="main-content">
      <div>
        <?php 

            $route = new RouteController();
            $route->routes();

        ?>
        </div>
    </main>

    <script>
        const sidebar = document.getElementById('sidebar');
        const toggleBtn = document.getElementById('toggleBtn');
        const mainContent = document.getElementById('main-content');

        toggleBtn.addEventListener('click', () => {
            sidebar.classList.toggle('expanded');

            // Ajustar el margen izquierdo del contenido
            if (sidebar.classList.contains('expanded')) {
                mainContent.style.marginLeft = "250px"; // Expande el contenido
            } else {
                mainContent.style.marginLeft = "60px"; // Contrae el contenido
            }
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
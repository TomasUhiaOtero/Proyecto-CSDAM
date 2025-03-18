<!doctype html>
<html lang="es">
    <head>
        <title>Proyecto</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"/>
        <link rel="stylesheet" href="css/estilos.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"> 
        <script>
          function buscar() {
            let texto_buscar = document.getElementById('txt_busqueda').value;

           
            if (texto_buscar.length >= 1 ) {
              obtenCanciones(texto_buscar);
            }
          }

          async function obtenCanciones(texto_buscar) {
                const response = await fetch("php/buscar.php?"+ new URLSearchParams({
                  txt_buscar: texto_buscar}));
                const respuesta = await response.json();
                console.log(respuesta);
                if (respuesta.status == "success") {
                    
                    document.getElementById("lista_canciones").innerHTML =  `
                        <table>
                          <thead>
                                <tr>
                                    <td>CANCIÓN</td>
                                    <td><b><u>ARTISTA</u></b></td>
                                    <td><b><u>ÁLBUM</u></b></td>
                                    <td><b><u>FECHA DE LANZAMIENTO</u></b></td>
                                    <td><b><u>PUNTUACIÓN</u></b></td>
                                    <td><b><u>ENLACE</u></b></td>
                                </tr>
                          </thead>
                            <tbody id="tbody_lista_canciones"></tbody></table>
                    `;
                    for (let cancion of respuesta.data) {
                        let plantilla=`
                          <tr>
                            <td>${cancion.nombre}</td>
                            <td>${cancion.artista_nombre}</td>
                            <td>${cancion.album_nombre}</td>
                            <td>${cancion.fecha}</td>
                            <td>${cancion.puntuacion}</td>
                            <td>
                                 <a href="${cancion.enlace}" target="_blank">
                                  <img class="link_yt" src="images/youtube.png" alt="YouTube" height="20px" width="20px" />
                                 </a>
                            </td>
                        </tr>
                        `; 
                       
                        document.getElementById("tbody_lista_canciones").innerHTML +=  plantilla;
           
                    }
                }
                else {
                  alert('La petición ha fallado')
                }
                
        }
        </script>
    </head>

    <body>
        <header>

    <nav class="navbar nav-underline navbar-expand-lg  bg-opacity-100 bg-black fixed-top">
      <div class="container-fluid">
        <a class="navbar-brand" href="index.php"><img src="images/logo.png" class="rotate" width="120px" height="80px"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" style="font-size: x-large;" id="navbarNavDropdown">
          <ul class="navbar-nav ms-5 justify-content-between w-25">
              <li class="nav-item">
              <a class="nav-link" href="#texto_topsemanal">Semanal</a>
            </li>
            
            <li class="nav-item">
              <a class="nav-link" href="#cards_informacion">Descubre</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#busqueda">Busqueda</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contacto.php">Contacto</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

        </header>

        <main>
        <section>
        <div class="texto1">
          <h1>Descubre Más Música:</h1>
        </div>
          <div class="roller">
            <span id="rolltext">
              ROCK<br />
              POP<br />
              RAP<br />
              REAGGUETON<br />
              SOUL<br />
              FUNK<br />
              Y MUCHO MÁS<br />
            </span>
          
        </div>
      </section>

          <!--Géneros Cards-->
          <section class="container">
            <div class="card-grid" id="cards_informacion">

              <a class="card" href="https://concepto.de/rock/" target="_blank">
                <div class="background"
                  style="background-image: url(https://images6.alphacoders.com/309/309634.jpg)">
                </div>
                <div class="content">
                  <p class="category">Género</p>
                  <h3 class="heading">Rock</h3>
                </div>
              </a>
        
              <a class="card" href="https://originalmusic.es/blog/conociendo-estilos-musicales-pop/" target="_blank">
                <div class="background"
                  style="background-image: url(https://images8.alphacoders.com/772/772825.jpg)">
                </div>
                <div class="content">
                  <p class="category">Género</p>
                  <h3 class="heading">Pop</h3>
                </div>
              </a>
        
              <a class="card" href="https://vinyleorecords.com/la-evolucion-del-rap-historia-del-genero/#:~:text=El%20rap%20se%20origin%C3%B3%20a,poes%C3%ADa%20hablada%20sobre%20los%20ritmos." target="_blank">
                <div class="background"
                  style="background-image: url(https://images.alphacoders.com/539/539612.jpg)">
                </div>
                <div class="content">
                  <p class="category">Género</p>
                  <h3 class="heading">Rap</h3>
                </div>
              </a>
        
              <a class="card" href="https://legismusic.com/es/generos-musicales/" target="_blank">
                <div class="background"
                  style="background-image: url(https://images4.alphacoders.com/575/575756.jpg)">
                </div>
                <div class="content">
                  <p class="category">Género</p>
                  <h3 class="heading">Otros</h3>
                </div>
              </a>
        
            </div>
          </section>

          <!--Seccion Top Semanal-->
          <section>
            <div class="contenedor_tops" id="contenido1">
              <p class="glitch" id="texto_topsemanal">TOP SEMANAL</p>
              <div id="lista_canciones">
                <?php
                include('php/listar_canciones.php');
                ?>
              </div>
              </div>
                
          </section>
         
          <!--Seccion Busqueda-->
          <section>
            <div class="contenedor_tops" id="contenedor_canciones">
              <p class="glitch" id="busqueda">REALIZA TU BUSQUEDA</p>
                <input type="text" id="txt_busqueda" placeholder="Ingresa tu busqueda..." onkeyup="buscar()">
                
                
           
            </div>
          </section>
          
        </main>

      <!--Pie de página-->
        <footer>
          <div class="container">
            <div class="row">
              <div class="col-md-8 col-sm-6 col-xs-12">
                <p class="copyright-text">Copyright &copy; 2024 Todos los derechos reservados a <a href="index.php">TopMusic</a>.</p>
              </div>
    
              <div class="col-md-4 col-sm-6 col-xs-12">
                <ul class="social-icons">
                  <li><a class="facebook" href="https://www.facebook.com/?locale=es_ES" target="_blank"><i class="fab fa-facebook"></i></a></li>
                  <li><a class="twitter" href="https://x.com/?lang=es" target="_blank"><i class="fab fa-twitter"></i></a></li>
                  <li><a class="instagram" href="https://www.instagram.com/?hl=es" target="_blank"><i class="fab fa-dribbble"></i></a></li>
                  <li><a class="linkedin" href="https://es.linkedin.com/" target="_blank"><i class="fab fa-linkedin"></i></a></li>   
                </ul>
              </div>
            </div>
          </div>
        </footer>

        
        <!-- Bootstrap JavaScript Libraries -->
        <script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"
        ></script>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous"
        ></script>

        <!-- Script JS para ocultar la barra de navegacion al bajar -->
        <script>
          let prevScrollPos = window.pageYOffset; // Posición inicial del scroll
          const navbar = document.querySelector('.navbar'); // Seleccionar el navbar

          window.addEventListener('scroll', () => {
              const currentScrollPos = window.pageYOffset;

              if (currentScrollPos > prevScrollPos) {
                  // Si bajamos el scroll, ocultamos la navbar
                  navbar.classList.add('navbar-hide');
              } else {
                  // Si subimos el scroll, mostramos la navbar
                  navbar.classList.remove('navbar-hide');
              }

              prevScrollPos = currentScrollPos; // Actualizar posición anterior
          });
        </script>

        
    </body>
</html>

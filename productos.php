<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Buscar propiedades</title>
    <link rel="stylesheet" href="<?php echo !empty($_COOKIE['categoria']) ? $_COOKIE['categoria'] : ' '; ?>">

    <?php include_once "funciones.php";?>
    <?php $categoria = !empty($_COOKIE["categoria"]) ? $_COOKIE["categoria"] : ' ';?>
    <?php
          if (isset($_POST['categoria']) && !empty($_POST['categoria'])) {
            $categoria = $_POST['categoria'];
            setcookie('categoria', $categoria, time() + 3600 * 24 * 365 ,'/');
          } else {
              $categoria = !empty($_COOKIE['categoria']) ? $_COOKIE['categoria'] : ' ';
          }
          
          $usuario = array(
            "categoria" => $categoria
          );

          if (!isset($_SESSION['usuarios'])) {
            $_SESSION['usuarios'] = array();
          }

          array_push($_SESSION['usuarios'], $usuario);

    ?>
    <script
      src="https://kit.fontawesome.com/8b96afa7e9.js"
      crossorigin="anonymous"
    ></script>
    <style>
      .main-container {
        overflow: hidden;
        float: left;
        display: flex;
        padding: 0rem 0;
        padding-right: 0rem;
        margin: 0 auto;
        padding: 0 20px;

      }

      #main-icon {
        display: inline-block;
        width: 100%;
        margin-bottom: 50px;
      }

      #main-icon img {
        width: 50px;
      }

      .icon {
        margin: auto;
        width: 30px;
      }

      .filter-container {
        overflow: hidden;
        padding: 0 5rem;
        width: auto;
        display: flex;
        flex-direction: column;
        gap: 3rem;
      }

      .radio-check {
        display: flex;
        flex-direction: column;
      }

      .price-range-container {
        display: flex;
        flex-direction: column;
      }

      .spinner{
        padding-left: 1rem;
        display: flex;
        gap: 20px;
        


      }

      .spinner input {
        width: 100px;
        border-radius: 60px;
      }

      .bath-bed-container {
        display: flex;
      }

      .bath-bed-container input {
        width: 75px;
      }

      .bath-container,
      .bedroom-container {
        font-weight: bold;
      }

      .bath-bed-container input[type="number"] {
        margin-top: 10px;
      }

      .facilities-container {
        display: flex;
        flex-direction: column;
        gap: 10px;
      }

      .apply {
        width: 100%;
        height: 50px;
        margin: 0 auto;
        border-radius: 10px;
        border: none;
        background-color: #30616c;
        color: white;
        font-size: 16px;
        margin-top: 2rem;
      }

      .apply:hover {
        background-color: #19828c;
        cursor: pointer;
      }

      .right-container {
        background-color: white;
        border-radius: 50px;
        height: max-content;
        width: 100%;
        padding: 2rem;
      }

      .search-container {
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        gap: 1rem;
      }

      .search-container input {
        border: none;
        background-color: #f3f2f3;
        width: 100%;
        font-size: 16px;
      }

      .search-container input:focus {
        background-color: #f3f2f3;
        outline: none;
      }

      .search-bar,
      .sort-container {
        background-color: #f3f2f3;
        display: flex;
        justify-content: left;
        align-items: center;

        border-radius: 15px;
        height: 15px;
        gap: 25px;
        padding: 1.5rem;
      }

      .sort-container select {
        border: none;
        background-color: #f3f2f3;
        margin-left: -15px;
      }

      .search-bar {
        width: 550px;
      }

      .libro-container {
        display: grid;
        /* espacio del container  */
        grid-template-columns: repeat(auto-fill, minmax(140px, 5fr));
        grid-gap: 10px; /*  */
        place-items: center;
        gap: 3rem;
      }

      .apparment {
        background-color: white;
        width: 150px;
        height: 270px;
        border-radius: 25px;
        box-shadow: 0px 0px 25px 5px rgba(0, 0, 0, 0.1);
        padding: 1rem;
      }

      .picture {
        height: 200px;
      }

      .app-photo {
        width: 100%;
        height: 200px;
        border: solid 2px #f3f2f3;
        border-radius: 15px;
      }

      .save-icon {
        position: relative;
        background-color: white;
        display: inline-block;
        border-radius: 100%;
        padding: 0.25rem;
        bottom: 200px;
        left: 110px;
      }

      .divider {
        height: 2px;
        border: none;
        background-color: #f3f2f3;
        width: 113%;
        margin-left: -10px;
      }

      .icons {
        display: flex;
        justify-content: center;
        margin-top: 1.25rem;
        gap: 2rem;
      }

      @media (max-width: 1250px) {
        .sort-container h4 {
          display: none;
        }

        .search-bar {
          width: auto;
        }
      }

      @media (max-width: 775px) {
        .search-bar input::placeholder {
          opacity: 0;
        }

        .main-container {
          margin-left: 0;
        }

        #main-icon {
          margin-bottom: 0;
          width: auto;
        }

        

        .main-container {
          width: auto;
          margin-left: 2rem;
          float: none;
          display: unset;
        }

        .filter-container {
          width: auto;
          height: auto;
          margin-bottom: 2rem;
        }

        .filter-container h1 {
          margin: auto;
        }

        .apply {
          width: 150px;
        }

        .apparment-container {
          grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        }

        .container {
          margin-left: 0;
        }

        .bath-bed-container {
          flex-direction: column;
        }

        
      }
    </style>
  </head>
  <body style="background-color: #f3f2f3">
    <div class="main-container">
      <div class="filter-container">
        <div class="facilities-container">
          <form id="formulario" method="Post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <h4>Categorias</h4>
            <div class="radio-check">
              <label>
               <input type="radio" name="categoria" value="wattpad.php" <?php if ($categoria == 'wattpad.php') { echo 'checked'; } ?> />
               Wattpad
              </label>
              <label>
                <input type="radio" name="categoria" value="terror.php" <?php if ($categoria == 'terror.php') { echo 'checked'; } ?> />
                Terror
              </label>
              <label>
                <input type="radio" name="categoria" value="superacion.php" <?php if ($categoria == 'superacion.php') { echo 'checked'; } ?> />
                Superar
              </label>
              <label>
                <input type="radio" name="categoria" value="popular.php" <?php if ($categoria == 'popular.php') { echo 'checked'; } ?> />
                Popular
              </label>
            </div> 
            <button class="apply" type="submit">Buscar</button>
          </form>
        
          <h3>Categoria:</h3>
          <ul>
            <?php
              if (isset($_SESSION['usuarios'])) {
                  foreach ($_SESSION['usuarios'] as $usuario) {
                      echo "<li>{$usuario['categoria']}</li>";
                  }
              }
            ?>
          </ul>
        </div>
      </div>
      <div class="right-container">
        <div class="search-container">
          <div class="search-bar">
            <input type="text" placeholder="Busca aquí" />
          </div>
        </div>
        <div class="search-title">
          <h1>Tus mejores libros</h1>
        </div>
        <?php
          // Validación básica de la categoría
          if (isset($_POST['categoria'])) {
              $categoria = $_POST['categoria'];

              // Determinar el archivo a incluir basado en la categoría seleccionada
              switch ($categoria) {
                  case 'wattpad.php':
                      include_once 'wattpad.php';
                      break;
                  case 'terror.php':
                      include_once 'terror.php';
                      break;
                  case 'superacion.php':
                      include_once 'superacion.php';
                      break;
                  case 'popular.php':
                      include_once 'popular.php';
                      break;
                  default:
                      echo "<p>La categoría seleccionada no existe.</p>";
                      break;
              }
              exit();
            } else {
              // Si no se ha seleccionado ninguna categoría, mostrar un mensaje de error
              echo "<p>No se ha seleccionado ninguna categoría.</p>";
            }
        ?>
        <div class="libro-container">
         <form method="POST" action="carrito.php">
            <div class="apparment">
                <div class="picture">
                  <img class="app-photo" src="img/pop.jpg" alt="Appartment"/>
                  <div class="save-icon">
                    <img style="width: 30px" src="img/heart.svg" alt="Favorite"/>
                  </div>
                </div>
              <div class="tags">
                <p style="color: #e47c7c">$19
                <button type="submit" style="background:none;border:none;padding:0;">
                   <button type="submit" style="background:none;border:none;padding:0;">
                   <img src="img/cart4.svg" alt="cart4" style="height: 23px; float: right   ; ">
                </button>
                </p>
              </div>
              <hr class="divider" />
              <div class="spinner">
                <input type="number" name="cantidad" id="cantidad" min="1" placeholder="Cantidad" >
                <input type="hidden" name="producto" value="Terapia para llevar">
                <input type="hidden" name="precio" value="19">
              </div>
            <!-- -->
            </div>
          </form>
          <form method="POST" action="carrito.php">
           <div class="apparment">
         
              <div class="picture">
                <img
                  class="app-photo"
                  src="img/pop2.jpg"
                  alt="Appartment"
                />
                <div class="save-icon">
                  <img
                    style="width: 30px"
                    src="img/heart.svg"
                    alt="Favorite"
                  />
                </div>
              </div>

            <div class="tags">
              <p style="color: #e47c7c">$21
                <button type="submit" style="background:none;border:none;padding:0;">
                   <img src="img/cart4.svg" alt="cart4" style="height: 23px; float: right;">
                </button>
              </p>
            </div>
            <!-- -->
            <hr class="divider" />
            <div class="spinner">
                <input type="number" name="cantidad"  min="1"  placeholder="Cantidad">
                <input type="hidden" name="producto" value="Destroza este Diario">
                <input type="hidden" name="precio" value="21">
            </div>
           </div>
          </form>
          <form method="POST" action="carrito.php">
           <div class="apparment">
          
              <div class="picture">
                <img
                  class="app-photo"
                  src="img/w.jpg"
                  alt="Appartment"
                />
                <div class="save-icon">
                  <img
                    style="width: 30px"
                    src="img/heart.svg"
                    alt="Favorite"
                  />
                </div>
              </div>
          
            <div class="tags">
              <p style="color: #e47c7c">$23
                <button type="submit" style="background:none;border:none;padding:0;">
                   <img src="img/cart4.svg" alt="cart4" style="height: 23px; float: right;">
                </button></p>
            </div>
            <!-- -->
            <hr class="divider" />
            <div class="spinner">
                <input type="number" name="cantidad"  min="1"  placeholder="Cantidad">
                <input type="hidden" name="producto" value="Boulevard">
                <input type="hidden" name="precio" value="23">
            </div>
          </div>            
          </form>
          <form method="POST" action="carrito.php"><div class="apparment">
              <div class="picture">
                <img
                  class="app-photo"
                  src="img/w2.jpg"
                  alt="Appartment"
                />
                <div class="save-icon">
                  <img
                    style="width: 30px"
                    src="img/heart.svg"
                    alt="Favorite"
                  />
                </div>
              </div>
            <div class="tags">
              <p style="color: #e47c7c">$17
                <button type="submit" style="background:none;border:none;padding:0;">
                   <img src="img/cart4.svg" alt="cart4" style="height: 23px; float: right;">
                </button>
              </p>
            </div>
            <!-- -->
            <div class="spinner">
              <input type="number" name="cantidad" id="cantidad"  min="1"  placeholder="Cantidad" >
              <input type="hidden" name="producto" value="A traves de mi ventana">
                <input type="hidden" name="precio" value="17">
            </div>
           <!-- -->
          </div>            
          </form>
          <form method="POST" action="carrito.php"><div class="apparment">
              <div class="picture">
                <img
                  class="app-photo"
                  src="img/w3.jpg"
                  alt="Appartment"
                />
                <div class="save-icon">
                  <img
                    style="width: 30px"
                    src="img/heart.svg"
                    alt="Favorite"
                  />
                </div>
              </div>

            <div class="tags">
              <p style="color: #e47c7c">$18
                <button type="submit" style="background:none;border:none;padding:0;">
                   <img src="img/cart4.svg" alt="cart4" style="height: 23px; float: right;">
                </button>
              </p>
            </div>
            <!-- -->
            <hr class="divider" /> <div class="spinner">
                <input type="number" name="cantidad"  min="1"  placeholder="Cantidad">
                <input type="hidden" name="producto" value="Antes de Diciembre">
                <input type="hidden" name="precio" value="18">
            </div>
           <!-- -->
          </div>            
          </form>
          <form method="POST" action="carrito.php">
            <div class="apparment">
              <div class="picture">
                <img
                  class="app-photo"
                  src="img/c.jpg"
                  alt="Appartment"
                />
                <div class="save-icon">
                  <img
                    style="width: 30px"
                    src="img/heart.svg"
                    alt="Favorite"
                  />
                </div>
              </div>
            <div class="tags">
              <p style="color: #e47c7c">$20
                <button type="submit" style="background:none;border:none;padding:0;">
                  <img src="img/cart4.svg" alt="cart4" style="height: 23px; float: right;">
                </button>
              </p>
            </div>
            <!-- -->
            <hr class="divider" /> 
            <div class="spinner">
                <input type="number" name="cantidad"  min="1"  placeholder="Cantidad">
                <input type="hidden" name="producto" value="Ser Joven te llevara mucho tiempo">
                <input type="hidden" name="precio" value="20">
            </div>
           <!-- -->
          </div>            
          </form>
          <form method="POST" action="carrito.php"><div class="apparment">
            <!-- -->
              <div class="picture">
                <img
                  class="app-photo"
                  src="img/inf.jpg"
                  alt="Appartment"
                />
                <div class="save-icon">
                  <img
                    style="width: 30px"
                    src="img/heart.svg"
                    alt="Favorite"
                  />
                </div>
              </div>
            <!-- -->
            <div class="tags">
              <p style="color: #e47c7c">$21
                <button type="submit" style="background:none;border:none;padding:0;">
                   <img src="img/cart4.svg" alt="cart4" style="height: 23px; float: right;">
                </button></p>
            </div>
            <!-- -->
            <hr class="divider" /> <div class="spinner">
                <input type="number" name="cantidad"  min="1"  placeholder="Cantidad">
                <input type="hidden" name="producto" value="Trilogia de la niebla">
                <input type="hidden" name="precio" value="21">
            </div>
           <!-- -->
          </div>            
          </form>
          <form method="POST" action="carrito.php"><div class="apparment">
            <!-- -->
              <div class="picture">
                <img
                  class="app-photo"
                  src="img/inf3.jpg"
                  alt="Appartment"
                />
                <div class="save-icon">
                  <img
                    style="width: 30px"
                    src="img/heart.svg"
                    alt="Favorite"
                  />
                </div>
              </div>
            <!-- -->

            <div class="tags">
              <p style="color: #e47c7c">$15
                <button type="submit" style="background:none;border:none;padding:0;">
                   <img src="img/cart4.svg" alt="cart4" style="height: 23px; float: right;">
                </button></p>
            </div>
            <!-- -->
            <hr class="divider" /> 
            <div class="spinner">
                <input type="number" name="cantidad"  min="1"  placeholder="Cantidad">
                <input type="hidden" name="producto" value="Historia de la Filosofia">
                <input type="hidden" name="precio" value="15">
            </div>
           <!-- -->
          </div>            
          </form>
          <form method="POST" action="carrito.php"><div class="apparment">
            <!-- -->
              <div class="picture">
                <img
                  class="app-photo"
                  src="img/ter.jpg"
                  alt="Appartment"
                />
                <div class="save-icon">
                  <img
                    style="width: 30px"
                    src="img/heart.svg"
                    alt="Favorite"
                  />
                </div>
              </div>
            <!-- -->

            <div class="tags">
              <p style="color: #e47c7c">$25
                <button type="submit" style="background:none;border:none;padding:0;">
                   <img src="img/cart4.svg" alt="cart4" style="height: 23px; float: right;">
                </button></p>
            </div>
            <!-- -->
            <hr class="divider" /> 
            <div class="spinner">
                <input type="number" name="cantidad"  min="1"  placeholder="Cantidad">
                <input type="hidden" name="producto" value="Blackwater">
                <input type="hidden" name="precio" value="25">
            </div>
           <!-- -->
          </div>            
          </form>
          <form method="POST" action="carrito.php"><div class="apparment">
            <!-- -->
              <div class="picture">
                <img
                  class="app-photo"
                  src="img/inf3.jpg"
                  alt="Appartment"
                />
                <div class="save-icon">
                  <img
                    style="width: 30px"
                    src="img/heart.svg"
                    alt="Favorite"
                  />
                </div>
              </div>
            <!-- -->

            <div class="tags">
              <p style="color: #e47c7c">$18
                <button type="submit" style="background:none;border:none;padding:0;">
                   <img src="img/cart4.svg" alt="cart4" style="height: 23px; float: right;">
                </button></p>
            </div>
            <!-- -->
            <hr class="divider" /> <div class="spinner">
                <input type="number" name="cantidad"  min="1"  placeholder="Cantidad">
                <input type="hidden" name="producto" value="Filosofia">
                <input type="hidden" name="precio" value="18">
            </div>
           <!-- -->
          </div>            
          </form>
          <form method="POST" action="carrito.php"><div class="apparment">
            <!-- -->
              <div class="picture">
                <img
                  class="app-photo"
                  src="img/ter5.jpg"
                  alt="Appartment"
                />
                <div class="save-icon">
                  <img
                    style="width: 30px"
                    src="img/heart.svg"
                    alt="Favorite"
                  />
                </div>
              </div>
            <!-- -->

            <div class="tags">
              <p style="color: #e47c7c">$24
                <button type="submit" style="background:none;border:none;padding:0;">
                   <img src="img/cart4.svg" alt="cart4" style="height: 23px; float: right;">
                </button></p>
            </div>
            <!-- -->
            <hr class="divider" /> <div class="spinner">
                <input type="number" name="cantidad"  min="1"  placeholder="Cantidad">
                <input type="hidden" name="producto" value="Presa Cazador">
                <input type="hidden" name="precio" value="24">
            </div>
           <!-- -->
          </div>            
          </form>
          <form method="POST" action="carrito.php"><div class="apparment">
            <!-- -->
              <div class="picture">
                <img
                  class="app-photo"
                  src="img/inf4.jpg"
                  alt="Appartment"
                />
                <div class="save-icon">
                  <img
                    style="width: 30px"
                    src="img/heart.svg"
                    alt="Favorite"
                  />
                </div>
              </div>
            <!-- -->

            <div class="tags">
              <p style="color: #e47c7c">$22
                <button type="submit" style="background:none;border:none;padding:0;">
                   <img src="img/cart4.svg" alt="cart4" style="height: 23px; float: right;">
                </button></p>
            </div>
            <!-- -->
            <hr class="divider" /> <div class="spinner">
                <input type="number" name="cantidad"  min="1"  placeholder="Cantidad">
                <input type="hidden" name="producto" value="Invisible">
                <input type="hidden" name="precio" value="22">
            </div>
           <!-- -->
          </div>            
          </form>
          <form method="POST" action="carrito.php"><div class="apparment">
            <!-- -->
              <div class="picture">
                <img
                  class="app-photo"
                  src="img/w6.jpg"
                  alt="Appartment"
                />
                <div class="save-icon">
                  <img
                    style="width: 30px"
                    src="img/heart.svg"
                    alt="Favorite"
                  />
                </div>
              </div>
            <!-- -->

            <div class="tags">
              <p style="color: #e47c7c">$15
                <button type="submit" style="background:none;border:none;padding:0;">
                   <img src="img/cart4.svg" alt="cart4" style="height: 23px; float: right;">
                </button></p>
            </div>
            <!-- -->
            <hr class="divider" /> <div class="spinner">
                <input type="number" name="cantidad"  min="1"  placeholder="Cantidad">
                <input type="hidden" name="producto" value="Mi amor de wattpad">
                <input type="hidden" name="precio" value="15">
            </div>
           <!-- -->
          </div>            
          </form>
          <form method="POST" action="carrito.php"><div class="apparment">
            <!-- -->
              <div class="picture">
                <img
                  class="app-photo"
                  src="img/ter.jpg"
                  alt="Appartment"
                />
                <div class="save-icon">
                  <img
                    style="width: 30px"
                    src="img/heart.svg"
                    alt="Favorite"
                  />
                </div>
              </div>
            <!-- -->

            <div class="tags">
              <p style="color: #e47c7c">$19
                <button type="submit" style="background:none;border:none;padding:0;">
                   <img src="img/cart4.svg" alt="cart4" style="height: 23px; float: right;">
                </button></p>
            </div>
            <!-- -->
            <hr class="divider" /> <div class="spinner">
                <input type="number" name="cantidad"  min="1"  placeholder="Cantidad">
                <input type="hidden" name="producto" value="blackwater">
                <input type="hidden" name="precio" value="19">
            </div>
           <!-- -->
          </div>            
          </form>
          <form method="POST" action="carrito.php"><div class="apparment">
            <!-- -->
              <div class="picture">
                <img
                  class="app-photo"
                  src="img/pop5.jpg"
                  alt="Appartment"
                />
                <div class="save-icon">
                  <img
                    style="width: 30px"
                    src="img/heart.svg"
                    alt="Favorite"
                  />
                </div>
              </div>
            <!-- -->

            <div class="tags">
              <p style="color: #e47c7c">$16
                <button type="submit" style="background:none;border:none;padding:0;">
                   <img src="img/cart4.svg" alt="cart4" style="height: 23px; float: right;">
                </button></p>
            </div>
            <!-- -->
            <hr class="divider" /> <div class="spinner">
                <input type="number" name="cantidad"  min="1"  placeholder="Cantidad">
                <input type="hidden" name="producto" value="Las cadenas del rey">
                <input type="hidden" name="precio" value="16">
            </div>
           <!-- -->
          </div>            
          </form>
          <form method="POST" action="carrito.php"><div class="apparment">
            <!-- -->
              <div class="picture">
                <img
                  class="app-photo"
                  src="img/pop4.jpg"
                  alt="Appartment"
                />
                <div class="save-icon">
                  <img
                    style="width: 30px"
                    src="img/heart.svg"
                    alt="Favorite"
                  />
                </div>
              </div>
            <!-- -->

            <div class="tags">
              <p style="color: #e47c7c">$21
                <button type="submit" style="background:none;border:none;padding:0;">
                   <img src="img/cart4.svg" alt="cart4" style="height: 23px; float: right;">
                </button></p>
            </div>
            <!-- -->
            <hr class="divider" /> <div class="spinner">
                <input type="number" name="cantidad"  min="1"  placeholder="Cantidad">
                <input type="hidden" name="producto" value="La serpiente de la noche">
                <input type="hidden" name="precio" value="21">
            </div>
           <!-- -->
          </div>            
          </form>
          <form method="POST" action="carrito.php"><div class="apparment">
            <!-- -->
              <div class="picture">
                <img
                  class="app-photo"
                  src="img/c3.jpg"
                  alt="Appartment"
                />
                <div class="save-icon">
                  <img
                    style="width: 30px"
                    src="img/heart.svg"
                    alt="Favorite"
                  />
                </div>
              </div>
            <!-- -->

            <div class="tags">
              <p style="color: #e47c7c">$25
                <button type="submit" style="background:none;border:none;padding:0;">
                   <img src="img/cart4.svg" alt="cart4" style="height: 23px; float: right;">
                </button></p>
            </div>
            <!-- -->
            <hr class="divider" /> <div class="spinner">
                <input type="number" name="cantidad"  min="1"  placeholder="Cantidad">
                <input type="hidden" name="producto" value="Yo de mayor quiero ser Joven">
                <input type="hidden" name="precio" value="25">
            </div>
           <!-- -->
          </div>            
          </form>
          <form method="POST" action="carrito.php"><div class="apparment">
            <!-- -->
              <div class="picture">
                <img
                  class="app-photo"
                  src="img/pop4.jpg"
                  alt="Appartment"
                />
                <div class="save-icon">
                  <img
                    style="width: 30px"
                    src="img/heart.svg"
                    alt="Favorite"
                  />
                </div>
              </div>
            <!-- -->

            <div class="tags">
              <p style="color: #e47c7c">$21
                <button type="submit" style="background:none;border:none;padding:0;">
                   <img src="img/cart4.svg" alt="cart4" style="height: 23px; float: right;">
                </button></p>
            </div>
            <!-- -->
            <hr class="divider" /> <div class="spinner">
                <input type="number" name="cantidad"  min="1"  placeholder="Cantidad">
                <input type="hidden" name="producto" value="Serpiente en noche 2">
                <input type="hidden" name="precio" value="21">
            </div>
           <!-- -->
          </div>            
          </form>
          <form method="POST" action="carrito.php"><div class="apparment">
            <!-- -->
              <div class="picture">
                <img
                  class="app-photo"
                  src="img/ter7.jpg"
                  alt="Appartment"
                />
                <div class="save-icon">
                  <img
                    style="width: 30px"
                    src="img/heart.svg"
                    alt="Favorite"
                  />
                </div>
              </div>
            <!-- -->

            <div class="tags">
              <p style="color: #e47c7c">$24
                <button type="submit" style="background:none;border:none;padding:0;">
                   <img src="img/cart4.svg" alt="cart4" style="height: 23px; float: right;">
                </button></p>
            </div>
            <!-- -->
            <hr class="divider" /> <div class="spinner">
                <input type="number" name="cantidad"  min="1"  placeholder="Cantidad">
                <input type="hidden" name="producto" value="Novia">
                <input type="hidden" name="precio" value="24">
            </div>
           <!-- -->
          </div>            
          </form>
          <form method="POST" action="carrito.php"><div class="apparment">
            <!-- -->
              <div class="picture">
                <img
                  class="app-photo"
                  src="img/ter6.jpg"
                  alt="Appartment"
                />
                <div class="save-icon">
                  <img
                    style="width: 30px"
                    src="img/heart.svg"
                    alt="Favorite"
                  />
                </div>
              </div>
            <!-- -->

            <div class="tags">
              <p style="color: #e47c7c">$19
                <button type="submit" style="background:none;border:none;padding:0;">
                   <img src="img/cart4.svg" alt="cart4" style="height: 23px; float: right;">
                </button></p>
            </div>
            <!-- -->
            <hr class="divider" /> <div class="spinner">
                <input type="number" name="cantidad"  min="1"  placeholder="Cantidad">
                <input type="hidden" name="producto" value="Ciudad medialuna">
                <input type="hidden" name="precio" value="19">
            </div>
           <!-- -->
          </div>            
          </form>
          <form method="POST" action="carrito.php"><div class="apparment">
            <!-- -->
              <div class="picture">
                <img
                  class="app-photo"
                  src="img/pop6.jpg"
                  alt="Appartment"
                />
                <div class="save-icon">
                  <img
                    style="width: 30px"
                    src="img/heart.svg"
                    alt="Favorite"
                  />
                </div>
              </div>
            <!-- -->

            <div class="tags">
              <p style="color: #e47c7c">$16
                <button type="submit" style="background:none;border:none;padding:0;">
                   <img src="img/cart4.svg" alt="cart4" style="height: 23px; float: right;">
                </button></p>
            </div>
            <!-- -->
            <hr class="divider" /> <div class="spinner">
                <input type="number" name="cantidad"  min="1"  placeholder="Cantidad">
                <input type="hidden" name="producto" value="Trono de cristal">
                <input type="hidden" name="precio" value="16">
            </div>
           <!-- -->
          </div>            
          </form>
          <form method="POST" action="carrito.php"><div class="apparment">
            <!-- -->
              <div class="picture">
                <img
                  class="app-photo"
                  src="img/pop5.jpg"
                  alt="Appartment"
                />
                <div class="save-icon">
                  <img
                    style="width: 30px"
                    src="img/heart.svg"
                    alt="Favorite"
                  />
                </div>
              </div>
            <!-- -->

            <div class="tags">
              <p style="color: #e47c7c">$19
                <button type="submit" style="background:none;border:none;padding:0;">
                   <img src="img/cart4.svg" alt="cart4" style="height: 23px; float: right;">
                </button>

              </p>
            </div>
            <!-- -->
            <hr class="divider" /> <div class="spinner">
                <input type="number" name="cantidad"  min="1"  placeholder="Cantidad">
                <input type="hidden" name="producto" value="Cadenas del rey ">
                <input type="hidden" name="precio" value="19">
            </div>
           <!-- -->
          </div>            
          </form>
          <form method="POST" action="carrito.php"><div class="apparment">
            <!-- -->
              <div class="picture">
                <img
                  class="app-photo"
                  src="img/w5.jpg"
                  alt="Appartment"
                />
                <div class="save-icon">
                  <img
                    style="width: 30px"
                    src="img/heart.svg"
                    alt="Favorite"
                  />
                </div>
              </div>
            <!-- -->

            <div class="tags">
              <p style="color: #e47c7c">$23<button type="submit" style="background:none;border:none;padding:0;">
                   <img src="img/cart4.svg" alt="cart4" style="height: 23px; float: right;">
                </button>
              </p>
            </div>
            <!-- -->
            <hr class="divider" /> <div class="spinner">
                <input type="number" name="cantidad"  min="1"  placeholder="Cantidad">
                <input type="hidden" name="producto" value="Trilogia Fuego">
                <input type="hidden" name="precio" value="23">
            </div>
            <!-- -->
          </div>            
          </form>
          <form method="POST" action="carrito.php"><div class="apparment">
            <!-- -->
              <div class="picture">
                <img
                  class="app-photo"
                  src="img/w6.jpg"
                  alt="Appartment"
                />
                <div class="save-icon">
                  <img
                    style="width: 30px"
                    src="img/heart.svg"
                    alt="Favorite"
                  />
                </div>
              </div>
            <!-- -->

            <div class="tags">
              <p style="color: #e47c7c">$21<button type="submit" style="background:none;border:none;padding:0;">
                   <img src="img/cart4.svg" alt="cart4" style="height: 23px; float: right;">
                </button>
              </p>
            </div>
            <!-- -->
            <hr class="divider" /> 
            <div class="spinner">
                <input type="number" name="cantidad"  min="1"  placeholder="Cantidad">
                <input type="hidden" name="producto" value="mi amor de wattpad 2">
                <input type="hidden" name="precio" value="21">
            </div>
            <!-- -->
          </div>            
          </form>
          <form method="POST" action="carrito.php"><div class="apparment">
            <!-- -->
              <div class="picture">
                <img
                  class="app-photo"
                  src="img/ter4.jpg"
                  alt="Appartment"
                />
                <div class="save-icon">
                  <img
                    style="width: 30px"
                    src="img/heart.svg"
                    alt="Favorite"
                  />
                </div>
              </div>
            <!-- -->

            <div class="tags">
              <p style="color: #e47c7c">$23
                <button type="submit" style="background:none;border:none;padding:0;">
                   <img src="img/cart4.svg" alt="cart4" style="height: 23px; float: right;">
                </button>
              </p>
            </div>
            <!-- -->
            <hr class="divider" /> 
            <div class="spinner">
                <input type="number" name="cantidad"  min="1"  placeholder="Cantidad">
                <input type="hidden" name="producto" value="El estrecho sendero">
                <input type="hidden" name="precio" value="23">
            </div>
            <!-- -->
           </div>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>

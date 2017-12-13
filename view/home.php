<?php 
  require_once "controller/auto.php";
  session_start();

  $id = $_SESSION["id"];
  $name = $_SESSION["name"];
  $lastname = $_SESSION["lastname"];
  $email = $_SESSION["email"];
  $user = $_SESSION["user"];
?>

    <!DOCTYPE html>
    <html lang="pt-br">
    <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>My Spot - Início </title>
      <link rel="stylesheet" href="assets/css/normalize.css">
      <link rel="stylesheet" href="assets/css/main.css">
      <script src="https://use.fontawesome.com/f07f2022bd.js"></script>
      
    </head>
    <body>
      <div class="container_home " id="container_home">
        <header class="home_top">
          <div class="profile">
            <img class="photo_profile" src="assets/images/logo/logo_spot.png" alt="Foto de Perfil">
          </div>
        </header>

        <div class="main">
            <div class="search">
              <input class="input_search" id="input_search" type="text" placeholder="Digite o endereço desejado">
            </div>
            <div id="map"></div>
        </div>

        <div class="details">
          <h1 class="title_details">Gerencie seus Spots</h1>
          <div class="manager_details">
              <section class="map_details">
                  <ul class="info_map">
          
                    <?php 

                      if(count($retorno) > 0)
                      {
                        for($x=0; $x < count($retorno); $x++)
                        {
                          echo "<li class='item_info'>";
                          echo "<div>";
                            echo "<i class='fa fa-home' aria-hidden='true'></i>";
                            echo "<span>{$retorno[$x]->address} {$retorno[$x]->nickname}</span>";
                          echo "</div>";
                          echo"<div class='options_info'>";
                            echo"<a id='update' class='options update' value='{$retorno[$x]->id_address}/{$retorno[$x]->address}/{$retorno[$x]->latitude}/{$retorno[$x]->longitude}/{$retorno[$x]->nickname}' href='#'><i class='fa fa-pencil' aria-hidden='true'></i></a>";
                            echo"<a class='options location' value='{$retorno[$x]->latitude}/{$retorno[$x]->longitude}'href='#'><i class='fa fa-map-marker' aria-hidden='true'></i></a>";
                           // echo"<a class='options share' href='#'><i class='fa fa-share-alt' aria-hidden='true'></i></a>";
                            echo"<a class='options delete' value='{$retorno[$x]->id_address}' href='#' ><i class='fa fa-times' aria-hidden='true'></i></a>";
                          echo"</div>";
                          echo"</li>";
                        }
                      }
                     
                    ?>
                    
                  </ul>    
              </section>
              <section class="profile_details">
                <div class="option_profile">
                  <a href="index.php?controller=c_user&method=logout" class="options exit"> <i class="fa fa-power-off" aria-hidden="true"></i> </a>
                  <a href="#" class="options config" onclick="configModal('I','modal_profile', 'container_profile' , 'block', 2, 1, 0.2)"> <i class="fa fa-cog" aria-hidden="true"></i> </a>
                </div>
                <img class="image_profile" src="assets/images/profile/imagem1.png" alt="Foto perfil" srcset="">
                <h2 class="title_profile"><?php echo $name. " " . $lastname ?></h2>
                <p><?php echo $email ?></p>
                <p class="counter_spot">Você possui 15 spots no mapa <i class="fa fa-heart-o" aria-hidden="true"></i></p>
              </section>
          </div>
        </div>

        <footer>
          Desenvolvido por MySpot <i class="fa fa-heart-o" aria-hidden="true"></i>
        </footer>

      </div>
      <div class="container_map" id="container_map">
        <div class="modal" id="modal_map">
            <div class="header_modal">
              <h2 class="title_spot">Insira o seu Spot</h2>
              <i class="fa fa-times close_modal" onclick="configModal('L','modal_map', 'container_map' , 'none', '1', '2', '1')" aria-hidden="true"></i>
            </div>
            <div class="input_spot">
              <input type="hidden" name="id" id="id" value="<?php echo $id ?>">
              <input type="hidden" name="id_address" id="id_address">
              <input type="hidden" name="lat" id="lat" value=''>
              <input type="hidden" name="lon" id="lon" value=''>
              <input type="text" name="nickname" id="nickname" placeholder="Digite o apelido do seu Spot">
              <input type="text" name="address" id="address" disabled placeholder="Rua Abolição, nº 780">
            </div>
            <button class="button add btn-modal">Adicionar</button>
        </div>
      </div>
      <div class="container_remove" id="container_remove">
        <div class="modal remove" id="modal_remove">
            <div class="header_modal">
              <h2 class="title_spot">Remover Spot</h2>
              <i class="fa fa-times close_modal" onclick="configModal('L','modal_remove', 'container_remove' , 'none', '1', '2', '1')" aria-hidden="true"></i>
            </div>
            <div class="input_spot">
              <input type="hidden" name="id_raddress" id="id_raddress">
              <p>Você tem certeza que deseja excluir o seu Spot?</p>
            </div>
            <button class="button add btn-modal" onclick="remove_address()">Sim</button>
            <button class="button google btn-modal" onclick="configModal('I','modal_remove', 'container_remove' , 'none', '1', '2', '1')">Não</button>
        </div>
      </div>

      <div class="container_profile" id="container_profile">
        <form method="POST" class="modal update" id="modal_profile">
            <div class="header_modal">
              <h2 class="title_spot">Configure os seus dados</h2>
              <i class="fa fa-times close_modal" onclick="configModal('L','modal_profile', 'container_profile', 'none', '1', '2', '1')" aria-hidden="true"></i>
            </div>
            <div class="content_modal">
              <div class="box_image">
                <img class="image_profile" src="assets/images/profile/imagem1.png" alt="Foto perfil" srcset="">
              </div>
              
              <label class="label_modal">Altere os seus dados principais:</label>
              <div class="data_name">
                <input type="hidden" name="id" value="<?php echo $id?>" style="display:block">
                <input class="name_first" name="name" type="text" placeholder="<?php echo $name ?>">
                <input class="name_last" name="lastname" type="text" placeholder="<?php echo $lastname ?>">
              </div>
              <input class="user" type="text" name="user" placeholder="<?php echo $user ?>">
              <input type="text" name="email" placeholder="<?php echo $email ?>">

              <label class="label_modal">Altere a sua senha: (Deixe em branco para manter a senha atual)</label>
              <input class="password" type="text" name="password_current" placeholder="Digite a sua senha atual">
              <input class="password" name="password_new" type="text" placeholder="Digite sua nova senha">
              <input class="password" type="text" name="password_new_confirm" placeholder="Confirme sua nova senha">
            </div>
            
            <input type="button" class="button add" value="Alterar" onclick="update_user()"/>
        </form>
      </div>
    </body>

    <script src="http://maps.google.com/maps/api/js?sensor=false&key=AIzaSyA0gmpmV65_cORWJY7g2mSLeV5CtLuN9Bg"></script>
    <script src="assets/js/jquery-2.1.1.min.js"></script>
    <script>var address = <?php echo json_encode($retorno, JSON_UNESCAPED_UNICODE);?>;</script>
    <script src="assets/js/scripts.js"></script>
    <script src="assets/js/ajax_user.js"></script>
    <script src="assets/js/ajax_address.js"></script>
    </html>

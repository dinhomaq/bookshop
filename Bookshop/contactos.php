
  <?php


require_once __DIR__."./vendor/autoload.php";
$title = "Contatos";

use App\Controller\Createmsg;
use App\Model\Validar;


$validar = new Validar();
$createmsg = new Createmsg();

require_once __DIR__."/header.php";

?>


    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact" style="margin-top: 7rem;">
        <div class="container" data-aos="fade-up">
  
          <div class="section-title">
            <h2>Contactos</h2>
            <p>Contacte - nos</p>
          </div>
  
         
  
          <div class="row mt-5">
  
            <div class="col-lg-4">
              <div class="info">
                <div class="address">
                  <i class="bi bi-geo-alt"></i>
                  <h4>Localização:</h4>
                  <p>Prenda</p>
                </div>
  
                <div class="email">
                  <i class="bi bi-envelope"></i>
                  <h4>Email:</h4>
                  <p>afta036@gmail.com</p>
                </div>
  
                <div class="phone">
                  <i class="bi bi-phone"></i>
                  <h4>Tell:</h4>
                  <p>+244 946 614 780</p>
                </div>
  
              </div>
  
            </div>
  
            <div class="col-lg-8 mt-5 mt-lg-0">
  
            <?php

if(isset($_POST['obj'])){
  $post = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    if(in_array("",$post)){
        echo "<div class='alert alert-danger' role='alert'>Preencha todos os campos.</div>";
    }else{

            $validar->setnome($post['nome']);
            $validar->setmsg($post['msg']);
            $validar->setemail($post['email']);
            $validar->setobjectivo($post['obj']);
         
      
            $createmsg->createmsg($validar);

              echo "<div class='alert alert-success' role='alert'>Enviado com Sucesso!</div>";
       
      }
    }
   
   

  ?>

              <form method="post" class="form-group">
                <div class="row">
                  <div class="col-md-6 form-group">
                    <input type="text" name="nome" class="form-control" id="name" placeholder="Nome completo">
                  </div>
                  <div class="col-md-6 form-group mt-3 mt-md-0">
                    <input type="email" class="form-control" name="email" id="email" placeholder="@gmail.com">
                  </div>
                </div>
                <div class="form-group mt-3">
                  <input type="text" class="form-control" name="obj" id="objectivo" placeholder="Objetivo">
                </div>
                <div class="form-group mt-3">
                  <textarea class="form-control" name="msg" rows="5" placeholder="Mensagem"></textarea>
                </div>
                     <div class="form-group text-center">       
                        <input type="submit" value="Enviar" class="btn btn-warning px-5 mt-3 " name="enviar">
                      </div>
              </form>
  
            </div>
  
          </div>
  
        </div>
      </section><!-- End Contact Section -->
  
    </main><!-- End #main -->
  
    <!-- ======= Footer ======= -->
    <?php require_once __DIR__."/footer.php"; ?>
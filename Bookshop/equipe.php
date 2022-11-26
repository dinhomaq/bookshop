
<?php
require_once __DIR__."../vendor/autoload.php";
$title = "Equipe";

use App\Controller\Readfuncionario;



$readfuncio = new Readfuncionario();
$readfun = $readfuncio->readfuncionario();

require_once __DIR__."/header.php";

?>
<!-- ======= Team Section ======= -->
    <section id="team" class="team" style="margin-top: 7rem;">
      <div class="container" data-aos="fade-up">

        <div class="section-title" >
          <h2>Equipe</h2>
          <p>Ver nossa Equipe</p>
        </div>

        <div class="row">
        <?php
                foreach($readfun as $readf){

                
                ?>
          <div class="col-lg-3 col-md-5 d-flex align-items-stretch">
            <div class="member" data-aos="fade-up" data-aos-delay="100">
              <div class="member-img">
                <img src="admin/arquivos/<?php echo $readf['img'] ;?>" class="img-fluid" alt="">
                <div class="social">
                  <a href="<?php echo $readf['wpp'] ;?>"><i class="bi bi-whatsapp"></i></a>
                  <a href="<?php echo $readf['fb'] ;?>"><i class="bi bi-facebook"></i></a>
                  <a href="<?php echo $readf['inst'] ;?>"><i class="bi bi-instagram"></i></a>
                 
                </div>
              </div>
              <div class="member-info">
                <h4><?php echo $readf['nome'] ;?></h4>
                <span><?php echo $readf['cargo'] ;?></span>
              </div>
            </div>
</div>
<?php 
                }
              ?>
        </div>

      </div>
    </section><!-- End Team Section -->
  <!-- ======= Footer ======= -->
 
<?php require_once __DIR__."/footer.php"; ?>
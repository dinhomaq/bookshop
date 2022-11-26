
<?php
require_once __DIR__."../vendor/autoload.php";

$title = "Livros Variados";




use App\Controller\Readlivro;

$readlivro = new Readlivro();
$readliv = $readlivro->readlivrohist();

require_once __DIR__."/header.php";
?>
<!-- ======= Books Section ======= -->
<section id="team" class="team">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Livros</h2>
          <p>Ver nossos Livros</p>
        </div>

        <div class="row">

        <?php
                foreach($readliv as $readl){

                
                ?>
          <div class="col-lg-3 col-md-5 d-flex align-items-stretch">
            <div class="member" data-aos="fade-up" data-aos-delay="100">
              <div class="member-img">
                <img src="admin/arquivos/<?php echo $readl['img']; ?>" class="img-fluid" alt="">
               </div>
              <div class="member-info">
                <h4><?php echo $readl['nome']; ?></h4>
                <h5><?php echo $readl['categoria']; ?></h5>
                <span><?php echo $readl['autor']; ?></span><br>
              
                <form action="#" method="get" role="form" class="form">
                <div class="text-left"><a href ="admin/books/<?php echo $readl['livro']; ?>" Download="<?php echo $readl['nome']; ?>"  type="application/pdf" class="btn btn-dark">Download</a></div>
              </form>

              </div>
            </div>
          </div>
          <?php
                }
                ?>

          </div>
          
      </div>
    </section><!-- End Books Section -->         
<?php require_once __DIR__."/footer.php"; ?>
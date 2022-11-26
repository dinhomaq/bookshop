<?php 
require_once __DIR__."../../vendor/autoload.php";
$title = "Mensagem";

use App\Controller\Readmsg;
use App\Controller\Delete;


$readmsg = new Readmsg();
$readms = $readmsg->readmsg();
$Delete = new Delete();

require_once __DIR__."/header.php";
?>

      <!-- Sidebar Navigation end-->
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">
            <h2 class="h5 no-margin-bottom">Dashboard/<?php echo $title ?></h2>
          </div>
        </div>
<div class="page-content">
        <section class="no-padding-top no-padding-bottom">
          <div class="container-fluid">
              <div class="row"> 
                <?php
            foreach($readms as $msg){


            
                
               
                ?>
                <div class="col-md-6">
                  <div class="card">
                      <h5 class="card-header"><?php echo $msg['email'] ;?></h5>
                      <div class="card-body">
                        <h3 class="card-title"><?php echo $msg['nome'] ;?></h3>
                        <h4 class="card-text"><?php echo $msg['objectivo'] ;?></h4>
                        <p class="card-text"><?php echo $msg['msg'] ;?></p>
                        <a href="#" data-toggle="modal"  data-target="#pub" class="btn btn-success p-1">Responder</a>
                        <a href="sms?id=<?php echo $msg['id']; ?>" class="btn btn-danger p-1"><i class="fa fa-trash-o"></i></a>
                      </div>
                </div>
              </div>
              <?php 
             
                }

              if(isset($_GET['id'])){
               $id = $_GET['id'];
               $delete = $Delete->deletemsg($id);

              }

              ?>
            </div>
           </div>
        </section>
              

              <!-- Modal mensagens -->

<div class="modal fade" id="pub" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">dinhomaq1207@gmail.com</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="post">
         <div class="form-group">
            <label class="form-control-label">Mensagem</label>
            <textarea type="text" placeholder="Digite uma sms" class="form-control"></textarea>
            </div>
        
        <div class="form-group">       
            <input type="submit" value="enviar" class="btn btn-success" name="enviar_sms">
        </div>
        </div>
      </form>
    </div>
  </div>
</div>

      
 <?php
require_once __DIR__."/footer.php";
?>
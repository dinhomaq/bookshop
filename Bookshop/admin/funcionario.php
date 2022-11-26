<?php 
require_once __DIR__."../../vendor/autoload.php";
$title = "Funcionarío";



use App\Controller\Readfuncionario;
use App\Controller\Createfuncionario;
use App\Model\Validar;


$readfuncio = new Readfuncionario();
$readfun = $readfuncio->readfuncionario();

$validar = new Validar();
$createfuncionario = new Createfuncionario();


require_once __DIR__."/header.php";
?>
 <div class="page-content">
        <div class="page-header">
          <div class="container-fluid d-inline-flex">
            <h2 class="h5 no-margin-bottom"><?php echo $title; ?></h2>
            <button class="btn btn-success ml-auto" data-toggle="modal" data-target="#cad_fun">Cadastrar </button>
          </div>
        </div>
        <section class="no-padding-top no-padding-bottom">
          <div class="container-fluid">
              <div class="row"> 
              <?php
                foreach($readfun as $readf){

                
                ?>
            <div class="media bg-dark shadow p-3 mb-5 mx-3 bg-white rounded col">
                <img src="arquivos/<?php echo $readf['img'] ;?>" class="mr-3 rounded" alt="foto">
                <div class="media-body">
                  <h5 class="mt-0"><?php echo $readf['nome'] ;?></h5>
                  <p>Função:<?php echo $readf['cargo'] ;?></p>
                  <p>Whatsapp: <?php echo $readf['wpp'] ;?></p>
                  <p>Facebook: <?php echo $readf['fb'] ;?></p>
                  <p>Instagram: <?php echo $readf['inst'] ;?></p>
                  </div>
            </div>
              <?php 
                }
              ?>
            </div>
           </div>
        </section>
       </div>


        
  
  <div class="modal fade" id="cad_fun" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cadastrar Funcionário</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="col-lg-12">
                <div class="">
                  
                  <div class="block-body">



                  <?php
try {



if(isset($_POST['cadastrar'])){
  $post = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    if(in_array("",$post)){
        echo "<div class='alert alert-danger' role='alert'>Preencha todos os campos.</div>";
    }else{
    
      

      $mensagem = array();

      $formatosPermitidos = array("png","jpeg","jpg","JPG","PNG","JPEG");
      $extensao = pathinfo($_FILES['img']['name'], PATHINFO_EXTENSION);

      
      if(in_array($extensao, $formatosPermitidos)){

          $pasta = "arquivos/";

          $temporarios = $_FILES['img']['tmp_name'];
    

          $novoNome = md5(time()).".$extensao";
          
          if(move_uploaded_file($temporarios, $pasta.$novoNome)){

            $validar->setnome($post['nome']);
            $validar->setwpp($post['wpp']);
            $validar->setfb($post['fb']);
            $validar->setinst($post['inst']);
            $validar->setimg($novoNome);
            $validar->setcargo($post['cargo']);


            $createfuncionario->createfuncionario($validar);

              echo "<div class='alert alert-success' role='alert'>Enviado com Sucesso!</div>";
              
            $mensagem[] = "Feito com sucesso!";
          }else{
            $mensagem[] = "Erro ao utualizar!";
             
      }
    }
}  
  }
}catch(PDOException $erro){

  echo "Error menssage". $erro->getMessage();
  echo "Line Error". $erro->getLine();
  
}
?>

                  
  <form method="post"  enctype="multipart/form-data">
    <div class="form-group">
      <label class="form-control-label">Nome Completo</label>
      <input type="text" placeholder="Digite o nome" requered class="form-control" name="nome">
    </div>
   
    <div class="form-group">
      <label class="form-control-label">whatsapp</label>
      <input type="text" placeholder="@whatsapp" requered class="form-control" name="wpp">
    </div>
    <div class="form-group">
      <label class="form-control-label">Instagram</label>
      <input type="text" placeholder="@Instagram" requered class="form-control" name="inst">
    </div>
    <div class="form-group">
      <label class="form-control-label">Facebook</label>
      <input type="text" placeholder="@Facebook" requered class="form-control" name="fb">
    </div>
    <div class="form-group">
                      <label class="form-control-label">Função</label>
                      <select class="form-control bg-dark" name="cargo">
                            <option default value="Fundador">Fundador</option>
                            <option value="CO Fundador">CO Fundador</option>
                            <option value="Administrador">Administrador</option>
                            <option value="Moderador">Moderador</option>
                          </select>
                      </div>
    <div class="form-group">
      <label class="form-control-label">Escolha uma imagem</label>
      <input type="file" placeholder="Escolha uma imagem" class="form-control" name="img">
    </div>
    <div class="form-group">       
      <input type="submit" value="Cadastrar" class="btn btn-success" name="cadastrar">
    </div>
  </form>
                  </div>
                </div>
              </div>
      </div>
    </div>
  </div>
</div>

 <?php
require_once __DIR__."/footer.php";
?>
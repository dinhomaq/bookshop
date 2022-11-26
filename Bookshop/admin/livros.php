<?php 
require_once __DIR__."../../vendor/autoload.php";
$title = "livros";



use App\Controller\Createbook;
use App\Model\Validar;
use App\Controller\Readlivro;
use App\Controller\Delete;

$readlivro = new Readlivro();
$readliv = $readlivro->readlivro();

$validar = new Validar();
$createbook = new Createbook();

$Delete = new Delete();



require_once __DIR__."/header.php";
?>

      <!-- Sidebar Navigation end-->
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">
            <h2 class="h5 no-margin-bottom">Dashboard/<?php echo $title ?></h2>
            <button class="btn btn-success ml-auto" data-toggle="modal" data-target="#pub_destaque">
              Publicar
            </button>
          </div>
         
        </div>
        <section class="no-padding-top no-padding-bottom">
          <div class="container-fluid">
            <div class="row">
             
                <?php
                foreach($readliv as $readl){

                
                ?>
             <div class="card p-2 m-2  " style="width: 18rem;">
              <img src="arquivos/<?php echo $readl['img']; ?>"class="card-img-top" alt="Foto">
              <div class="card-body">
                <h3 class="card-title"><?php echo $readl['nome']; ?></h3>
                <p class="card-text"><?php echo $readl['autor']; ?></p>
                <p style="font-size:13px;"><?php echo $readl['categoria']; ?></p>
                <a href="#" class="btn btn-success"><i class="fa fa-edit"></i></a>
                <a href="livros?id=<?php echo $readl['id']; ?>" class="btn btn-primary"><i class="fa fa-trash-o"></i></a>
              </div>
                  
             
            </div>
            <?php

                }

               if(isset($_GET['id'])){
                $id = $_GET['id'];
                $delete = $Delete->delete($id);

               }

                ?>
            
            </div>
          </div>
        </section>
 <!-- Modal destaque -->

<div class="modal fade" id="pub_destaque" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Publicar Destaque</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="col-lg-12">
                <div class="">
                  
                  <div class="block-body">

                  <?php

if(isset($_POST['enviar'])){
  $post = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    if(in_array("",$post)){
        echo "<div class='alert alert-danger' role='alert'>Preencha todos os campos.</div>";
    }else{
    
      

      $mensagem = array();

      $formatosPermitidos = array("png","jpeg","jpg","JPG","PNG","JPEG");
      $extensao = pathinfo($_FILES['capa']['name'], PATHINFO_EXTENSION);

      $mensagem = array();
      $formatosPermitidosl = array("pdf","PDF");
      $extensaol = pathinfo($_FILES['livro']['name'], PATHINFO_EXTENSION);
      
      if(in_array($extensaol, $formatosPermitidosl) && in_array($extensao, $formatosPermitidos)){

          $pasta = "arquivos/";
          $pastab = "books/";

          $temporarios = $_FILES['capa']['tmp_name'];
          $temporariosl = $_FILES['livro']['tmp_name'];

          $novoNome = md5(time()).".$extensao";
          $novoNomel = md5(time()).".$extensaol";
          
          if(move_uploaded_file($temporarios, $pasta.$novoNome) && move_uploaded_file($temporariosl, $pastab.$novoNomel)){

            $validar->setnome($post['nome']);
            $validar->setautor($post['autor']);
            $validar->setlivro($novoNomel);
            $validar->setimg($novoNome);
            $validar->setcategoria($post['categoria']);
            $createbook->createbook($validar);

              echo "<div class='alert alert-success' role='alert'>Enviado com Sucesso!</div>";
              
            $mensagem[] = "Feito com sucesso!";
          }else{
            $mensagem[] = "Erro ao utualizar!";
             
      }
    }else{

    }
    echo "<div class='alert alert-danger' role='alert'>Formatos permitidos Imagem (png,jpeg,jpg,JPG,PNG,JPEG) Livro (pdf,PDF)</div>";
    }
      
  }
  
?>

                      <form method="post"  enctype="multipart/form-data">
                      <div class="form-group">
                        <label class="form-control-label">Titulo</label>
                        <input type="text" placeholder="@Título" class="form-control" name="nome">
                      </div>           
                      <div class="form-group">
                        <label class="form-control-label">Autor</label>
                        <input type="text" placeholder="@Nome do Autor" class="form-control" name="autor">
                      </div>
                      <div class="form-group">  
                        <label class="form-control-label">Categoria</label>     
                        <select class="form-control bg-dark" name="categoria">

                          <option default value="Banda desenhada">Banda desenhada</option>
                          <option value="Científicos">Científicos</option>
                          <option value="História">História</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label class="form-control-label">Escolha uma imagem</label>
                        <input type="file" placeholder="Escolha uma imagem" class="form-control" name="capa">
                      </div>
                      <div class="form-group">
                        <label class="form-control-label">Escolha um Livro</label>
                        <input type="file" placeholder="Escolha um Livro" class="form-control" name="livro">
                      </div>
                      
                      <div class="form-group">       
                        <input type="submit" value="Publicar" class="btn btn-success" name="enviar">
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
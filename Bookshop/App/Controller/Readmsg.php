<?php

 
 namespace App\Controller;
 
 use App\Db\Db;


 class Readmsg {

    public $id;
    public $tema;
    public $descricao;
    public $foto;
    public $data;
    public $categoria;
    public $funcionario;
 

    public function readmsg(){


      $sql = "SELECT id, nome, msg, email, objectivo from msg order by id desc";

      $stmt = Db::db()->prepare($sql);
      $stmt->execute();

          if($stmt->rowCount() > 0):
              $resultado = $stmt->fetchAll(\PDO::FETCH_ASSOC);
              return $resultado;
          else:
              return [];
          endif;

     /*
        $sql = "SELECT noticia.id, noticia.tema, noticia.descricao,noticia.foto, noticia.data, categoria.categoria, funcionario.nome from noticia join categoria on
        noticia.id = categoria.id join funcionario on noticia.id = funcionario.id";

        //$sql = "SELECT* FROM funcionario WHERE id = $iduser";
        $stmt = Db::db()->prepare($sql);
        $stmt->execute();
          $cont = $stmt->rowCount();
          if($cont > 0){

       
        $resultado = $stmt->fetch(\PDO::FETCH_ASSOC);

        $this->id = $resultado['id'];
        $this->tema = $resultado['tema'];
        $this->descricao = $resultado['descricao'];
        $this->foto = $resultado['foto'];
        $this->data = $resultado['data'];
        $this->categoria = $resultado['categoria'];
        $this->funcionario = $resultado['funcionario'];

        return $resultado;
      }*/
    }
 }





?>
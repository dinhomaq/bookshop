<?php

 
 namespace App\Controller;
 
 use App\Db\Db;


 class Readlivro {

    public $id;
    public $tema;
    public $descricao;
    public $foto;
    public $data;
    public $categoria;
    public $funcionario;
 

    public function readlivro(){


      $sql = "SELECT id, nome, img, livro, categoria, autor from apostilas order by id desc";

      $stmt = Db::db()->prepare($sql);
      $stmt->execute();

          if($stmt->rowCount() > 0):
              $resultado = $stmt->fetchAll(\PDO::FETCH_ASSOC);
              return $resultado;
          else:
              return [];
          endif;
    }


    public function readlivrobnd(){


        $sql = "SELECT id, nome, img, livro, categoria, autor from apostilas where categoria = 'Banda desenhada' order by id desc";
  
        $stmt = Db::db()->prepare($sql);
        $stmt->execute();
  
            if($stmt->rowCount() > 0):
                $resultado = $stmt->fetchAll(\PDO::FETCH_ASSOC);
                return $resultado;
            else:
                return [];
            endif;
      }

      public function readlivrocie(){


        $sql = "SELECT id, nome, img, livro, categoria, autor from apostilas where categoria = 'Científicos' order by id desc";
  
        $stmt = Db::db()->prepare($sql);
        $stmt->execute();
  
            if($stmt->rowCount() > 0):
                $resultado = $stmt->fetchAll(\PDO::FETCH_ASSOC);
                return $resultado;
            else:
                return [];
            endif;
      }

      public function readlivrohist(){


        $sql = "SELECT id, nome, img, livro, categoria, autor from apostilas where categoria = 'História' order by id desc";
  
        $stmt = Db::db()->prepare($sql);
        $stmt->execute();
  
            if($stmt->rowCount() > 0):
                $resultado = $stmt->fetchAll(\PDO::FETCH_ASSOC);
                return $resultado;
            else:
                return [];
            endif;
      }
 }





?>
<?php



namespace App\Controller;
use App\Db\Db;
use App\Model\Validar;


class Createbook{





    public function createbook(Validar $validar){



        $dados = array('nome' => $validar->getnome(), 'autor' => $validar->getautor(), 'img' => $validar->getimg(), 'livro' => $validar->getlivro(), 'categoria' => $validar->getcategoria());

        $nome = $dados['nome'];
        $img = $dados['img'];
        $livro = $dados['livro'];
        $categoria = $dados['categoria'];
        $autor = $dados['autor'];



        $sql = "INSERT INTO apostilas (nome, img, livro, categoria, autor) VALUES (:nome, :img, :livro, :categoria, :autor)";
        $stmt = Db::db()->prepare($sql);

        $exe = [
            'nome' => $nome,
            'img' => $img,
            'livro' => $livro,
            'categoria' => $categoria,
            'autor' => $autor

        ];

        $stmt->execute($exe);
    }
}



?>
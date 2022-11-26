<?php



namespace App\Controller;
use App\Db\Db;
use App\Model\Validar;


class Createfuncionario{





    public function createfuncionario(Validar $validar){



        $dados = array('nome' => $validar->getnome(), 'wpp' => $validar->getwpp(), 'img' => $validar->getimg(), 'fb' => $validar->getfb(), 'inst' => $validar->getinst() , 'cargo' => $validar->getcargo());

        $nome = $dados['nome'];
        $img = $dados['img'];
        $fb = $dados['fb'];
        $inst = $dados['inst'];
        $wpp = $dados['wpp'];
        $cargo = $dados['cargo'];



        $sql = "INSERT INTO equipe (nome, img, wpp, fb, inst, cargo) VALUES (:nome, :img, :wpp, :fb, :inst, :cargo)";
        $stmt = Db::db()->prepare($sql);

        $exe = [
            'nome' => $nome,
            'img' => $img,
            'wpp' => $wpp,
            'fb' => $fb,
            'inst' => $inst,
            'cargo' => $cargo

        ];

        $stmt->execute($exe);
    }
}



?>
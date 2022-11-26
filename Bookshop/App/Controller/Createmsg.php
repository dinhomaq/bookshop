<?php



namespace App\Controller;
use App\Db\Db;
use App\Model\Validar;


class Createmsg{





    public function createmsg(Validar $validar){



        $dados = array('nome' => $validar->getnome(), 'objectivo' => $validar->getobjectivo(), 'email' => $validar->getemail(), 'msg' => $validar->getmsg());

        $nome = $dados['nome'];
        $email = $dados['email'];
        $objectivo = $dados['objectivo'];
        $msg = $dados['msg'];



        $sql = "INSERT INTO msg (nome, msg, email, objectivo) VALUES (:nome, :msg, :email, :objectivo)";
        $stmt = Db::db()->prepare($sql);

        $exe = [
            'nome' => $nome,
            'msg' => $msg,
            'email' => $email,
            'objectivo' => $objectivo

        ];

        $stmt->execute($exe);
    }
}



?>
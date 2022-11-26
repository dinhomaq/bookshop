<?php 

namespace App\Model;




class Validar{

   private $id, $nome, $email, $objectivo, $msg, $categoria, $autor, $livro, $img, $wpp, $fb, $inst, $cargo;



   public function getid(){

    return $this->id;
}

public function setid($id){

    $id= filter_var($n, FILTER_SANITIZE_SPECIAL_CHARS);
    $this->id = $id;
}
    public function getnome(){

        return $this->nome;
    }

    public function setnome($n){

        $nome = filter_var($n, FILTER_SANITIZE_SPECIAL_CHARS);
        $this->nome = $nome;
    }


    public function getemail(){

        return $this->email;
    }

    public function setemail($e){

        $email = filter_var($e, FILTER_VALIDATE_EMAIL);
        $this->email = $email;
    }

    public function getobjectivo(){

        return $this->objectivo;
    }

    public function setobjectivo($o){

        $objectivo = filter_var($o, FILTER_SANITIZE_SPECIAL_CHARS);
        $this->objectivo = $objectivo;
    }
    

    public function getmsg(){

        return $this->msg;
    }

    public function setmsg($m){

        $msg = filter_var($m, FILTER_SANITIZE_SPECIAL_CHARS);
        $this->msg = $msg;
    }


    public function getcategoria(){

        return $this->categoria;
    }

    public function setcategoria($a){

        $categoria = filter_var($a, FILTER_SANITIZE_SPECIAL_CHARS);
        $this->categoria = $categoria;
    }


    public function getautor(){

        return $this->autor;
    }

    public function setautor($au){

        $autor = filter_var($au, FILTER_SANITIZE_SPECIAL_CHARS);
        $this->autor = $autor;
    }


    public function getlivro(){

        return $this->livro;
    }

    public function setlivro($l){

        $livro = filter_var($l, FILTER_SANITIZE_SPECIAL_CHARS);
        $this->livro = $livro;
    }



    public function getcargo(){

        return $this->cargo;
    }

    public function setcargo($c){

        $cargo = filter_var($c, FILTER_SANITIZE_SPECIAL_CHARS);
        $this->cargo = $cargo;
    }


    public function getimg(){

        return $this->img;
    }

    public function setimg($i){

        $img = filter_var($i, FILTER_SANITIZE_SPECIAL_CHARS);
        $this->img = $img;
    }



public function getwpp(){

    return $this->wpp;
}

public function setwpp($w){

    $wpp = filter_var($w, FILTER_SANITIZE_SPECIAL_CHARS);
    $this->wpp = $wpp;
}

public function getinst(){

    return $this->inst;
}

public function setinst($in){

    $inst = filter_var($in, FILTER_SANITIZE_SPECIAL_CHARS);
    $this->inst = $inst;
}


public function getfb(){

    return $this->fb;
}

public function setfb($fb){

    $fb = filter_var($fb, FILTER_SANITIZE_SPECIAL_CHARS);
    $this->fb = $fb;
}
}

?>
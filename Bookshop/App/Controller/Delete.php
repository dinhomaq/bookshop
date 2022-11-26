<?php

namespace App\Controller;

use App\Db\Db;
use App\Model\Validar;

class Delete{



    public function delete($id){

     

        $sql = "DELETE FROM apostilas WHERE id = $id";
        $stmt = Db::db()->prepare($sql);

        $stmt->execute();


    }

    public function deletemsg($idd){

     

        $sql = "DELETE FROM msg WHERE id = $idd";
        $stmt = Db::db()->prepare($sql);

        $stmt->execute();


    }
}
?>
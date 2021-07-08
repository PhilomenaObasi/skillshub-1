<?php
require_once 'config/config.php';

class DB {
    
    public static function created_at(){
        return date('M d Y H:s A');
    }

     public static function updated_at(){
        return date('M d Y h:i A');
    }






    //input sanitizer
    
    public static function grinder($input_name){
        
        return strip_tags(filter_input(INPUT_POST, $input_name, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH));
    }

    public static function email($input_name){
        
        return strip_tags(filter_input(INPUT_POST, $input_name, FILTER_SANITIZE_EMAIL));
    }
    
    
    
    
    public static function Count($row,$table){
        global $link;
        $sql = $link->prepare("select id from  {$table}");
        $sql->execute();
        return $sql->rowCount();
    }

    
   






    public static function select($table,$items,$where, $operand){
        global $link;
        $sql = $link-> prepare("select ". implode(",", $items) . " from $table where $where = :operand order by id desc");
        $sql->execute([':operand' => $operand]);
      return  $sql->fetchAll(PDO::FETCH_ASSOC);
        
        
    }
    
    
    public static function delete($table,$id){
        global $link;
        $sql = $link->prepare("DELETE FROM {$table}  WHERE id = :id");
        $sql->execute([':id' => $id]);
        if($sql->rowCount() > 0){
            return TRUE;
        } else {
            return FALSE;
        }
    }

    



    public static function check($table,$where, $operand){
        global $link;
        $sql = $link-> prepare("select id from $table where $where = :operand");
        $sql->execute([':operand' => $operand]);
      return  $sql->rowCount();
        
        
    }

    public static function checkDuplicate($table,$where, $operand,$cid){
        global $link;
        $sql = $link-> prepare("select id from $table where $where = :operand and cid =:cid");
        $sql->execute([':operand' => $operand, ':cid' => $cid]);
      return  $sql->rowCount();
        
        
    } 



    public static function insert($table, $data) {
        try {
             global $link;
        $sql = "INSERT INTO $table (".implode(', ', array_keys($data))  .")VALUES(". ':' . implode(', :', array_keys($data))  .")";
        //$sql = sprintf('insert into %s (%s) values(%s)', $table, implode(', ', array_keys($data)),':' . implode(', :', array_keys($data)));
        $query = $link->prepare($sql);
        $run = $query->execute($data)or die(print_r($sql->errorInfo(), true));
        if ($run) {
            return true;
        } else {

            return false;
        }
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        }

        
        public static function QueryBuilder($sql){
             global $link;
        $sql = $link-> prepare($sql);
        $sql->execute();
      return  $sql->fetchAll(PDO::FETCH_ASSOC);
        }
}

<?php



/**
 * Description of DbConnection
 *
 * @author Team_One+
 */
class DbConnection {
    
 
    public   function database_close() {
        if(!mysqli_close($this->database_connection)) die ("Connection close failed.");
           
    } 

    //_________________________________________________________________________________________Query And Encode

    //return  Assoc Array mysqli_result Object with the num of row and field
    public function database_query($database_query) {
        $this->encode();
        $query_result = mysqli_query($this->database_connection,$database_query);
        return $query_result;
    }

    //return Assoc inside index Array of Query result
    public function fetch($database_result) {
        $array_return=array();
        while ($row = mysqli_fetch_assoc($database_result)) {
            $array_return[] = $row;
        }
        return $array_return;
    }
    
    public  function encode(){
        mysqli_query($this->database_connection,"SET NAMES utf8");
    }
    
    
} 

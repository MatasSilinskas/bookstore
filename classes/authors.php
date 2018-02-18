<?php

class Authors {    
    static function get_author_full_name($author_id) {
        $builder = new Custom_query_builder();
        $builder->select("Authors", "First_name, Last_name");
        $builder->where("Id", $author_id);
        $result = $builder->execute();        
        $author = $result->fetch_assoc();
        return $author['First_name'] . " " . $author["Last_name"];
    } 
}

?>
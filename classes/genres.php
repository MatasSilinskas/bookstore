<?php

class Genres {    
    static function get_genre($genre_id) {
        $builder = new Custom_query_builder();
        $builder->select("Genres", "Genre");
        $builder->where("Id", $genre_id);
        $result = $builder->execute();
        $genre = $result->fetch_assoc();
        return $genre['Genre'];
    }
    
    static function all_genres() {
        $builder = new Custom_query_builder();
        $builder->select("Genres", "Id, Genre");
        return $builder->execute();
    }
}

?>
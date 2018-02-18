<?php

class Books {
    private $database;
    public $number_of_items;
    function __construct() {
        $this->database = new Database();
    }
    
    static function get_book($id) {
        $builder = new Custom_query_builder();       
        $builder->select("Books", "Id, Title, Release_date, Price, Pages, Description");
        $builder->where("Id", $id);
        $result = $builder->execute();
        return $result->fetch_assoc();
    }
    
    static function get_book_authors($id) {
        $builder = new Custom_query_builder();       
        $builder->select("Author_Book", "Author_id");
        $builder->where("Book_id", $id);        
        $author_ids = $builder->execute();
        $authors = "";
        while($row = $author_ids->fetch_assoc()) {
            $author_id = $row['Author_id'];
            $author = Authors::get_author_full_name($author_id);
            $authors .= $author . ", "; 
        }
        return substr($authors, 0, -2);
    }    
    
    static function get_book_genres($id) {
        $builder = new Custom_query_builder();       
        $builder->select("Genre_Book", "Genre_id");
        $builder->where("Book_id", $id);     
        $genre_ids = $builder->execute();
        $genres = "";
        while($row = $genre_ids->fetch_assoc()) {
            $genre_id = $row['Genre_id'];
            $genre = Genres::get_genre($genre_id);
            $genres .= $genre . ", "; 
        }
        return substr($genres, 0, -2);
    }
    
    function get_limited_items_by_search($start, $amount, $search = "") {
        $builder = new Custom_query_builder();  
        $builder->select("Books", "Books.Id, Title, Release_date, Price, Pages, Description");       
        
        $filter = "";
        if(isset($_POST['filter'])) {
            $filter = $_POST['filter'];
            $_SESSION['filter'] = $filter;
        } 
        elseif(isset($_SESSION['filter'])) {
            $filter = $_SESSION['filter'];
        }
        
        if(!isset($_POST['search'])) {
            if($filter != "") {
                $builder->join_on("Genre_Book", "Book_id", "Books.Id");
                $builder->and_where("Genre_id", $filter);
                $_SESSION['search'] = null;
            }
        }              
        elseif($search != "") {
            $builder->like("Title", $search);
            $builder->like("Description", $search, "OR");
            $_SESSION['filter'] = null;
        } 
        
        $result = $builder->execute();
        $this->number_of_items = $result->num_rows;
        
        $builder->limit($start, $amount);
        return $builder->execute();
    }
}

?>

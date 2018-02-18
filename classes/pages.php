<?php

class Pagination {
    public $items_per_page = 5;
    public $item_class;
    public $max_page;
    public $current_page;
    public $surrounding_blocks = 2;
    
    function __construct($item_class) {
        $this->item_class = $item_class;        
        if (!isset($_GET['page'])) {
            $this->current_page = 1;
        }
        else {
            $this->current_page = $_GET['page'];
        }
    }
    function is_valid() {
        if ($this->current_page <= $this->max_page && $this->current_page >= 1) {
            return true;
        }
        else {
            return false;
        }
    }
    function page_items() {        
        $search = "";
        if(isset($_POST['search'])) {
            $search = $_POST['search'];
            $_SESSION['search'] = $search;
        } 
        elseif(isset($_SESSION['search'])) {
            $search = $_SESSION['search'];
        }     
        $start = ($this->current_page - 1) * $this->items_per_page;
        $result = $this->item_class->get_limited_items_by_search($start, $this->items_per_page, $search);
        
        $this->max_page = ceil($this->item_class->number_of_items / $this->items_per_page);
        
        return $result;
    }
    function previous_page() {
        return $this->current_page - 1;
    }
    function next_page() {
        return $this->current_page + 1;
    }
    function previous_exists() {
        if($this->current_page != 1) {
            return true; 
        }
        else {
            return false;
        }
    }
    function next_exists() {
        if($this->current_page != $this->max_page) {
            return true; 
        }
        else {
            return false;
        }       
    }
    function is_active($page) {
        if($page == $this->current_page) {
            return true;
        }
        else {
            return false;
        }
    }    
    
    function needs_paging() {
        if($this->max_page > 1) {
            return true;
        }
        else {
            return false;
        }
    }
    function page_values() {
        $pages = array();
        array_push($pages, 1);        
        
        if($this->current_page - $this->surrounding_blocks > 2) {
            array_push($pages, "...");
        }
        
        for($i = $this->current_page - $this->surrounding_blocks; $i < $this->current_page; $i++) {
            if($i > 1) {
                array_push($pages, $i);
            }
        }
        
        for($i = $this->current_page; $i <= $this->surrounding_blocks + $this->current_page; $i++) {
            if($i < $this->max_page && $i > 1) {
                array_push($pages, $i);
            }
        }
        
        if(!in_array($this->max_page - 1, $pages)) {
            array_push($pages, "...");
        }
        if(!in_array($this->max_page, $pages)) {
            array_push($pages, $this->max_page);
        }
        return $pages;
    }
}

?>
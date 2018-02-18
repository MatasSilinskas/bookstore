<?php
class Data {
    public $number_of_items;
    
    function get_limited_items_by_search($start, $amount, $search = "") {
        $builder = new Custom_query_builder();       
        $builder->select("Data", "Id, Order_date, Book_id, Status, Email, Address, Zip_code, City");
        
        if($search != "") {
            $builder->like("Status", $search);
            $builder->like("Email", $search, "OR");
            $builder->like("Address", $search, "OR");
            $builder->like("City", $search, "OR");
        }
        
        $result = $builder->execute();
        $this->number_of_items = $result->num_rows;
        
        if(isset($_GET['column']) && isset($_GET['order'])) {            
            $builder->order_by($_GET['column'], $_GET['order']);
        }
        
        $builder->limit($start, $amount);
        return $builder->execute();
    }
    
    static function order_book($book_id, $email, $address, $zip_code, $city) {        ;
        $order_date = date("Y-m-d");
        $status = "Waiting for confirmation";
        $builder = new Custom_query_builder();
        
        $builder->insert("Data", "Order_date, Book_id, Status, Email, Address, Zip_code, City", [$order_date, $book_id, $status, $email, $address, $zip_code, $city]);
        $builder->execute();
        return true;
    }
    static function status_action($status) {
        if($status == "Waiting for confirmation") {
            return "Accept";
        }        
        elseif($status == "In progress") {
            return "Complete";
        }        
        else return "";
    }
    static function accept_order($id) {
        $builder = new Custom_query_builder(); 
        $builder->update('Data', 'Status', "In progress");
        $builder->where('Id', $id);
        $builder->and_where('Id', $id);
        if($builder->execute()) {
            return true;
        }
        else {
            return false;
        }
        
    }
    static function complete_order($id) {
        $builder = new Custom_query_builder(); 
        $builder->update('Data', 'Status', "Completed");
        $builder->where('Id', $id);
        if($builder->execute()) {
            return true;
        }
        else {
            return false;
        }        
    }
}

?>
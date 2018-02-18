<?php
class Custom_query_builder {
    private $query = "";
    private $database;
    private $params;
    
    function __construct() {
        $this->database = new Database();
        $this->params = array();
    }
    
    function select($table_names, $column_names) {
        $this->query .= "SELECT $column_names FROM $table_names ";
    }
    
    function select_count($table_name) {
        $this->query .= "SELECT COUNT(*) as 'total' FROM $table_name ";
    }
    
    function where($column, $value) {        
        $this->query .= "WHERE $column = ? ";
        array_push($this->params, $value);
    }    
    
    function and_where($column, $value) {
        $this->query .= "AND $column = ? ";
        array_push($this->params, $value);
    }     
    
    function join_on($table_name, $column, $value) {
        $this->query .= "JOIN $table_name ON $column = $value ";
    }     
    
    function like($column, $value, $clause = "WHERE") {
        $this->query .= "$clause $column LIKE '%$value%' ";
    }
    
    function limit($start, $amount) {
        $this->query .= "LIMIT {$start}, {$amount} ";
    }
    
    function order_by($column_name, $order) {
        $this->query .= "ORDER BY {$column_name} {$order} ";
    } 
    
    function insert($table_name, $columns, $values) {
        $question_marks = "";
        foreach($values as $value) {
            array_push($this->params, $value);
            $question_marks .= "?, ";
        }
        $question_marks = substr($question_marks, 0, -2);
        $this->query .= "INSERT INTO $table_name($columns) VALUES($question_marks) ";
    }
    
    function update($table_name, $column_name, $value){
        $this->query .= "UPDATE $table_name SET $column_name = ? ";
        array_push($this->params, $value);
    }   
        
    function execute() {
        $stmt = Database::$db->prepare($this->query);
        if(!$stmt) {
            header('Location: ./error');
        }
        $param_types = "";
        $count = count($this->params);
        
        if ($count > 1) {
            for($i = 0; $i < $count; $i++) {
                $param_types .= "s";
            } 
            $binding = $stmt->bind_param($param_types, ...$this->params);
        }
        elseif($count == 1) {
            $binding = $stmt->bind_param("s", $this->params[0]);
        }
        
        if(isset($binding) && !$binding) {
            header('Location: ./error');
        }
        $execution = $stmt->execute(); 
        
        if(!$execution) {
            header('Location: ./error');
        }
        $result = $stmt->get_result();
        return $result;
    }
}
?>
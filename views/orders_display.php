<?php
?>
<table class="table table-inbox table-hover table-responsive" style="border-top-right-radius: 25px;
    border-top-left-radius: 25px;">
    <tbody >
        <tr class="unread" >
            <?php
            if(isset($_GET['column']) && isset($_GET['order'])) {
                $ordered_by = $_GET['column'];
                $order = $_GET['order'];
                $params="&column={$ordered_by}&order={$order}";
            }
            else {
                $order = "ASC";
                $ordered_by = "Id";
                $params = "";
            }

            $column = "Id";
            include "views/orders_table_header.php";
            echo "<td>Book</td>";
            $column = "Order_date";
            include "views/orders_table_header.php";            
            $column = "Email";
            include "views/orders_table_header.php";
            $column = "Address";
            include "views/orders_table_header.php";
            $column = "Zip_code";
            include "views/orders_table_header.php";
            $column = "City";
            include "views/orders_table_header.php";            
            $column = "Status";
            include "views/orders_table_header.php";
            ?>
            <td>Change Status</td>
        </tr>
        
        <?php
        while($row = $orders->fetch_assoc()) {
            $id = $row['Id'];
            echo "<tr>";
            echo "<td>{$id}</td>";
            $book = Books::get_book($row['Book_id']);
            $book_title = $book['Title'];
            echo "<td>{$book_title}</td>";
            echo "<td>{$row['Order_date']}</td>";
            echo "<td>{$row['Email']}</td>";
            echo "<td>{$row['Address']}</td>";
            echo "<td>{$row['Zip_code']}</td>";
            echo "<td>{$row['City']}</td>";
            
            $status = $row['Status'];
            echo "<td>{$status}</td>";
            $action = Data::status_action($status);            
            echo "<td>";
            if($action != "") {
                echo "<form action='orders' method='post'>";
                echo "<input type='hidden' name='action' value='{$action}'>";
                echo "<input type='hidden' name='order_id' value={$id}>";
                echo "<button type='submit' class='btn btn-primary' name='status_change'>{$action}</button>";
                echo "</form>";
            }
            else {
                echo "Completed order status can`t be changed.";
            }
            echo "</td>";
            echo "</tr>";
        }   ?>        
    </tbody>
</table>
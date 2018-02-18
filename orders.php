<?php
include "views/header.php";
?>
<div class="container">
    <div class="mail-box">
        <aside class="lg-side">
           <?php 
            session_start();

            if(isset($_POST['status_change'])) {
                if($_POST['action'] == 'Accept') {
                    Data::accept_order($_POST['order_id']);
                }       
                elseif($_POST['action'] == 'Complete') {
                    Data::complete_order($_POST['order_id']);
                }
            };
            $data = new Data();
            $pagination = new Pagination($data);
            $orders = $pagination->page_items();
            if(!$pagination->is_valid()) {
                header('Location: ./orders');
            }
            ?>
            <div class="inbox-head">                       
                <?php 
                include "views/page_links.php";                   
                $search_action = "orders";
                include "views/search_form.php"; 
                ?>
            </div>
            <div class="mail-option">
                <?php 
                if($data->number_of_items > 0) {
                    include "views/orders_display.php";
                }
                else {
                    echo "<h2 class='text-center'>Sorry, there is no items according to your search</h2>";
                }
                ?>
            </div>
        </aside>
    </div>          
    <?php 
    $url = "orders";
    include "views/pages_view.php"; 
    ?>
</div>
<?php include "views/footer.php"; ?>


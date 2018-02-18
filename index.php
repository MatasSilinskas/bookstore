<?php
include "views/header.php";
?>
    <div class="container">
        <div class="mail-box">
            <aside class="lg-side">
               <?php 
                session_start();
                $book = new Books();
                $pagination = new Pagination($book);
                $pagination->items_per_page = 6;
                $books = $pagination->page_items();
                if(!$pagination->is_valid()) {
                    header('Location: ./index');
                }
                ?>
                <div class="inbox-head">                       
                    <?php include "views/page_links.php"; ?>
                    <?php                     
                    $search_action = "index";
                    include "views/search_form.php"; 
                    ?>
                </div>
                <div class="mail-option">             
                    <?php include "views/genre_dropdown.php"; ?>
                    <?php 
                    if($book->number_of_items > 0) {
                        include "views/books_display.php"; 
                    }
                    else {
                        echo "<h2 class='text-center'>Sorry, there is no items according to your search</h2>";
                    }
                    ?>
                </div>
            </aside>
        </div>          
        <?php 
        $url = "index";
        $params = "";
        include "views/pages_view.php"; 
        ?>
</div>
<?php include "views/footer.php"; ?>


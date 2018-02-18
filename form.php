<?php include "views/header.php"; ?>

<div class="container">
    <div class="mail-box">
        <aside class="lg-side">
            <div class="inbox-head">
                <?php include "views/page_links.php"; ?>
            </div>
            <div class="mail-option">
            <?php
            $books = new Books();
            $book_id = $_GET['book'];
            $book = $books->get_book($book_id);

            $authors = Books::get_book_authors($book_id);
            $genres = Books::get_book_genres($book_id);
            $title = $book['Title'];
            $release_date = $book['Release_date'];
            $pages = $book['Pages'];
            $description = $book['Description'];
            $price = $book['Price'];     
            
            echo "<span class='pull-left'>";
            include "views/book_info.php";
            echo "</div></div></span>";
            include "views/order_form.php";
            ?>
                    
            </div>
        </aside>
    </div>
    <?php
    if(isset($_POST['order'])) {
        $email = $_POST['email'];
        $address = $_POST['address'];
        $zip_code = $_POST['zip'];
        $city = $_POST['city'];
        if(Data::order_book($book_id, $email, $address, $zip_code, $city)){
            echo "<h3>Ordering was succesful. Go back to <a href='index'>Bookstore</a> or 
            <a href='orders'>View orders</a></h3>";
        }
    }
    ?>
</div>
<?php include "views/footer.php"; ?>
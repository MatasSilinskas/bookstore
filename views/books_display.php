<?php
while($row = $books->fetch_assoc()) {
    $id = $row['Id'];        
    $authors = Books::get_book_authors($id);
    $genres = Books::get_book_genres($id);
    $title = $row['Title'];
    $release_date = $row['Release_date'];
    $pages = $row['Pages'];
    $description = $row['Description'];
    $price = $row['Price'];

    echo "<span class='pull-left'>";
    include "views/book_info.php";
?>

<div class="modal-footer text-center">
    <a href="form?book=<?php echo $id;?>" class="btn btn-primary" ng-click="ok">Order</a>
</div>

<?php echo "</div></div></span>"; } ?>
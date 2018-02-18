<form class="form-inline form-group" action="#" method="post">
    <select name="filter" class="form-control selector" style="width: 300px;">
        <li><option value=""></option></li>
        <?php
        $genres = Genres::all_genres();
        while($row = $genres->fetch_assoc()) {
            echo "<li><option value='{$row['Id']}' ";
            if(isset($_SESSION['filter']) && $_SESSION['filter'] == $row['Id']) {
                echo "selected='selected'";
            }
            echo ">{$row['Genre']}</option></li>";
        }      
        ?>
    </select>
    <button type="submit" class="btn btn-primary">Filter By Genre</button>
</form>   
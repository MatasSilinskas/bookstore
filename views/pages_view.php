<div class="text-center">
    <div class="pagination">
       
        <?php 
        
        if($pagination->needs_paging()) {
            if($pagination->previous_exists()) {
                echo "<a href='{$url}?page={$pagination->previous_page()}{$params}'><h4>&laquo;</h4></a>";
            }
            foreach ($pagination->page_values() as $value) {
                if($value == "...") {
                    echo "<a><h4>...</h4></span>";
                }
                else {
                    echo "<span><a href='{$url}?page={$value}{$params}' ";
                    if ($pagination->is_active($value)) {
                        echo "class='active'";
                    }
                echo "><h4>{$value}</h4></a></span>";
                }
            }
            if($pagination->next_exists()) {
                echo "<a href='{$url}?page={$pagination->next_page()}{$params}'><h4>&raquo;</h4></a>";
            }
        }?>
    </div>
</div>
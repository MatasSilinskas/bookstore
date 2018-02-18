<?php

echo "<td style='height:75px'>" . str_replace("_", " ", $column);
echo "<a class='pull-right' style='color:black;' href='orders?column={$column}&order=";

if($ordered_by == $column && $order == "ASC") {
    echo "DESC'>";
}
else {
    echo "ASC'>";
}
echo "<i class='fas fa-sort' style='width:30px;'></i></a></td>";
?>
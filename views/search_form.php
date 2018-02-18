<form action="<?php echo $search_action;?>" method="post" class="pull-right position">
    <div class="input-append">
        <input name="search" type="text" class="sr-input" placeholder="Search..." <?php if(isset($_SESSION['search'])) echo " value='{$_SESSION['search']}'" ?>>
        <button name="submit" class="btn sr-btn" type="submit"><i class="fa fa-search"></i></button>
    </div>
</form>
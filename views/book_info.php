<!------ Include the above in your HEAD tag ---------->

<div class="modal-dialog" ng-class="modal-buy" style="width:350px;">
   <div class="modal-content" uib-modal-transclude="" style='height:525px;'>
       <div class="modal-header ng-scope">
            <h4 class="modal-title text-center"><?php echo $title;?></h4>
        </div>
        <div class="modal-body" ng-scope>
            <div class="container-fluid">
                <div class="row text-center">
                    <div class="col-sm-12">Release date: <strong><?php echo $release_date;?></strong></div>
                </div>
                <div class="row text-center">
                    <div class="col-sm-12">Authors: <strong><?php echo $authors;?></strong></div>
                </div>        
                <div class="row text-center">
                    <div class="col-sm-12">Genres: <strong><?php echo $genres;?></strong></div>
                </div>
                <div class="row text-center">
                    <div class="col-sm-12">Pages: <strong><?php echo $pages;?></strong></div>
                </div>                
                
                <div class="row crop" title="<?php echo $description;?>">
                    <div class="col-sm-12"><br><?php echo $description;?></div>
                </div>
                
                <div class="row">
                    <div class="pull-right">
                        <h3><strong><?php echo $price;?> €</strong></h3>
                    </div>
                </div>
            </div>
        </div>
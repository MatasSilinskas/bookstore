<span class="pull-left">
    <form action="form?book=<?php echo $book_id;?>" method="post" class="form-horizontal">  
        <div class="modal-dialog" ng-class="modal-buy" style="width:600px;">
           <div class="modal-content" uib-modal-transclude="" >
               <div class="modal-header ng-scope">
                    <h4 class="modal-title">Order form</h4>
                </div>
                <div class="modal-body ng-scope">
                    <div class="container-fluid">
                        <div class="control-group">
                            <label for="email" class="control-label">	
                                E-Mail 
                            </label>
                            <div class="controls">
                                <input name="email" type="email" class="form-control" required>
                            </div>
                        </div>

                        <div class="control-group">
                            <label for="email" class="control-label">	
                                Street Address
                            </label>
                            <div class="controls">
                                <input name="address" placeholder="Street name, 01" type="text" class="form-control" required>            
                            </div>   
                        </div>

                        <div class="control-group">
                            <label for="zip" class="control-label">	
                                Zip Code
                            </label>
                            <div class="controls">
                                <input name="zip" type="number" class="form-control" required>
                            </div>
                        </div>

                        <div class="control-group">
                            <label for="city" class="control-label">	
                                City
                            </label>
                            <div class="controls">
                                <input name="city" type="text" class="form-control" required>
                            </div>
                        </div>

                        <div align="center" style="padding-top:10px">
                            <button type="submit" name="order" class="btn btn-primary">Order</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
                
                
                

    </form>
</span>
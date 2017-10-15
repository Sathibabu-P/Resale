
    <div id="page-wrapper" >
        <div id="page-inner">
            <div class="row">
              
                <div class="col-md-12">          
                <?php 
                    if(isset($_GET['action']) && !empty($_GET['action']) && $_GET['action'] == 'add'){
                              include 'listings/add.php';
                    } elseif(isset($_GET['action']) && !empty($_GET['action']) && $_GET['action'] == 'edit'){
                              include 'listings/edit.php';
                    } else {  include 'listings/list.php';   }
                ?>
                </div>
            </div>
        </div>
    </div>

<?php
include_once 'app/views/share/header.php';
?>

<?php
    if(isset($errors)){
        echo"<url>";
        foreach($errors as $err){
            echo"<li>$err</li>";
        }
        echo"</ul>";

    }
?>
    <div class=" card-body p-5">
     <form class="user" action="/chieu2/product/save" method="post" enctype="multipart/form-data">
     <input type="hidden" name ="id" value = "<?=$product -> id?>" >  
     
     <div class="form-group row">
             <div class="col-sm-6 mb-3 sb-sm-0">
                <input value="<?=$product -> name?>" type="text" class="form-control form-control-user" id="name" name="name">
             </div>
             <div class="col-sm-6 mb-3 sb-sm-0">
                <input value="<?=$product -> price?>" type="number" class="form-control form-control-user" id="price" name="price">
             </div>
        </div>
        <div class="form-group row">
             <div class="col-sm-6 mb-3 sb-sm-0">
                <input value="<?=$product -> description?>" type="text" class="form-control form-control-user" id="description" name="description">
             </div>
             <div class="form-group">
             <?php
                if(empty($product -> image) || !file_exists($product -> image)){
                    echo "No Image";
                        }else{
                             echo"<img src = '/chieu2/".$product -> image."'alt =''/>";
                            }

                 ?>
             </div>
             <div class="col-sm-6 mb-3 sb-sm-0">
                <input type="file" class="form-control form-control-user" id="image" name="image">
             </div>
        </div>      
        <button class="btn btn-primary btn-user btn-block">
            Save product
        </button>

        </form>
   </div>

<?php
include_once 'app/views/share/footer.php';
?>

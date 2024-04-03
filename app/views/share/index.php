<?php
include_once 'app/views/share/header.php';
?>

<div class="card shadow mb-4">
                    <div class="row">
                    <a href="/chieu2/product/add" class="btn btn-primary btn-icon-split">
                         <span class="icon text-white-50">
                            <i class="fas fa-flag"></i>
                         </span>
                    <span class="text">Add Product</span>
                     </a>
                     </a>
                    </a>
                        <div class="card-header py-3">
                        </div>
                        <div class="card-body">

                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php while ($row = $products -> fetch(PDO::FETCH_ASSOC)): ?>
                                        <tr>
                                             <th><?= $row['id'] ?></th>
                                             <th>
                                             <a class="Btn btn-danger" href="/chieu2/cart/add/<?= $row['id'] ?>">Addtocart</a>
                                             </th>
                                             <th><?= $row['name'] ?></th>
                                             <th><?= $row['description'] ?></th>
                                             <th>
                                               <?php
                                                if(empty($row['image']) || !file_exists($row['image'])){
                                                    echo "No Image";
                                                }else{
                                                    echo"<img src = '/chieu2/".$row['image']."'alt =''/>";
                                                }

                                               ?>
                                            </th>
                                                <th><?= $row['id'] ?></th>
                                             <th>
                                             <a href="/chieu2/product/edit/<?= $row['id'] ?>">
                                             EDIT
                                            </th>
                                            <th>
                                             </a>
                                             <a href="#" class="delete-product" data-id="<?= $row['id'] ?>">DELETE</a>
                                             </th>
                                             
                                          </tr>
                                    <?php endwhile; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                    <div class="col-sm-12 col-md-5">
                        <div class="dataTables_info" id="dataTable_info" role="status" aria-live="polite">Showing 1 to
                            10 of 57 entries</div>
                    </div>
                    <div class="col-sm-12 col-md-7">
                        <div class="dataTables_paginate paging_simple_numbers" id="dataTable_paginate">
                            <ul class="pagination">
                                <li class="paginate_button page-item previous disabled" id="dataTable_previous"><a href="#" aria-controls="dataTable" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li>
                                <li class="paginate_button page-item active"><a href="#" aria-controls="dataTable" data-dt-idx="1" tabindex="0" class="page-link">1</a></li>
                                <li class="paginate_button page-item "><a href="#" aria-controls="dataTable" data-dt-idx="2" tabindex="0" class="page-link">2</a></li>
                                <li class="paginate_button page-item "><a href="#" aria-controls="dataTable" data-dt-idx="3" tabindex="0" class="page-link">3</a></li>
                                <li class="paginate_button page-item "><a href="#" aria-controls="dataTable" data-dt-idx="4" tabindex="0" class="page-link">4</a></li>
                                <li class="paginate_button page-item "><a href="#" aria-controls="dataTable" data-dt-idx="5" tabindex="0" class="page-link">5</a></li>
                                <li class="paginate_button page-item "><a href="#" aria-controls="dataTable" data-dt-idx="6" tabindex="0" class="page-link">6</a></li>
                                <li class="paginate_button page-item next" id="dataTable_next"><a href="#" aria-controls="dataTable" data-dt-idx="7" tabindex="0" class="page-link">Next</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
</div>    
</div>



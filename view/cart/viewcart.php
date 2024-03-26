
<div class="my_cart">
    <div class="container">
        <div id="cart">
            <div class="row">
                <div class="col-7">
                    <div class="card shadow mb-3 mt-3">
                        <div class="card-header py-3">
                            <h5 class="m-0 font-weight-bold text-primary">Giỏ Hàng</h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <?php
                                            viewcart();
                                        ?>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-5">
                    <div class="card shadow mb-3 mt-3">
                        <div class="card-header py-3">
                            <h5 class="m-0 font-weight-bold text-primary">Chi Tiết Giỏ Hàng</h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        
                                        <?php
                                            viewChiTietCart();
                                        ?>
                                    </thead>
                                </table>
                                <div class="container">
                                    <div class="row justify-content-end">
                                        <div class="col-auto">
                                            <a href="index.php?act=bill" class="text-decoration-none ">
                                                <input type="button" value="Thanh Toán">
                                            </a>    
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>





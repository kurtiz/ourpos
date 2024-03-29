<?= $this->extend("layouts/base"); ?>
<!-- NOTE This keeps this page in the "content" placeholder in the layouts/base.php file  -->
<?= $this->section("content"); ?>
<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Receipt | Our Pos</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="<?= base_url(); ?>/public/favicon.ico" type="image/x-icon" />

    <link rel="manifest" href="<?=base_url(); ?>/public/manifest.json">
    <link rel="apple-touch-icon" href="<?php base_url(); ?>public/favicon.ico" type="image/x-icon" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#404E67"/>
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="Hello World">
    <meta name="msapplication-TileImage" content="<?php base_url(); ?>public/favicon.ico">
    <meta name="msapplication-TileColor" content="#FFFFFF">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,600,700,800" rel="stylesheet">

    <link rel="stylesheet" href="<?= base_url(); ?>/public/plugins/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/public/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/public/plugins/ionicons/dist/css/ionicons.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/public/plugins/icon-kit/dist/css/iconkit.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/public/plugins/perfect-scrollbar/css/perfect-scrollbar.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/public/dist/css/theme.min.css">
    <script src="<?= base_url(); ?>/public/src/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
<?//=var_dump(json_decode($sale->taxes, true));
//exit;?>
<?= $this->include("widgets/loading_overlay"); ?>
<div class="wrapper">

    <!-- // NOTE THE TOP BAR IS SUPPOSED TO BE HERE  -->

    <?= $this->include("widgets/topbar"); ?>

    <div class="page-wrap">

        <!-- NOTE THE LEFT-SIDE BAR IS SUPPOSED TO HERE -->
        <?= $this->include("widgets/left-sidebar"); ?>

        <div class="main-content">
            <div class="container-fluid">
                <div class="page-header">
                    <div class="row align-items-end">
                        <div class="col-lg-8">
                            <div class="page-header-title">
                                <i class="ik ik-file-text bg-blue"></i>
                                <div class="d-inline">
                                    <h5>Sales Receipt</h5>
                                    <span>Receipt </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <nav class="breadcrumb-container" aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="<?= base_url(); ?>/dashboard"><i class="ik ik-home"></i></a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <a href="#">Store</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Receipt</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h3 class="d-block w-100">
                            <img src="<?=base_url()?>/public/src/img/brand.png" height="50" alt="logo">
                            <small class="float-right">
                                Date: <?=$sale->fulldate?>
                            </small>
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="row invoice-info">
                            <div class="col-sm-4 invoice-col">
                                Store:
                                <address>
                                    <strong>
                                        <?=$store_data->store_name?>
                                    </strong><br>
                                    <?=$store_data->address?><br>
                                    <?=$store_data->mobile?><br>
                                    <?=$store_data->email?>
                                </address>
                            </div>
                            <div class="col-sm-4 invoice-col">
                                To:
                                <address>
                                    <?php if(!empty($customerDetails)):?>
                                    <strong>
                                        <?=$customerDetails[0]['customer_name']?>
                                    </strong><br>
                                        Phone: <?=$customerDetails[0]['mobile']?><br>
                                        Email: <?=$customerDetails[0]['email']?>
                                    <?php endif?>
                                </address>
                            </div>
                            <div class="col-sm-4 invoice-col">
                                <b>Receipt No.: </b><?=$sale->receipt_num?>
                                <?php if ($sale->pending_status == 1):?>
                                    <span class="badge badge-warning">Pending</span>
                                <?php endif;?>
                                <br>
                                <?php if ($store_data->salesCount == "on"):?>
                                <b>Order No.:</b> <?=$sale->salesCount?><br>
                                <?php endif;?>
                                <b>Payment Due: </b> <?=(empty($sale->sale_close_date)) ? "Not Yet":
                                    str_replace(",", " ",$sale->sale_close_date)?>
                                <br>
                                <b>Sales Rep :</b>
                                <a href="<?=base_url()?>/users/view/<?=$userdata->user_id?>" style="color: #0f38ff">
                                    <?=$userdata->name?>
                                </a>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>Qty</th>
                                        <th>Product</th>
                                        <!--<th>Category</th>-->
                                        <th>Unit Price (GHc.)</th>
                                        <th>Subtotal (GHc.)</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $count = count($saleDetails);
                                    for($i = 0; $i < $count; $i++) :?>
                                        <tr>
                                            <td><?=$saleDetails[$i]['quantity']?></td>
                                            <td><?=$saleDetails[$i]['product']?></td>
<!--                                            <td>--><?//=$saleDetails[$i]['cat_name']?><!--</td>-->
                                            <td><?=$saleDetails[$i]['price']?></td>
                                            <td class="amount"><?=$saleDetails[$i]['amount']?></td>
                                        </tr>
                                    <?php endfor;?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <p class="lead">Amount Due <?=$sale->date_sold?></p>
                                <div class="table-responsive">
                                    <table class="table">
                                        <tr>
                                            <th style="width:50%">Subtotal:</th>
                                            <td>
                                                GHc.
                                                <span id="subtotal">
                                                    <?=$sale->subtotal?>
                                                </span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <?php if ($sale->vat_status): ?>
                                            <th>Vat(<?=$sale->vat?>%):</th>
                                            <td>
                                                GHc.
                                                <span id="vat_amount">
                                                    <?=$sale->vat_amount?>
                                                </span>
                                            </td>
                                            <?php endif; ?>
                                        </tr>
                                        <?php if ($sale->otherTaxes == "on"): ?>
                                        <?php
                                            $otherTaxes = json_decode($sale->taxes, true);
                                            $keys = array_keys($otherTaxes);
                                            for($i = 0; $i < count($keys); $i++):
                                        ?>
                                        <tr>
                                            <th><?=$keys[$i]?> (<?=$otherTaxes[$keys[$i]]['value']?>%):</th>
                                            <td>
                                                GHc.
                                                <span id="vat_amount">
                                                    <?=$otherTaxes[$keys[$i]]['amount']?>
                                                </span>
                                            </td>
                                        </tr>
                                        <?php
                                        endfor;
                                        endif; ?>
                                        <tr>
                                            <th>Total:</th>
                                            <td>
                                                GHc. <?=$sale->total_amount?>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>

                            <div class="col-6">
                                <br><br><br>
                                <div class="table-responsive">
                                    <table class="table">
                                        <tr>
                                            <th style="width:50%">Paid:</th>
                                            <td>
                                                GHc.
                                                <span id="subtotal">
                                                    <?=$sale->amount_paid?>
                                                </span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Change</th>
                                            <td>
                                                GHc.
                                                <span id="vat_amount">
                                                    <?=$sale->amount_change?>
                                                </span>
                                            </td>
                                        </tr>
                                        <?php if(!empty($sale->discount_type)):?>
                                            <tr>
                                                <th>Discount:</th>
                                                <td>
                                                    GHc. <?=$sale->discount?>
                                                </td>
                                            </tr>
                                        <?php endif; ?>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                                <div class="col-md-12 mb-2">
                                    <h3>Note</h3> <hr>
                                    <?=(!empty($sale->notes))? $sale->notes : "No note was added to this sale" ?>
                                    <hr>
                                </div>
                            </div>
                        <div class="row no-print">
                            <div class="col-12">
                                <?php if ($sale->pending_status == 1):?>
                                    <a href="<?=base_url()?>/store/sales/edit/<?=$sale->sales_id?>" id="editBtn" class="btn btn-warning pull-right"><i class="fa fa-edit"></i>Edit</a>
                                    <a href="<?=base_url()?>/store/print/receipt/<?=$sale->sales_id?>" id="printBtn" class="btn btn-success pull-right"><i class="fa fa-print"></i>Print</a>
                                <?php else:?>
                                    <a href="<?=base_url()?>/store/print/receipt/<?=$sale->sales_id?>" id="printBtn" class="btn btn-success pull-right"><i class="fa fa-print"></i>Print</a>
                                <?php endif; ?>
                                    <a href="<?=base_url()?>/store" class="btn btn-primary pull-right" style="margin-right: 5px;"><i class="fas fa-store"></i>Go To Store Front</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <?= $this->include("widgets/right-sidebar"); ?>
        <?= $this->include("widgets/chatpanel"); ?>
        <?= $this->include("widgets/footer"); ?>
    </div>
</div>

<?= $this->include("widgets/user_menu"); ?>
<script src="<?= base_url(); ?>/public/src/js/vendor/jquery-3.3.1.min.js"></script>
<script>window.jQuery || document.write('<script src="<?= base_url(); ?>/public/src/js/vendor/jquery-3.3.1.min.js"><\/script>')</script>
<script src="<?= base_url(); ?>/public/plugins/popper.js/dist/umd/popper.min.js"></script>
<script src="<?= base_url(); ?>/public/plugins/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?= base_url(); ?>/public/plugins/perfect-scrollbar/dist/perfect-scrollbar.min.js"></script>
<script src="<?= base_url(); ?>/public/plugins/screenfull/dist/screenfull.js"></script>
<script src="<?= base_url(); ?>/public/dist/js/theme.min.js"></script>
</body>
</html>

<?= $this->extend("layouts/base"); ?>
    <!-- NOTE This keeps this page in the "content" placeholder in the layouts/base.php file  -->
<?= $this->section("content"); ?>
    <!doctype html>
    <html class="no-js" lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Settings | Our Pos</title>
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="icon" href="<?= base_url(); ?>/public/favicon.ico" type="image/x-icon"/>

        <link rel="manifest" href="<?=base_url(); ?>/public/manifest.json">
        <link rel="apple-touch-icon"href="<?php base_url(); ?>public/favicon.ico" type="image/x-icon" />
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
        <link rel="stylesheet" href="<?= base_url(); ?>/public/plugins/select2/dist/css/select2.min.css">
        <link rel="stylesheet" href="<?= base_url(); ?>/public/plugins/mohithg-switchery/dist/switchery.min.css">
        <link rel="stylesheet"
              href="<?= base_url(); ?>/public/plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.css">
        <link rel="stylesheet" href="<?= base_url(); ?>/public/dist/css/theme.min.css">
        <link rel="stylesheet" href="<?= base_url(); ?>/public/plugins/jquery-toast-plugin/dist/jquery.toast.min.css">
        <script src="<?= base_url(); ?>/public/src/js/vendor/modernizr-2.8.3.min.js"></script>
    </head>

    <body>
    <div id="overlay">
        <div class='lds-ripple'>
            <div></div>
            <div></div>
        </div>
    </div>
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
                                    <i class="ik ik-inbox bg-blue"></i>
                                    <div class="d-inline">
                                        <h5>Settings</h5>
                                        <span>Configure settings of your store</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <nav class="breadcrumb-container" aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item">
                                            <a loading="true" href="<?= base_url(); ?>"><i class="ik ik-home"></i></a>
                                        </li>
                                        <li class="breadcrumb-item active">Settings</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header"><h3>Settings</h3></div>
                                <div class="card-body">
                                    <form method="post" id="settings-form">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Store Name</label>
                                                    <input type="text" data-toggle="tooltip" data-placement="top"
                                                           title="Name of the store" class="form-control"
                                                           placeholder="Omega Super Market"
                                                           value="<?= $storedata->store_name ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Address</label>
                                                    <textarea data-toggle="tooltip" data-placement="top"
                                                              title="Address or the location of the store"
                                                              class="form-control"
                                                              placeholder=""><?= $storedata->address ?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Phone</label>
                                                    <input data-toggle="tooltip" data-placement="top"
                                                           title="Phone contact number for the store" type="text"
                                                           class="form-control" placeholder="024 587 1456"
                                                           value="<?= $storedata->mobile ?>">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Fax</label>
                                                    <input type="text" data-toggle="tooltip" data-placement="top"
                                                           title="Fax number for the store" class="form-control"
                                                           placeholder="" value="<?= $storedata->fax ?>">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Email</label>
                                                    <input type="text" data-toggle="tooltip" data-placement="top"
                                                           title="Email contact of the store" class="form-control"
                                                           placeholder="" value="<?= $storedata->email ?>">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Receipt Prefix</label>
                                                    <input type="text" data-toggle="tooltip" data-placement="top"
                                                           title="This is the phrase or keyword added to the receipt number to uniquely identify you shop's receipt numbers"
                                                           class="form-control" placeholder=""
                                                           value="<?= $storedata->receipt_prefix ?>">
                                                </div>

                                            </div>
                                            <div class="col-md-6 hidden" id="vat_percentage" >
                                                <div class="form-group">
                                                    <label>Vat %</label>
                                                    <input type="text" data-toggle="tooltip" data-placement="top"
                                                           title="VAT percentage applied to the sales"
                                                           class="form-control" placeholder=""
                                                           value="<?= $storedata->vat ?>">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">

                                            <div class="col-md-4">
                                                <div data-toggle="tooltip" data-placement="top"
                                                     title="Toggle to enable Discounts when making sales"
                                                     class="form-group">
                                                    <label for="js-success">Discount</label>
                                                    <input type="checkbox" id="discount" class="js-success" checked/>
                                                </div>
                                            </div>


                                            <div class="col-md-4">
                                                <div data-toggle="tooltip" data-placement="top"
                                                     title="Toggle to enable search with barcode scanner when making sales"
                                                     class="form-group">
                                                    <label for="js-success">Barcode Search</label>
                                                    <input type="checkbox" id="bc_search" class="js-success" checked/>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div data-toggle="tooltip" data-placement="top"
                                                     title="Toggle to enable VAT when making sales"
                                                     class="form-group">
                                                    <label for="js-success">Vat</label>
                                                    <input type="checkbox" id="vat"
                                                           class="js-success" <?= $storedata->vat_status == "active" ? "checked" : "" ?>/>
                                                </div>
                                            </div>

                                        </div>
                                        <button
                                    </form>
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
    <script>
    </script>
    <script src="<?= base_url(); ?>/public/plugins/popper.js/dist/umd/popper.min.js"></script>
    <script src="<?= base_url(); ?>/public/plugins/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?= base_url(); ?>/public/plugins/perfect-scrollbar/dist/perfect-scrollbar.min.js"></script>
    <script src="<?= base_url(); ?>/public/plugins/screenfull/dist/screenfull.js"></script>
    <script src="<?= base_url(); ?>/public/dist/js/theme.min.js"></script>
    <script src="<?= base_url(); ?>/public/plugins/select2/dist/js/select2.min.js"></script>
    <script src="<?= base_url(); ?>/public/plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
    <script src="<?= base_url(); ?>/public/plugins/jquery-toast-plugin/dist/jquery.toast.min.js"></script>
    <script src="<?= base_url(); ?>/public/plugins/mohithg-switchery/dist/switchery.min.js"></script>
    <script>

        $("settings-form").on("submit", function (){
            loading_overlay(1)
        })

        //instantiating plugins {switchery: for the switch button}
        $(document).ready(function () {
            //*** switchery instantiating ***//
            let x = Array("#vat", "#discount", "#bc_search");
            for (let i = 0; i < 3; i++) {
                var elemprimary = document.querySelector(x[i]);
                var switchery = new Switchery(elemprimary, {
                    color: '#2ed8b6',
                    jackColor: '#fff'
                });
            }
            //*** End switchery instantiating ***//

        });

        $('#vat').on("change", function () {
                //checking the value of the switch button
                if ($(this).prop("checked") === false) {
                    $("#vat_percentage").slideUp(
                        function () {
                            $("#vat_percentage").hide()
                        }
                    )

                }else if($(this).prop("checked") === true){
                    // $("#vat_percentage").show()
                    let classes = $("#vat_percentage").prop("class")
                    $("#vat_percentage").prop("class", classes.replace("hidden", ""))
                    $("#vat_percentage").slideDown()
                }
            }
        )

    </script>
    </body>

    </html>
<?= $this->endSection(); ?>
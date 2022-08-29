<body class="">

    <?php $this->load->view('loading_screen'); ?>

    <div class="wrapper ">

        <!-- Top NavBar -->
        <?php $this->load->view('navigation/sidebar'); ?>
        <!-- End of NavBar -->

        <div class="main-panel">

            <!-- Navbar -->
            <?php $this->load->view('navigation/topbar'); ?>
            <!-- End Navbar -->

            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">

                            <?php $this->load->view('navigation/memberships_navbar'); ?>
                            <div class="tab-content tab-space">
                                <div class="tab-pane active">
                                    <div class="card">
                                        <div class="card-header card-header-primary">
                                            <h4 class="card-title"><?=$this->lang->line('create_membership_packages_information')?></h4>
                                            <p class="card-category"><?=$this->lang->line('complete_your_membership_packages_information')?></p>
                                        </div>
                                        <div class="card-body">
                                            <form id="form-register" enctype="mutlipart/form-data" action="" method="POST">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label class="bmd-label-floating"><?=$this->lang->line('membership_name')?></label>
                                                                    <input type="text" class="form-control name" name="name" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label class="bmd-label-floating"><?=$this->lang->line('contract_limit')?></label>
                                                                    <input type="number" class="form-control contract_limit" name="contract_limit" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label class="bmd-label-floating"><?=$this->lang->line('home_limit')?></label>
                                                                    <input type="number" class="form-control home_limit" name="home_limit" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label class="bmd-label-floating"><?=$this->lang->line('building_limit')?></label>
                                                                    <input type="number" class="form-control build_limit" name="build_limit" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="bmd-label-floating">Description</label>
                                                                <input type="text" class="form-control description" name="description" required>
                                                            </div>
                                                        </div>
                                                    </div> -->
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label class="bmd-label-floating"><?=$this->lang->line('package_amount')?></label>
                                                                    <input type="number" class="form-control amount" name="amount" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label class="bmd-label-floating"><?=$this->lang->line('package_days')?></label>
                                                                    <input type="number" class="form-control days" name="days" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <button class="btn btn-primary btn-round pull-right membership-package-save"> <i class="material-icons">check_circle</i> <?=$this->lang->line('submit')?></button>
                                                <button class="btn btn-default btn-round pull-right cancel-create"><i class="material-icons">cancel</i> <?=$this->lang->line('cancel')?></button>
                                                <div class="clearfix"></div>
                                            </form>
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
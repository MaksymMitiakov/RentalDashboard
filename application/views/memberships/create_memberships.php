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
                                            <h4 class="card-title"><?=$this->lang->line('create_membership_information')?></h4>
                                            <p class="card-category"><?=$this->lang->line('complete_your_membership_information')?></p>
                                        </div>
                                        <div class="card-body">
                                            <form id="form-register" enctype="mutlipart/form-data" action="" method="POST">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="bmd-label-floating"><?=$this->lang->line('membership_type')?></label>
                                                                    <select id="membership_type" name="membership_type" class="form-control membership_type">
                                                                        <option disabled selected><?=$this->lang->line('select_membership_type')?></option>
                                                                        <?php foreach ($membershipTypes as $key => $newC) {
                                                                            if (!empty($newC)) {  ?>
                                                                                <option value="<?php echo $newC['membership_id']; ?>"><?php echo $newC['name']; ?> </option>
                                                                        <?php }
                                                                        } ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="bmd-label-floating"><?=$this->lang->line('vendor')?></label>
                                                                    <select id="vendor_id" name="vendor_id" class="form-control vendor_id">
                                                                        <option disabled selected><?=$this->lang->line('select_vendor')?></option>
                                                                        <?php foreach ($vendors as $key => $newC) {
                                                                            if (!empty($newC)) {  ?>
                                                                                <option value="<?php echo $newC['id']; ?>"><?php echo $newC['username']; ?> </option>
                                                                        <?php }
                                                                        } ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="bmd-label-floating"><?=$this->lang->line('start_date')?></label>
                                                                    <input type="text" class="form-control added_date" name="added_date" onfocus="(this.type='date')" onblur="if(!this.value)this.type='text'" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="bmd-label-floating"><?=$this->lang->line('expired_date')?></label>
                                                                    <input type="text" class="form-control expired_date" name="expired_date" onfocus="(this.type='date')" onblur="if(!this.value)this.type='text'" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <button class="btn btn-primary btn-round pull-right membership-save"> <i class="material-icons">check_circle</i> <?=$this->lang->line('submit')?></button>
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
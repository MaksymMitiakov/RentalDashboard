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

                            <?php $this->load->view('navigation/customers_navbar'); ?>

                            <div class="tab-content tab-space">
                                <div class="tab-pane active">
                                    <div class="card">
                                        <div class="card-header card-header-primary">
                                            <h4 class="card-title"><?php echo $this->lang->line("create_customer_profile"); ?></h4>
                                            <p class="card-category"><?php echo $this->lang->line("complete_your_customer_information"); ?></p>
                                        </div>
                                        <div class="card-body">
                                            <form id="form-register" enctype="mutlipart/form-data" action="" method="POST">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label class="bmd-label-floating"><?php echo $this->lang->line("account_no"); ?>.</label>
                                                                    <?php if ($acc_no == 1000) { ?>
                                                                        <input type="number" class="form-control id" name="id" value="<?php echo 10000; ?>" readonly>
                                                                    <?php } else { ?>
                                                                        <input type="number" class="form-control id" name="id" value="<?php echo $acc_no['id'] + 1; ?>" readonly>
                                                                    <?php } ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row" hidden>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label class="bmd-label-floating"><?php echo $this->lang->line("vendor_id"); ?></label>
                                                                    <input type="text" class="form-control added_user_id" name="added_user_id" value="<?php echo $vend_no['user_id']; ?>" readonly>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label class="bmd-label-floating"><?php echo $this->lang->line("customername"); ?></label>
                                                                    <input type="text" class="form-control fullname" name="fullname" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label class="bmd-label-floating"><?php echo $this->lang->line("customer_phone"); ?></label>
                                                                    <input type="number" class="form-control phone" name="phone" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label class="bmd-label-floating"><?php echo $this->lang->line("customer_second_phone"); ?></label>
                                                                    <input type="number" class="form-control phone2" name="phone2" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label class="bmd-label-floating"><?php echo $this->lang->line("customer_email"); ?></label>
                                                                    <input type="text" class="form-control email" name="email" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label class="bmd-label-floating"><?php echo $this->lang->line("customer_address"); ?></label>
                                                                    <input type="text" class="form-control address" name="address" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label class="bmd-label-floating"><?php echo $this->lang->line("identity_numbers"); ?></label>
                                                                    <input type="number" class="form-control identity" name="identity" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <select id="education_id" name="job_id" class="form-control job_id">
                                                                        <option disabled selected><?php echo $this->lang->line("customer_job"); ?></option>
                                                                        <?php foreach ($jobs as $key => $job) {
                                                                            if (!empty($job)) {  ?>
                                                                                <option value="<?php echo $job['id']; ?>"><?php echo $job['name']; ?> </option>
                                                                        <?php }
                                                                        } ?>
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <select id="job_id" name="education_id" class="form-control education_id">
                                                                        <option disabled selected><?php echo $this->lang->line("customer_education"); ?></option>
                                                                        <?php foreach ($educations as $key => $education) {
                                                                            if (!empty($education)) {  ?>
                                                                                <option value="<?php echo $education['id']; ?>"><?php echo $education['name']; ?> </option>
                                                                        <?php }
                                                                        } ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="bmd-label-floating"><?php echo $this->lang->line("birthdate"); ?></label>
                                                                    <input type="text" class="form-control birthdate" id="birthdate" name="birthdate"  required>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="bmd-label-floating mr-3"><?php echo $this->lang->line("gender"); ?></label>
                                                                    <div class="form-check form-check-radio form-check-inline">
                                                                        <label class="form-check-label">
                                                                            <input class="form-check-input gender" type="radio" name="gender" id="inlineRadio1" value="Male" required> <?php echo $this->lang->line("male"); ?>
                                                                            <span class="circle">
                                                                                <span class="check"></span>
                                                                            </span>
                                                                        </label>
                                                                    </div>
                                                                    <div class="form-check form-check-radio form-check-inline">
                                                                        <label class="form-check-label">
                                                                            <input class="form-check-input gender" type="radio" name="gender" id="inlineRadio2" value="Female" required><?php echo $this->lang->line("female"); ?>
                                                                            <span class="circle">
                                                                                <span class="check"></span>
                                                                            </span>
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <button class="btn btn-primary btn-round pull-right customer-save"> <i class="material-icons">check_circle</i><?php echo $this->lang->line("submit"); ?></button>
                                                <button class="btn btn-default btn-round pull-right cancel-create"><i class="material-icons">cancel</i> <?php echo $this->lang->line("cancel"); ?></button>
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

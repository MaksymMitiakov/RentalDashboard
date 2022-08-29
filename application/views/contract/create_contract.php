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

                            <?php $this->load->view('navigation/contract_navbar'); ?>

                            <div class="tab-content tab-space">

                                <div class="tab-pane active">
                                    <div class="card">
                                        <div class="card-header card-header-primary">
                                            <h4 class="card-title"><?php echo $this->lang->line("contract_application_form"); ?></h4>
                                            <p class="card-category"><?php echo $this->lang->line("complete_the_contract_application_form"); ?></p>
                                        </div>
                                        <div class="card-body form-body mt-2">
                                            <form id="contract-form" method="POST">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label class="bmd-label-floating"><?php echo $this->lang->line("contract_no"); ?></label>
                                                                    <?php if ($id == 100) { ?>
                                                                        <input type="text" class="form-control id" name="id" value="C<?php echo 1000; ?>" readonly>
                                                                    <?php } else { ?>
                                                                        <input type="text" class="form-control id" name="id" value="C<?php echo $id + 1; ?>" readonly>
                                                                    <?php } ?>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group input-group-prepend">
                                                                    <span class="input-group-text">
                                                                    <?php echo $this->lang->line("₱"); ?>
                                                                    </span>
                                                                    <label class="bmd-label-floating pl-3"><?php echo $this->lang->line("contract_amount"); ?></label>
                                                                    <input type="number" min="0.01" step="0.01" max="100000" class="form-control text-right  font-weight-bold contract_amount" name="contract_amount" readonly>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-1">
                                                                <div class="form-group input-group-prepend">
                                                                    <label class="bmd-label-floating"><?php echo $this->lang->line("terms_days"); ?></label>
                                                                    <input type="text" class="form-control terms text-center" value="365" readonly>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label class="bmd-label-floating"><?php echo $this->lang->line("date"); ?></label>
                                                                    <input type="date" class="form-control date_contract" name="date_contract" value="<?php echo date("Y-m-d"); ?>" readonly>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="input-group no-border">
                                                                    <select id="customer_id" class="form-control customer_id">
                                                                        <option disabled selected><?php echo $this->lang->line("choose_collector"); ?></option>
                                                                        <?php foreach ($customers as $key => $customer) {
                                                                            if (!empty($customer)) {  ?>
                                                                                <option value="<?php echo $customer['id']; ?>"><?php echo $customer['fullname']; ?> </option>
                                                                        <?php }
                                                                        } ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="input-group no-border">
                                                                    <select id="building_id" class="form-control building_id">
                                                                        <option disabled selected><?php echo $this->lang->line("choose_building"); ?></option>
                                                                        <?php foreach ($buildings as $key => $building) {
                                                                            if (!empty($building)) {  ?>
                                                                                <option value="<?php echo $building['id']; ?>"><?php echo $building['name']; ?> </option>
                                                                        <?php }
                                                                        } ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="input-group no-border">
                                                                    <select id="home_id" class="form-control home_id">
                                                                        <option disabled selected><?php echo $this->lang->line("choose_home"); ?></option>
                                                                        <!-- <?php foreach ($homes as $key => $home) {
                                                                                    if (!empty($home)) {  ?>
                                                                          <option value="<?php echo $home['id']; ?>"><?php echo $home['door_number']; ?> </option>
                                                                      <?php }
                                                                                } ?> -->
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="mt-3 mb-2">
                                                            <h6 class="card-title"><?php echo $this->lang->line("customer_information"); ?></h6>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="bmd-label-floating" id="fullnamelbl"><?php echo $this->lang->line("fullname"); ?></label>
                                                                    <input type="text" class="form-control fullname" name="fullname" readonly>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label class="bmd-label-floating" id="identitylbl"><?php echo $this->lang->line("identity_no"); ?></label>
                                                                    <input type="text" class="form-control identity" name="identity" readonly>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label class="bmd-label-floating" id="genderlbl"><?php echo $this->lang->line("gender"); ?></label>
                                                                    <input type="text" class="form-control gender" name="gender" readonly>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label class="bmd-label-floating" id="birthdatelbl"><?php echo $this->lang->line("birth_date"); ?></label>
                                                                    <input type="text" class="form-control birthdate" name="birthdate" readonly>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label class="bmd-label-floating" id="emaillbl"><?php echo $this->lang->line("email"); ?></label>
                                                                    <input type="email" class="form-control email" name="email" readonly>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label class="bmd-label-floating" id="phonelbl"><?php echo $this->lang->line("phone"); ?></label>
                                                                    <input type="text" class="form-control phone" name="phone" readonly>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="row ml-1">

                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="row ml-1">
                                                                    <i class="fas fa-toggle-off mr-2" rel="tooltip" id="email-toggle" title="<?php echo $this->lang->line('send_email_notification'); ?>" onclick="email(this)"></i>
                                                                    <?php echo $this->lang->line("send_email_notification"); ?>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="row ml-1">
                                                                    <i class="fas fa-toggle-off mr-2" onclick="sim1(this)" id="phone-toggle" rel="tooltip" title="<?php echo $this->lang->line("send_sms_notification"); ?>"></i>
                                                                    <?php echo $this->lang->line("send_phone_sms"); ?>
                                                                </div>
                                                            </div>

                                                        </div>

                                                        <div class="mt-3 mb-2">
                                                            <h6 class="card-title"><?php echo $this->lang->line("home_info"); ?></h6>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label class="bmd-label-floating" id="h_numberlbl"><?php echo $this->lang->line("door_number"); ?></label>
                                                                    <input type="text" class="form-control h_number" name="h_number" readonly>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label class="bmd-label-floating" id="b_namelbl"><?php echo $this->lang->line("buildingname"); ?></label>
                                                                    <input type="text" class="form-control b_name" name="b_name" readonly>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label class="bmd-label-floating" id="h_locatelbl"><?php echo $this->lang->line("building_current_floor"); ?></label>
                                                                    <input type="text" class="form-control h_locate" name="h_locate" readonly>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label class="bmd-label-floating" id="b_addresslbl"><?php echo $this->lang->line("address"); ?></label>
                                                                    <input type="text" class="form-control b_address" name="b_address" readonly>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label class="bmd-label-floating" id="h_pricelbl"><?php echo $this->lang->line("price"); ?></label>
                                                                    <input type="number" class="form-control h_price" name="h_price" readonly>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label class="bmd-label-floating" id="h_dueslbl"><?php echo $this->lang->line("dues"); ?></label>
                                                                    <input type="text" class="form-control h_dues" name="h_dues" readonly>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label class="bmd-label-floating" id="h_depositlbl"><?php echo $this->lang->line("deposit"); ?></label>
                                                                    <input type="text" class="form-control h_deposit" name="h_deposit" readonly>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label class="bmd-label-floating" id="h_gross_meterlbl"><?php echo $this->lang->line("gross_meter"); ?></label>
                                                                    <input type="text" class="form-control h_gross_meter" name="h_gross_meter" readonly>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label class="bmd-label-floating" id="h_net_meterlbl"><?php echo $this->lang->line("net_meter"); ?></label>
                                                                    <input type="text" class="form-control h_net_meter" name="h_net_meter" readonly>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="form-group">
                                                                    <label class="bmd-label-floating" id="h_roomlbl"><?php echo $this->lang->line("rooms"); ?></label>
                                                                    <input type="text" class="form-control h_room" name="h_room" readonly>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="mt-3 mb-2">
                                                            <h6 class="card-title"><?php echo $this->lang->line("guarantor_information"); ?></h6>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label class="bmd-label-floating" ><?php echo $this->lang->line("fullname"); ?></label>
                                                                    <input type="text" class="form-control gua_fullname" name="gua_fullname">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label class="bmd-label-floating" ><?php echo $this->lang->line("identity_no"); ?></label>
                                                                    <input type="text" class="form-control gua_identity" name="gua_identity">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label class="bmd-label-floating" ><?php echo $this->lang->line("phone"); ?></label>
                                                                    <input type="text" class="form-control gua_phone" name="gua_phone">
                                                                </div>
                                                            </div>

                                                        </div>

                                                    </div>
                                                </div>

                                                <div class="mt-2">
                                                    <button type="submit" class="btn btn-primary btn-round pull-right create-contract"><i class="material-icons">check_circle</i><?php echo $this->lang->line("submit"); ?></button>
                                                    <button class="btn btn-default btn-round pull-right cancel-create-contract"><i class="material-icons">cancel</i><?php echo $this->lang->line("cancel"); ?></button>
                                                </div>
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

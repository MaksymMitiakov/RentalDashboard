<body class="">
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
                        <div class="col-md-2">
                        </div>
                        <div class="col-md-8">
                            <div class="tab-content tab-space">
                                <div class="tab-pane active">
                                    <div class="card">
                                        <div class="card-header card-header-primary">
                                            <h4 class="card-title mt-0"><?php echo $title; ?></h4>
                                            <p class="card-category"> <?php echo $this->lang->line("below_is_the_list_of_all_vendors"); ?></p>
                                        </div>
                                        <div class="card-body container-fluid">
                                            <label class="text-danger error" style="display: none;"><?php echo $this->lang->line("username_already_exist"); ?></label>
                                            <div class="form-group">
                                                <label class="bmd-label-floating"><?php echo $this->lang->line("user_type"); ?></label>
                                                <select required="" class="form-control user_type">
                                                    <?php if (!empty($vendor) && $vendor["user_type"] != "") { ?>
                                                        <option selected disabled value="<?php echo $vendor['user_type']; ?>"><?php echo $vendor['user_type']; ?></option>
                                                    <?php } else { ?>
                                                        <option selected disabled><?php echo $this->lang->line("select_user_type"); ?></option>
                                                    <?php } ?>
                                                    <option value="Admin"><?php echo $this->lang->line("admin"); ?></option>
                                                    <option value="Vendor"><?php echo $this->lang->line("vendor"); ?></option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label class="bmd-label-floating"><?php echo $this->lang->line("enter_username"); ?></label>
                                                <?php if (!empty($vendor)) { ?>
                                                    <input type="text" disabled class="form-control username" value="<?php echo $vendor["username"]; ?>" required>
                                                <?php } else { ?>
                                                    <input type="text" disabled class="form-control username" required>
                                                <?php } ?>
                                            </div>
                                            <div class="form-group  main-vendor">
                                                <label class="bmd-label-floating"><?php echo $this->lang->line("enter_name"); ?></label>
                                                <?php if (!empty($vendor)) { ?>
                                                    <input type="text" class="form-control fullname" value="<?php echo $vendor["fullname"]; ?>" required>
                                                <?php } else { ?>
                                                    <input type="text" class="form-control fullname" required>
                                                <?php } ?>
                                            </div>
                                            <div class="form-group  main-vendor">
                                                <label class="bmd-label-floating"><?php echo $this->lang->line("enter_phone"); ?></label>
                                                <?php if (!empty($vendor)) { ?>
                                                    <input type="number" class="form-control phone" value="<?php echo $vendor["phone"] ?>" required>
                                                <?php } else { ?>
                                                    <input type="number" class="form-control phone" required>
                                                <?php } ?>
                                            </div>
                                            <div class="form-group  main-vendor">
                                                <label class="bmd-label-floating"><?php echo $this->lang->line("enter_email"); ?></label>
                                                <?php if (!empty($vendor)) { ?>
                                                    <input type="email" class="form-control email" value="<?php echo $vendor["email"] ?>" required>
                                                <?php } else { ?>
                                                    <input type="email" class="form-control email" required>
                                                <?php } ?>
                                            </div>
                                            <div class="form-group  main-vendor">
                                                <label class="bmd-label-floating"><?php echo $this->lang->line("enter_company"); ?></label>
                                                <?php if (!empty($vendor)) { ?>
                                                    <input type="text" class="form-control company" value="<?php echo $vendor["company"] ?>" required>
                                                <?php } else { ?>
                                                    <input type="text" class="form-control company" required>
                                                <?php } ?>
                                            </div>
                                            <div class="form-group  main-vendor">
                                                <label class="bmd-label-floating"><?php echo $this->lang->line("enter_identity"); ?></label>
                                                <?php if (!empty($vendor)) { ?>
                                                    <input type="text" class="form-control identity" value="<?php echo $vendor["identity"] ?>" required>
                                                <?php } else { ?>
                                                    <input type="text" class="form-control identity" required>
                                                <?php } ?>
                                            </div>
                                            <div class="form-group  main-vendor">
                                                <label class="bmd-label-floating"><?php echo $this->lang->line("enter_address"); ?></label>
                                                <?php if (!empty($vendor)) { ?>
                                                    <input type="text" class="form-control address" value="<?php echo $vendor["address"] ?>" required>
                                                <?php } else { ?>
                                                    <input type="text" class="form-control address" required>
                                                <?php } ?>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" onclick="location.href='<?php echo base_url() . 'staff'; ?>'"><?php echo $this->lang->line("cancel"); ?></button>
                                                <button type="button" class="btn btn-primary save_vendor"><?php echo $this->lang->line("save"); ?></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
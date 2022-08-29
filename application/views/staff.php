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
                            <button type="submit" class="btn btn-sm btn-outline-primary btn-round pull-right" data-target="#add_vendor" data-toggle="modal">
                                <i class="material-icons">person_add</i> <?php echo $this->lang->line("add_vendor"); ?>
                            </button>
                            <div class="tab-content tab-space">
                                <div class="tab-pane active">
                                    <div class="card">
                                        <div class="card-header card-header-primary">
                                            <h4 class="card-title mt-0"><?php echo $this->lang->line("vendor_table"); ?></h4>
                                            <p class="card-category"><?php echo $this->lang->line("below_is_the_list_of_all_vendors"); ?></p>
                                        </div>
                                        <div class="card-body container-fluid">
                                            <div class="table-responsive ">
                                                <table class="display nowrap table table-hover table-sm " id="contract_users_table">
                                                    <thead class="text-primary">
                                                        <th><?php echo $this->lang->line("id"); ?></th>
                                                        <th><?php echo $this->lang->line("username"); ?></th>
                                                        <th><?php echo $this->lang->line("fullname"); ?></th>
                                                        <th><?php echo $this->lang->line("email"); ?></th>
                                                        <th><?php echo $this->lang->line("phone"); ?></th>
                                                        <th><?php echo $this->lang->line("position"); ?></th>
                                                        <th><?php echo $this->lang->line("action"); ?></th>
                                                    </thead>
                                                    <tbody>
                                                        <?php if (!empty($stafflist)) {  ?>
                                                            <?php foreach ($stafflist as $key => $st) { ?>
                                                                <tr>
                                                                    <td><?php echo $st['id']; ?></td>
                                                                    <td><b><?php echo $st['username']; ?></b></td>
                                                                    <td>
                                                                        <?php echo $st['fullname']; ?>
                                                                    </td>
                                                                    <td><?php echo $st['email']; ?></td>
                                                                    <td><?php echo $st['phone']; ?></td>
                                                                    <td><?php echo $st['user_type']; ?></td>
                                                                    <td class="td-actions text-right">
                                                                        <button type="button" rel="tooltip" title="<?php echo $this->lang->line("view_vendor"); ?>" class="btn btn-info btn-sm btn-link" onclick="location.href='<?php echo base_url() . 'staff-profile/' . $st['id']; ?>'">
                                                                            <i class="material-icons">visibility</i>
                                                                        </button>|
                                                                        <button type="button" rel="tooltip" title="<?php echo $this->lang->line("edit_vendor"); ?>" class="btn btn-primary btn-sm btn-link" onclick="location.href='<?php echo base_url() . 'staff/update-profile/' . $st['id']; ?>'">
                                                                            <i class="material-icons">edit</i>
                                                                        </button>|
                                                                        <button type="button" rel="tooltip" title="<?php echo $this->lang->line("remove_vendor"); ?>" class="btn btn-danger btn-sm btn-link" data-target="#remove_vendor<?php echo $st['id']; ?>" id="remove_vendor<?php echo $st['id']; ?>" data-toggle="modal">
                                                                            <i class="material-icons">remove_circle</i>
                                                                        </button>
                                                                    </td>
                                                                </tr>
                                                                <!-- Modal for remove clients -->
                                                                <div class="modal fade" id="remove_vendor<?php echo $st['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title font-weight-bold" id="exampleModalLabel"><?php echo $this->lang->line("removing_vendor"); ?></h5>
                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                    <span aria-hidden="true">&times;</span>
                                                                                </button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <p><?php echo $this->lang->line("are_you_sure_you_want"); ?></p>
                                                                                <small class="text-danger font-italic"><?php echo $this->lang->line("note_this_process_cannot_be_undoned"); ?></small>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo $this->lang->line("cancel"); ?></button>
                                                                                <button type="button" class="btn btn-danger remove-vendor" id="<?php echo $st['id']; ?>"><?php echo $this->lang->line("remove"); ?></button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- End of modal -->
                                                        <?php }
                                                        } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Modal for add clients -->
                                    <div class="modal fade" id="add_vendor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title font-weight-bold" id="exampleModalLabel"><?php echo $this->lang->line("add_vendor"); ?></h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <label class="text-danger error" style="display: none;"><?php echo $this->lang->line("username_already_exist"); ?></label>
                                                    <div class="form-group">
                                                        <label class="bmd-label-floating"><?php echo $this->lang->line("user_type"); ?></label>
                                                        <select required="" class="form-control user_type">
                                                            <option selected disabled=""><?php echo $this->lang->line("select_user_type"); ?></option>
                                                            <option value="Admin"><?php echo $this->lang->line("admin"); ?></option>
                                                            <option value="Vendor"><?php echo $this->lang->line("vendor"); ?></option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="bmd-label-floating"><?php echo $this->lang->line("enter_username"); ?></label>
                                                        <input type="text" class="form-control username" required>
                                                    </div>
                                                    <div class="form-group main-vendor">
                                                        <label class="bmd-label-floating"><?php echo $this->lang->line("enter_password"); ?></label>
                                                        <input type="password" class="form-control password" required>
                                                    </div>
                                                    <div class="form-group  main-vendor">
                                                        <label class="bmd-label-floating"><?php echo $this->lang->line("enter_name"); ?></label>
                                                        <input type="text" class="form-control fullname" required>
                                                    </div>
                                                    <div class="form-group  main-vendor">
                                                        <label class="bmd-label-floating"><?php echo $this->lang->line("enter_phone"); ?></label>
                                                        <input type="number" class="form-control phone" required>
                                                    </div>
                                                    <div class="form-group  main-vendor">
                                                        <label class="bmd-label-floating"><?php echo $this->lang->line("enter_email"); ?></label>
                                                        <input type="email" class="form-control email" required>
                                                    </div>
                                                    <div class="form-group  main-vendor">
                                                        <label class="bmd-label-floating"><?php echo $this->lang->line("enter_company"); ?></label>
                                                        <input type="text" class="form-control company" required>
                                                    </div>
                                                    <div class="form-group  main-vendor">
                                                        <label class="bmd-label-floating"><?php echo $this->lang->line("enter_identity"); ?></label>
                                                        <input type="text" class="form-control identity" required>
                                                    </div>
                                                    <div class="form-group  main-vendor">
                                                        <label class="bmd-label-floating"><?php echo $this->lang->line("enter_address"); ?></label>
                                                        <input type="text" class="form-control address" required>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo $this->lang->line("cancel"); ?></button>
                                                    <button type="button" class="btn btn-primary add_vendor"><?php echo $this->lang->line("add"); ?></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End of modal -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
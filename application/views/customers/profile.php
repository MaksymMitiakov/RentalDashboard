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
                        <div class="col-md-4">
                            <div class="card card-profile">
                                <div class="card-body">
                                    <h4 class="card-title font-weight-bold"><?php echo $profile['fullname']; ?></h4>
                                    <h6 class="card-category text-gray"><?php echo $this->lang->line("account_no"); ?>. <span class="text-primary"><?php echo $profile['ids']; ?></span></h6>
                                    <table class="w-100">
                                        <tbody>
                                            <tr style="height:40px">
                                                <td class="font-weight-bold text-left"><?php echo $this->lang->line("phone"); ?>:</td>
                                                <td class="text-right"><?php echo $profile['phone']; ?></td>
                                            </tr>
                                            <tr style="height:40px">
                                                <td class="font-weight-bold text-left"><?php echo $this->lang->line("second_phone"); ?>:</td>
                                                <td class="text-right"><?php echo $profile['phone2']; ?></td>
                                            </tr>
                                            <tr style="height:40px">
                                                <td class="font-weight-bold text-left"><?php echo $this->lang->line("email"); ?>:</td>
                                                <td class="text-right"><?php echo $profile['email']; ?></td>
                                            </tr>
                                            <tr style="height:40px;">
                                                <td class="font-weight-bold text-left"><?php echo $this->lang->line("birthdate"); ?>:</td>
                                                <td class="text-right">
                                                    <?php $time = strtotime($profile['birthdate']);
                                                    echo date("M d, Y", $time); ?>
                                                </td>
                                            </tr>
                                            <tr style="height:40px;">
                                                <td class="font-weight-bold text-left "><?php echo $this->lang->line("gender"); ?>:</td>
                                                <td class="text-right"><?php echo $profile['gender']; ?>
                                                </td>
                                            </tr>
                                            <tr style="height:40px;">
                                                <td class="font-weight-bold text-left "><?php echo $this->lang->line("education"); ?>:</td>
                                                <td class="text-right"><?php echo $profile['education']; ?>
                                                </td>
                                            </tr>
                                            <tr style="height:40px;">
                                                <td class="font-weight-bold text-left "><?php echo $this->lang->line("job"); ?>:</td>
                                                <td class="text-right"><?php echo $profile['job']; ?></td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <div class="text-center">
                                        <button class="btn btn-outline-primary btn-sm btn-round" data-target="#edit_profile" data-toggle="modal" rel="tooltip" title="<?php echo $this->lang->line("edit_profile"); ?>">
                                            <i class="material-icons">edit</i> <?php echo $this->lang->line("update"); ?>
                                        </button>
                                        <button onclick='location.href="<?php echo base_url() . "contract/create-contract"; ?>"' class="btn btn-primary btn-sm btn-round" rel="tooltip" title="<?php echo $this->lang->line("apply_contract"); ?>">
                                            <i class="material-icons">monetization_on</i> <?php echo $this->lang->line("apply_contract"); ?>
                                        </button>

                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header border-bottom font-weight-bold text-primary">
                                </div>
                                <div class="card-body">
                                    <h6 class="card-title font-weight-bold"><?php echo $this->lang->line("customer_address"); ?></h6>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <p class="card-description font-weight-bold">

                                                <?php if (!empty($profile['address'])) { ?>
                                                    <?php echo $profile['address']; ?>
                                                    <?}else{?>
                                                        <?php echo $this->lang->line("no_customer_address"); ?>
                                                <?php } ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header border-bottom font-weight-bold text-primary"><?php echo $this->lang->line("contract_history"); ?></div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-sm" id="contract_history">
                                            <thead class="text-primary">
                                                <tr>
                                                    <th><?php echo $this->lang->line("contract_no"); ?>.</th>
                                                    <th><?php echo $this->lang->line("contract_amount"); ?></th>
                                                    <th><?php echo $this->lang->line("status"); ?></th>
                                                    <th><?php echo $this->lang->line("due_date"); ?></th>
                                            </thead>
                                            <tbody>
                                                <?php if (!empty($contract)) { ?>
                                                    <?php foreach ($contract as $key => $value) { ?>
                                                        <tr>
                                                            <td><a href="<?php echo base_url() . 'payments/contract-details/' . $value['id']; ?>"><?php echo $value['id']; ?></a></td>
                                                            <td><?php echo $value['contract_amount']; ?></td>
                                                            <td><?php echo $value['contract_stat']; ?></td>
                                                            <td><?php $time = $value['due_date'];
                                                                echo date('M. d, Y', strtotime($time)); ?></td>
                                                        </tr>
                                                <?php }
                                                } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>


                            <!-- Modal for edit profile-->
                            <div class="modal fade" id="edit_profile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title font-weight-bold text-primary"><?php echo $this->lang->line("update_profile"); ?></h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form id="update_form" enctype="mutlipart/form-data" method="POST">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <input type="hidden" class="form-control" name="id" value="<?php echo $profile['ids']; ?>">
                                                                    <label class="bmd-label-floating"><?php echo $this->lang->line("customername"); ?></label>
                                                                    <input type="text" class="form-control" name="fullname" value="<?php echo $profile['fullname']; ?>" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label class="bmd-label-floating"><?php echo $this->lang->line("email_address"); ?></label>
                                                                    <input type="email" class="form-control" name="email" value="<?php echo $profile['email']; ?>" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label class="bmd-label-floating"><?php echo $this->lang->line("contract_number"); ?></label>
                                                                    <input type="number" class="form-control" name="phone" value="<?php echo $profile['phone']; ?>" required>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                          <div class="col-md-4">
                                                              <div class="form-group">
                                                                  <label class="bmd-label-floating"><?php echo $this->lang->line("contract_number_2"); ?></label>
                                                                  <input type="number" class="form-control" name="phone2" value="<?php echo $profile['phone2']; ?>" required>
                                                              </div>
                                                          </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label class="bmd-label-floating"><?php echo $this->lang->line("birthdate"); ?></label>
                                                                    <input type="date" class="form-control" name="birthdate" value="<?php echo changeDate($profile['birthdate']); ?>" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label class="bmd-label-floating"><?php echo $this->lang->line("gender"); ?></label>
                                                                    <input type="text" class="form-control" name="gender" value="<?php echo $profile['gender']; ?>" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label class="bmd-label-floating"><?php echo $this->lang->line("address"); ?></label>
                                                                    <textarea class="form-control address" name="address" rows="2"><?php echo $profile['address']; ?></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary btn-round" data-dismiss="modal"><i class="material-icons">cancel</i> <?php echo $this->lang->line("cancel"); ?></button>
                                            <button type="submit" class="btn btn-primary btn-round customerupdate" id="update_customer_profile">
                                                <i class="material-icons">check_circle</i> <?php echo $this->lang->line("save"); ?>
                                            </button>
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

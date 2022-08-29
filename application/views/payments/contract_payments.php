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
                    <div class="row" style="margin-top: -50px;">
                        <div class="col-md-12">

                            <div class="card">
                                <div class="card-header border-bottom row">
                                    <div class="col-md-8">
                                        <h4 class=" font-weight-bold text-primary"><?php echo $this->lang->line("contract_information"); ?></h4>
                                    </div>
                                    <?php if ($contract['contract_stats'] == 'Paid') { ?>
                                        <div class="col-md-2 text-right">
                                            <button class="btn btn-outline-primary btn-round pull-right btn-sm" rel="tooltip" title="<?php echo $this->lang->line("pay_contract"); ?>" data-target="#payment-modal" data-toggle="modal" disabled=""><i class="material-icons">monetization_on</i> <?php echo $this->lang->line("pay_contract"); ?></button>
                                        </div>

                                        <div class="col-md-1 text-right">
                                            <button rel="tooltip" title="<?php echo $this->lang->line("applicable_only_if_contract_is_in_due_date"); ?>" class="btn btn-outline-primary btn-round pull-right btn-sm" disabled=""><?php echo $this->lang->line("fully_paid"); ?></button>
                                        </div>

                                    <?php } else { ?>
                                        <div class="col-md-2 text-right">
                                            <button class="btn btn-outline-primary btn-round pull-right btn-sm" rel="tooltip" title="<?php echo $this->lang->line("pay_contract"); ?>" data-target="#payment-modal" data-toggle="modal"><i class="material-icons">monetization_on</i> <?php echo $this->lang->line("pay_contract"); ?></button>
                                        </div>

                                        <div class="col-md-1 text-right">
                                            <!-- <?php
                                            $due = date('M. d, Y', strtotime($contract['due_date']));
                                            $now = date('M. d, Y');
                                            
                                            if (strtotime($due) >= strtotime($now)) { ?>
                                                <button rel="tooltip" title="<?php echo $this->lang->line("applicable_only_if_contract_is_in_due_date"); ?>" class="btn btn-outline-primary btn-round pull-right btn-sm" disabled=""><?php echo $this->lang->line("fully_paid"); ?></button>
                                            <?php } else { ?>
                                                <button class="btn btn-outline-primary btn-round pull-right btn-sm fully_paid" id="<?php echo $contract['contract_id']; ?>"><?php echo $this->lang->line("fully_paid"); ?></button>
                                            <?php } ?> -->
                                            <?php if (!empty($first_mnth) || !empty($second_mnth)) { ?>
                                                <button rel="tooltip" title="<?php echo $this->lang->line("applicable_only_if_contract_is_in_due_date"); ?>" class="btn btn-outline-primary btn-round pull-right btn-sm" disabled=""><?php echo $this->lang->line("fully_paid"); ?></button>
                                            <?php } else { ?>
                                                <button class="btn btn-outline-primary btn-round pull-right btn-sm fully_paid" id="<?php echo $contract['contract_id']; ?>"><?php echo $this->lang->line("fully_paid"); ?></button>
                                            <?php }?>
                                        </div>

                                    <?php } ?>

                                </div>
                                <div class="card-body">
                                    <div class="row">

                                        <div class="col-md-4 card-contract">
                                            <div class="fileinput-new thumbnail img-raised" style="width: 250px;">
                                                <?php if (empty($contract['profile_img'])) { ?>
                                                    <img class="border-round" src="<?php echo base_url() . 'assets/images/person.png' ?>" width="250" />
                                                <?php } else { ?>
                                                    <img class="img-fluid" width="250" id="output" src="<?php echo base_url() . 'uploads/' . $contract['profile_img']; ?>" alt="client-img" />
                                                <?php } ?>
                                            </div>
                                        </div>

                                        <div class="col-md-8">
                                            <div class="row">
                                                <div class="col-md-4 p-0">
                                                    <div class="form-group input-group-prepend">
                                                        <label class="bmd-label-floating text-primary"><?php echo $this->lang->line("account_number"); ?>:</label>
                                                        <input type="text" class="form-control interest text-left font-weight-bold" value="<?php echo $contract['customer_id']; ?>" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 p-0">
                                                    <div class="form-group input-group-prepend">
                                                        <label class="bmd-label-floating text-primary"><?php echo $this->lang->line("contract_no"); ?>.:</label>
                                                        <input type="text" class="form-control interest text-left font-weight-bold" value="<?php echo $contract['contract_id']; ?>" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 p-0">
                                                    <div class="form-group input-group-prepend">
                                                        <label class="bmd-label-floating text-primary"><?php echo $this->lang->line("date_contract"); ?>:</label>
                                                        <input type="text" class="form-control interest text-left font-weight-bold" value="<?php $time = strtotime($contract['contract_started']);
                                                                                                                                            echo date("M. d, Y", $time); ?>" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row p-0">
                                                <div class="col-md-4 p-0">
                                                    <div class="form-group input-group-prepend">
                                                        <label class="bmd-label-floating text-primary"><?php echo $this->lang->line("customername"); ?></label>
                                                        <input type="text" class="form-control interest text-left font-weight-bold" value="<?php echo $contract['fullname']; ?>" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 p-0">
                                                    <div class="form-group input-group-prepend">
                                                        <label class="bmd-label-floating text-primary"><?php echo $this->lang->line("building_name"); ?>:</label>
                                                        <input type="text" class="form-control interest text-left font-weight-bold" value="<?php echo $contract['building']; ?>" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 p-0">
                                                    <div class="form-group input-group-prepend">
                                                        <label class="bmd-label-floating text-primary"><?php echo $this->lang->line("door_number"); ?>:</label>
                                                        <input type="text" class="form-control interest text-left font-weight-bold" value="<?php echo $contract['home']; ?>" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row p-0">
                                                <div class="col-md-12 p-0">
                                                    <div class="form-group input-group-prepend">
                                                        <label class="bmd-label-floating text-primary"><?php echo $this->lang->line("current_address"); ?>: </label>
                                                        <input type="text" class="form-control interest text-left font-weight-bold" value="<?php echo $contract['addre']; ?>" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row p-0">
                                                <div class="col-md-6 p-0">
                                                    <div class="form-group input-group-prepend">
                                                        <label class="bmd-label-floating text-primary"><?php echo $this->lang->line("amount_contract"); ?>: </label>
                                                        <input type="text" class="form-control interest text-left font-weight-bold" value="<?php echo $contract['contract_amount']; ?>" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 p-0">
                                                    <div class="form-group input-group-prepend">
                                                        <label class="bmd-label-floating text-primary"><?php echo $this->lang->line("due_date"); ?>: </label>
                                                        <input type="text" class="form-control interest text-left font-weight-bold" value="<?php $due = $contract['due_date'];
                                                                                                                                            echo date('M. d, Y', strtotime($due)); ?>" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row p-0">
                                                <div class="col-md-6 p-0">
                                                    <div class="form-group input-group-prepend">
                                                        <label class="bmd-label-floating text-primary"><?php echo $this->lang->line("monthly_payment_p"); ?> : </label>
                                                        <input type="text" class="form-control interest text-left font-weight-bold" value="<?php echo $contract['monthly_payment']; ?>" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 p-0">
                                                    <div class="form-group input-group-prepend">
                                                        <label class="bmd-label-floating text-primary"><?php echo $this->lang->line("terms_days"); ?>: </label>
                                                        <input type="text" class="form-control interest text-left font-weight-bold" value="<?php echo $contract['terms']; ?> " disabled>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="margin-top: -40px">
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-sm">
                                                    <thead class="text-primary">
                                                        <th><?php echo $this->lang->line("month"); ?></th>
                                                        <th><?php echo $this->lang->line("date"); ?></th>
                                                        <th><?php echo $this->lang->line("monthly_amount"); ?></th>
                                                        <th><?php echo $this->lang->line("note"); ?></th>
                                                        <th><?php echo $this->lang->line("invoice"); ?></th>
                                                    </thead>
                                                    <tbody>
                                                        <?php  if (!empty($first_mnth)) { ?>
                                                            <?php for ($i = 0; $i < count($first_mnth); $i++) { ?>
                                                                <?php
                                                                if (!empty($first_mnth[$i]['row_id'])) {
                                                                    $p = $first_mnth[$i]['row_id'];
                                                                }
                                                                if (!empty($first_mnth[$i]['date'])) {
                                                                    $d = $first_mnth[$i]['date'];
                                                                }
                                                                if (!empty($first_mnth[$i]['amount'])) {
                                                                    $am = $first_mnth[$i]['amount'];
                                                                }
                                                                if (!empty($first_mnth[$i]['notes'])) {
                                                                    $n = $first_mnth[$i]['notes'];
                                                                }
                                                                $a = $i + 1;
                                                                ?>
                                                                <tr>

                                                                    <td><?php echo $p; ?></td>
                                                                    <td><?php echo changeDate($d); ?></td>
                                                                    <td><?php echo $am; ?></td>
                                                                    <td><?php
                                                                        if ($n == "Penalty added") {
                                                                            echo "<span class='text-danger'>" . $this->lang->line($n);
                                                                            "</span>";
                                                                        } else {
                                                                            echo "<span class='text-success'>" . $this->lang->line($n);
                                                                            "</span>";
                                                                        } ?></td>
                                                                    <td> <button type="button" rel="tooltip" title="<?=$this->lang->line('invoice_details')?>" class="btn btn-info btn-sm btn-link" onclick="location.href='<?php echo base_url() . 'payments/invoice/' . $first_mnth[$i]['transaction_id']; ?>'">
                                                                            <i class="material-icons">print</i>
                                                                        </button></td>

                                                                </tr>
                                                            <?php }
                                                        } else { ?>
                                                            <?php for ($i = 1; $i <= 6; $i++) { ?>
                                                                <tr>
                                                                    <td>
                                                                        <?php echo $i;?>
                                                                    </td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                </tr>
                                                        <?php }
                                                        } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-sm">
                                                    <thead class="text-primary">
                                                        <th><?php echo $this->lang->line("month"); ?></th>
                                                        <th><?php echo $this->lang->line("date"); ?></th>
                                                        <th><?php echo $this->lang->line("monthly_amount"); ?></th>
                                                        <th><?php echo $this->lang->line("note"); ?></th>
                                                        <th><?php echo $this->lang->line("invoice"); ?></th>
                                                    </thead>
                                                    <tbody>
                                                        <?php if (!empty($second_mnth)) { ?>


                                                            <?php for ($i = 0; $i < count($second_mnth); $i++) { ?>
                                                                <?php
                                                                if (!empty($second_mnth[$i]['row_id'])) {
                                                                    $p = $second_mnth[$i]['row_id'];
                                                                }
                                                                if (!empty($second_mnth[$i]['date'])) {
                                                                    $d = $second_mnth[$i]['date'];
                                                                }
                                                                if (!empty($second_mnth[$i]['amount'])) {
                                                                    $am = $second_mnth[$i]['amount'];
                                                                }
                                                                if (!empty($second_mnth[$i]['notes'])) {
                                                                    $n = $second_mnth[$i]['notes'];
                                                                }
                                                                $a = $i + 1;
                                                                ?>
                                                                <tr>
                                                                    <td><?php echo $p; ?></td>
                                                                    <td><?php echo changeDate($d); ?></td>
                                                                    <td><?php echo $am; ?></td>

                                                                    <td> <button type="button" rel="tooltip" title="<?=$this->lang->line('invoice_details')?>" class="btn btn-info btn-sm btn-link" onclick="location.href='<?php echo base_url() . 'payments/invoice/' . $first_mnth[$i]['transaction_id']; ?>'">
                                                                            <i class="material-icons">print</i>
                                                                        </button></td>
                                                                    <td><?php
                                                                        if ($n == "Penalty added") {
                                                                            echo "<span class='text-danger'>" . $this->lang->line($n);
                                                                            "</span>";
                                                                        } else {
                                                                            echo "<span class='text-success'>" . $this->lang->line($n);
                                                                            "</span>";
                                                                        } ?></td>
                                                                </tr>
                                                            <?php }
                                                        } else { ?>
                                                            <?php for ($i = 1; $i <= 6; $i++) { ?>
                                                                <tr>
                                                                    <td>
                                                                        <?php echo $i;?>
                                                                    </td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                </tr>
                                                        <?php }
                                                        } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Modal  -->
                            <div class="modal fade " id="payment-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
                                <div class="modal-dialog modal-md" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title font-weight-bold" id="exampleModalLabel"><?php echo $this->lang->line("transactions"); ?></h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="col-md-12">

                                                <div class="form-group mt-4">
                                                    <label class="bmd-label-floating"><?php echo $this->lang->line("date_now"); ?></label>
                                                    <input type="text" class="form-control pl-3" value="<?php echo date('M d, Y'); ?>" readonly>
                                                </div>

                                                <div class="form-group ">
                                                    <label class="bmd-label-floating"><?php echo $this->lang->line("last_payment_date"); ?></label>
                                                    <input type="text" class="form-control pl-3 " value="<?php
											if(!empty($pny[0]['date'])){
                                             $time = strtotime($pny[0]['date']);
											echo date('M d, Y', $time);
											} else{
											echo date('M d, Y');
												}
																										 ?>" readonly>
                                                </div>

                                                <div class="form-group input-group-prepend">
                                                    <span class="input-group-text">
                                                    <?php echo $this->lang->line("₱"); ?>
                                                    </span>
                                                    <label class="bmd-label-floating"><?php echo $this->lang->line("monthly_payment"); ?></label>
                                                    <input type="number" class="form-control pl-3 monthly_payment" name="monthly_payment" value="<?php echo $contract['monthly_payment']; ?>" readonly required>
                                                </div>

                                                <div class="form-group input-group-prepend ">
                                                    <span class="input-group-text">
                                                    <?php echo $this->lang->line("₱"); ?>
                                                    </span>
                                                    <label class="bmd-label-floating"><?php echo $this->lang->line("due_payment"); ?></label>
                                                    <input type="number" class="form-control pl-3 due_payment" name="due_payment" value="<?php echo $due_payment; ?>" readonly required>
                                                </div>

                                                <div class="form-group input-group-prepend ">
                                                    <span class="input-group-text">
                                                    <?php echo $this->lang->line("₱"); ?>
                                                    </span>
                                                    <label class="bmd-label-floating"><?php echo $this->lang->line("total_payment"); ?></label>
                                                    <input type="number" class="form-control pl-3 " name="total_amount" value="<?php echo $contract['contract_amount']; ?>" readonly required>
                                                </div>


                                                <div class="form-group input-group-prepend">
                                                    <select id="payment_type" name="payment_type" class="form-control payment_type" required>
                                                        <option disabled selected><?php echo $this->lang->line("payment_type"); ?></option>
                                                        <?php foreach ($transactiont_type as $key => $type) {
                                                            if (!empty($type)) {  ?>
                                                                <option value="<?php echo $type['id']; ?>"><?php echo $type['name']; ?> </option>
                                                        <?php }
                                                        } ?>
                                                    </select>
                                                </div>
                                                <input type="hidden" class="form-control contract_id" value="<?php echo $contract['contract_id']; ?>">
                                            </div>
                                            <button type="button" class="btn btn-primary btn-round btn-sm ml-3 c_pay"><?php echo $this->lang->line("pay"); ?></button>


                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-outline-secondary" data-dismiss="modal"><?php echo $this->lang->line("close"); ?></button>
                                        </div>
                                        </form>
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

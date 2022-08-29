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

                            <!-- Page Here -->

                            <ul class="nav nav-pills nav-pills-primary" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active mr-2 pt-0 pb-0 font-weight-bold shadow" data-toggle="tab" href="#link1" role="tablist" aria-expanded="true" style="border-radius: 20px; border: 1px solid #9E57B1; font-size: 12px;">
                                        <i class="material-icons">group</i> <?php echo $this->lang->line("CUSTOMERS"); ?>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link mr-2 pt-0 pb-0 font-weight-bold" data-toggle="tab" href="#link2" role="tablist" aria-expanded="false" style="border-radius: 20px; border: 1px solid #9E57B1; font-size: 12px;">
                                        <i class="material-icons">monetization_on</i> <?php echo $this->lang->line("CONTRACTS"); ?>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link pt-0 pb-0 font-weight-bold" data-toggle="tab" href="#link3" role="tablist" aria-expanded="false" style="border-radius: 20px; border: 1px solid #9E57B1;font-size: 12px;">
                                        <i class="material-icons">payment</i> <?php echo $this->lang->line("PAYMENTS"); ?>
                                    </a>
                                </li>
                            </ul>


                            <div class="tab-content tab-space">

                                <div class="tab-pane active" id="link1" aria-expanded="true">

                                    <div class="card">
                                        <div class="card-header card-header-primary">
                                            <h4 class="card-title mt-0"><?php echo $this->lang->line("customers"); ?></h4>
                                            <p class="card-category"><?php echo $this->lang->line("below_is_the_list_of_all_customers"); ?> </p>
                                        </div>
                                        <div class="card-body container-fluid">
                                            <div class="table-responsive">
                                                <table class="table table-hover table-sm display" id="all-clients-table">
                                                    <thead class="text-primary">
                                                        <th><?php echo $this->lang->line("account_no"); ?>.</th>
                                                        <th><?php echo $this->lang->line("name"); ?></th>
                                                        <th><?php echo $this->lang->line("address"); ?></th>
                                                        <th><?php echo $this->lang->line("email"); ?></th>
                                                        <th><?php echo $this->lang->line("contract_number"); ?></th>
                                                        <th><?php echo $this->lang->line("status"); ?></th>
                                                    </thead>

                                                    <tbody>
                                                        <?php if (!empty($customers)) { ?>
                                                            <?php foreach ($customers as $key => $all) { ?>
                                                                <tr>
                                                                    <td><?php echo $all['id']; ?></td>
                                                                    <td><?php echo $all['fullname']; ?></td>
                                                                    <td><?php echo $all['address']; ?></td>
                                                                    <td><?php echo $all['email']; ?></td>
                                                                    <td><?php echo $all['identity']; ?></td>
                                                                    <td><?php echo $this->lang->line($all['status']); ?></td>
                                                                </tr>
                                                        <?php }
                                                        } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                </div>


                                <div class="tab-pane" id="link2" aria-expanded="false">

                                    <div class="card">
                                        <div class="card-header card-header-primary">
                                            <h4 class="card-title mt-0"> <?php echo $this->lang->line("contracts"); ?></h4>
                                            <p class="card-category"> <?php echo $this->lang->line("below_is_the_list_of_all_contracts"); ?></p>
                                        </div>
                                        <div class="card-body container-fluid">
                                            <div class="table-responsive">
                                                <table class="table table-hover table-sm display loan_table" id="all-loans-table">
                                                    <thead class="text-primary">
                                                        <th><?php echo $this->lang->line("contract_no"); ?>.</th>
                                                        <th><?php echo $this->lang->line("name"); ?></th>
                                                        <th><?php echo $this->lang->line("contract_amount"); ?></th>
                                                        <th><?php echo $this->lang->line("terms"); ?></th>
                                                        <th><?php echo $this->lang->line("monthly_payment"); ?></th>
                                                        <th class="filter-start-date"><?php echo $this->lang->line("date_contract"); ?></th>
                                                        <th class="filter-end-date"><?php echo $this->lang->line("due_date"); ?></th>
                                                        <th><?php echo $this->lang->line("status"); ?></th>
                                                    </thead>
                                                    <tbody>
                                                        <?php if (!empty($contracts)) { ?>
                                                            <?php foreach ($contracts as $key => $all) { ?>
                                                                <tr>
                                                                    <td><?php echo $all['contractNo']; ?></td>
                                                                    <td><?php echo $all['fullname']; ?></td>
                                                                    <td><?php echo $all['contract_amount']; ?></td>
                                                                    <td><?php echo $all['terms']; ?></td>
                                                                    <td><?php echo $all['monthly_payment']; ?></td>
                                                                    <td><?php $time = $all['date_approved'];
                                                                        echo date('M. d, Y', strtotime($time)); ?></td>
                                                                    <td><?php $time = $all['due_date'];
                                                                        echo date('M. d, Y', strtotime($time)); ?></td>
                                                                    <td><?php echo $this->lang->line($all['contract_status']); ?></td>
                                                                </tr>
                                                        <?php }
                                                        } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>


                                </div>


                                <div class="tab-pane" id="link3" aria-expanded="false">

                                    <div class="card">
                                        <div class="card-header card-header-primary">
                                            <h4 class="card-title mt-0"><?php echo $this->lang->line("payments"); ?> </h4>
                                            <p class="card-category"><?php echo $this->lang->line("below_is_the_list_of_all_payment"); ?> </p>
                                        </div>
                                        <div class="card-body container-fluid">
                                            <div class="table-responsive">
                                                <div class="row mt-2 w-75">
                                                    <div class="col-md-4 form-group ml-5">
                                                        <label class="label-control"><?php echo $this->lang->line("minimun_date"); ?></label>
                                                        <input type="text" class="min form-control" />
                                                    </div>
                                                    <div class="col-md-4 form-group">
                                                        <label class="label-control"><?php echo $this->lang->line("maximum_date"); ?></label>
                                                        <input type="text" class="max form-control" />
                                                    </div>
                                                </div>
                                                <table class="table table-hover table-sm display loan_table" id="all-payments-table">
                                                    <thead class="text-primary">
                                                        <th><?php echo $this->lang->line("transaction_no"); ?>.</th>
                                                        <th><?php echo $this->lang->line("contract_no"); ?>.</th>
                                                        <th><?php echo $this->lang->line("name"); ?></th>
                                                        <th><?php echo $this->lang->line("amount_collected"); ?></th>
                                                        <th><?php echo $this->lang->line("date"); ?></th>
                                                        <th><?php echo $this->lang->line("collected_by"); ?></th>
                                                        <th><?php echo $this->lang->line("notes"); ?></th>
                                                    </thead>
                                                    <tbody>
                                                        <?php if (!empty($payments)) { ?>
                                                            <?php foreach ($payments as $key => $all) { ?>
                                                                <tr>
                                                                    <td><?php echo $all['transaction_id']; ?></td>
                                                                    <td><?php echo $all['contractNo']; ?></td>
                                                                    <td><?php echo $all['fullname']; ?></td>
                                                                    <td><?php echo $all['amount']; ?></td>
                                                                    <td><?php echo changeDate($all['date']); ?></td>
                                                                    <td><?php echo $all['collected_by']; ?></td>
                                                                    <td><?php echo $this->lang->line($all['notes']); ?></td>
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

                            <!-- End Here -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

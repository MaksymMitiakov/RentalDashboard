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

                                <?php $this->load->view('navigation/homes_navbar'); ?>

                                <div class="tab-content tab-space">
                                    <div class="tab-pane active">
                                        <div class="card">
                                            <div class="card-header card-header-primary">
                                                <h4 class="card-title mt-0"><?php echo $this->lang->line("active_homes_table"); ?></h4>
                                                <p class="card-category"><?php echo $this->lang->line("below_is_the_list_of_all_active_homes"); ?> </p>
                                            </div>
                                            <div class="card-body container-fluid">
                                                <div class="table-responsive">
                                                    <table class="table table-hover table-sm" id="active_homes_table">
                                                        <thead class="text-primary">
                                                            <th><?php echo $this->lang->line("home_no"); ?>.</th>
                                                            <th><?php echo $this->lang->line("home_locate"); ?></th>
                                                            <th><?php echo $this->lang->line("building"); ?></th>
                                                            <th><?php echo $this->lang->line("room"); ?></th>
                                                            <th><?php echo $this->lang->line("address"); ?></th>
                                                            <th><?php echo $this->lang->line("status"); ?></th>
                                                            <th><?php echo $this->lang->line("action"); ?></th>
                                                        </thead>
                                                        <tbody>
                                                            <?php foreach ($active as $key => $actv) {
                                                                if (!empty($actv)) {
                                                            ?>
                                                                    <tr>
                                                                        <td><?php echo $actv['ids']; ?></td>
                                                                        <td>
                                                                            <?php echo $actv['locate']; ?></a>
                                                                        </td>
                                                                        <td><?php echo $actv['build']; ?></td>
                                                                        <td><?php echo $actv['room']; ?></td>
                                                                        <td><?php echo $actv['buildAddress']; ?></td>
                                                                        <td>
                                                                            <span class="font-italic text-muted "><?php if($actv['sta'] != "New") echo $actv['sta']; else echo $this->lang->line($actv['sta']); ?></span>
                                                                        </td>
                                                                        <td class="td-actions text-right">
                                                                            <button type="button" rel="tooltip" title="<?php echo $this->lang->line("go_to_payments"); ?>" class="btn btn-info btn-sm btn-link" onclick="location.href='<?php echo base_url() . 'payments/contract-details/'; ?>'">
                                                                                <i class="material-icons">payment</i>
                                                                            </button>
                                                                        </td>
                                                                    </tr>
                                                                <?php } else { ?>

                                                                    <tr>
                                                                        <td colspan="5"><?php echo $this->lang->line("no_data_available"); ?></td>
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
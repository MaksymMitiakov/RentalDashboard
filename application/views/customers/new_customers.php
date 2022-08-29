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
                                            <h4 class="card-title mt-0"><?php echo $this->lang->line("new_customer_table"); ?></h4>
                                            <p class="card-category"><?php echo $this->lang->line("below_is_the_list_of_all_new_customer"); ?> </p>
                                        </div>
                                        <div class="card-body container-fluid">
                                            <div class="table-responsive">
                                                <table class="table table-hover" id="new_customer_table">
                                                    <thead class="text-primary">
                                                        <th><?php echo $this->lang->line("account_no"); ?>.</th>
                                                        <th><?php echo $this->lang->line("name"); ?></th>
                                                        <th><?php echo $this->lang->line("phone"); ?></th>
                                                        <th><?php echo $this->lang->line("email"); ?></th>
                                                        <th><?php echo $this->lang->line("status"); ?></th>
                                                        <th><?php echo $this->lang->line("action"); ?></th>
                                                    </thead>
                                                    <tbody>
                                                        <?php foreach ($new_customers as $key => $newC) { ?>
                                                            <tr>
                                                                <td><?php echo $newC['ids']; ?></td>
                                                                <td>
                                                                    <a href="<?php echo base_url() . 'customers/profile/' . $newC['ids']; ?>" rel="tooltip" title="<?php echo $this->lang->line("go_to_profile"); ?>"><?php echo $newC['fullname']; ?></a>
                                                                </td>
                                                                <td>
                                                                    <?php echo $newC['phone']; ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $newC['email']; ?>
                                                                </td>
                                                                <td>
                                                                    <span class="font-italic text-muted "><?php echo $this->lang->line($newC['sta']); ?></span>
                                                                </td>
                                                                <td class="td-actions text-right">
                                                                    <button type="button" rel="tooltip" title="<?php echo $this->lang->line("view_customer"); ?>" class="btn btn-info btn-sm btn-link" data-target="#customers-<?php echo $newC['ids']; ?>" data-toggle="modal">
                                                                        <i class="material-icons">visibility</i>
                                                                    </button>|
                                                                    <button type="button" rel="tooltip" title="<?php echo $this->lang->line("apply_contract"); ?>" class="btn btn-primary btn-sm btn-link" onclick="location.href='<?php echo base_url() . 'contract/create-contract/' . $newC['ids']; ?>'">
                                                                        <i class="material-icons">monetization_on</i>
                                                                    </button>|
                                                                    <button type="button" rel="tooltip" title="<?php echo $this->lang->line("remove_customer"); ?>" class="btn btn-danger btn-sm btn-link" data-target="#delete_customer<?php echo $newC['ids']; ?>" id="remove-contract<?php echo $newC['ids']; ?>" data-toggle="modal">
                                                                        <i class="material-icons">remove_circle</i>
                                                                    </button>
                                                                </td>
                                                            </tr>
                                                            <!-- Modal to view client data -->
                                                            <div class="modal fade" id="customers-<?php echo $newC['ids']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title font-weight-bold" id="exampleModalLabel"><?php echo $this->lang->line("customer_information"); ?></h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <div class="row">
                                                                                <div class="col-md-12">
                                                                                    <p><strong><?php echo $this->lang->line("name"); ?>:</strong>
                                                                                        <?php echo $newC['fullname']; ?>
                                                                                    </p>
                                                                                    <p><strong><?php echo $this->lang->line("email"); ?>:</strong>
                                                                                        <?php echo $newC['email']; ?>
                                                                                    </p>
                                                                                    <p><strong><?php echo $this->lang->line("phone"); ?>:</strong>
                                                                                        <?php echo $newC['phone']; ?>
                                                                                    </p>
                                                                                    <p><strong><?php echo $this->lang->line("second_phone"); ?>:</strong>
                                                                                        <?php echo $newC['phone2']; ?>
                                                                                    </p>
                                                                                    <p><strong><?php echo $this->lang->line("job"); ?>:</strong>
                                                                                        <?php echo $newC['job']; ?>
                                                                                    </p>
                                                                                    <p><strong><?php echo $this->lang->line("education"); ?>:</strong>
                                                                                        <?php echo $newC['edu']; ?>
                                                                                    </p>
                                                                                    <p><strong><?php echo $this->lang->line("address"); ?>:</strong>
                                                                                        <?php echo $newC['address']; ?>
                                                                                    </p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo $this->lang->line("close"); ?></button>
                                                                            <button type="button" onclick="location.href='<?php echo base_url() . 'customers/profile/' . $newC['ids']; ?>'" class="btn btn-primary"><?php echo $this->lang->line("go_to_profile"); ?></button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- End of modal -->
                                                            <!-- Modal for remove clients -->
                                                            <div class="modal fade" id="delete_customer<?php echo $newC['ids']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title font-weight-bold" id="exampleModalLabel"><?php echo $this->lang->line("remove_customers_premanently"); ?></h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <p><?php echo $this->lang->line("are_you_sure_want_to_remove_this_customer"); ?></p>
                                                                            <small class="text-danger font-italic"><?php echo $this->lang->line("note_this_process_cannot_be_undoned"); ?></small>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo $this->lang->line("cancel"); ?></button>
                                                                            <button type="button" class="btn btn-danger customerdelete" id="<?php echo $newC['ids']; ?>"><?php echo $this->lang->line("remove"); ?></button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- End of modal -->
                                                        <?php } ?>
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

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
                                            <h4 class="card-title mt-0"><?=$this->lang->line('transactions_table');?></h4>
                                            <p class="card-category"> <?=$this->lang->line('below_is_the_list_of_transactions');?></p>
                                        </div>
                                        <div class="card-body container-fluid">
                                            <div class="table-responsive">
                                                <table class="table table-hover" id="transactions_table">
                                                    <thead class="text-primary">
                                                        <th><?=$this->lang->line('transaction_no');?>.</th>
                                                        <th><?=$this->lang->line('vendor_name');?></th>
                                                        <th><?=$this->lang->line('membership_type');?></th>
                                                        <th><?=$this->lang->line('amount');?></th>
                                                        <th><?=$this->lang->line('payment_type');?></th>
                                                        <th>Date</th>
                                                        <th>Action</th>
                                                    </thead>
                                                    <tbody>
                                                        <?php foreach ($transactions as $key => $newC) { ?>
                                                            <tr>
                                                                <td><?php echo $newC['transaction_id']; ?></td>
                                                                <td><a data-target="#update_membership-<?php echo $newC['transaction_id']; ?>" data-toggle="modal" rel="tooltip" title="<?php echo $this->lang->line("go_to_membership"); ?>"><?php echo $newC['username']; ?></a></td>
                                                                <!-- <td><?php echo $newC['names']; ?></td> -->
                                                                <td><?php echo $newC['membership_type_name']; ?></td>
                                                                <td><?php echo $newC['transaction_amount']; ?></td>
                                                                <td><?php echo $this->lang->line($newC['payment_type']); ?></td>
                                                                <td><?php echo changeDate($newC['transaction_date']); ?></td>

                                                                <td class="td-actions text-right">
                                                                    <button type="button" rel="tooltip" title="<?=$this->lang->line('view_transaction');?>" class="btn btn-info btn-sm btn-link" data-target="#memberships-<?php echo $newC['transaction_id']; ?>" data-toggle="modal">
                                                                        <i class="material-icons">visibility</i>
                                                                    </button>|
                                                                    <!-- <button type="button" rel="tooltip"  title="<?=$this->lang->line('edit_transaction');?>" class="btn btn-primary btn-sm btn-link" data-target="#update_membership-<?php echo $newC['transaction_id']; ?>" data-toggle="modal">
                                                                    <i class="material-icons">edit</i>
                                                                </button>| -->
                                                                    <button type="button" rel="tooltip" title="<?=$this->lang->line('remove_transaction');?>" class="btn btn-danger btn-sm btn-link" data-target="#delete_membership-<?php echo $newC['transaction_id']; ?>" id="remove-memberships<?php echo $newC['membership_id']; ?>" data-toggle="modal">
                                                                        <i class="material-icons">remove_circle</i>
                                                                    </button>
                                                                </td>
                                                            </tr>

                                                            <!-- Modal to view client data -->
                                                            <div class="modal fade" id="memberships-<?php echo $newC['transaction_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title font-weight-bold" id="exampleModalLabel"><?=$this->lang->line('');?>Transaction Information</h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <div class="row">
                                                                                <div class="col-md-12">
                                                                                    <p><strong><?=$this->lang->line('vendor_name');?>:</strong>
                                                                                        <?php echo $newC['username']; ?>
                                                                                    </p>
                                                                                    <p><strong><?=$this->lang->line('membership_type');?>:</strong>
                                                                                        <?php echo $newC['membership_type_name']; ?>
                                                                                    </p>
                                                                                    <p><strong><?=$this->lang->line('amount');?>:</strong>
                                                                                        <?php echo $newC['transaction_amount']; ?>
                                                                                    </p>
                                                                                    <p><strong><?=$this->lang->line('payment_type');?>:</strong>
                                                                                        <?php echo $newC['payment_type']; ?>
                                                                                    </p>
                                                                                    <p><strong><?=$this->lang->line('date');?>:</strong>
                                                                                        <?php echo changeDate($newC['transaction_date']); ?>
                                                                                    </p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-primary" data-dismiss="modal"><?=$this->lang->line('close');?></button>
                                                                            <!-- <button type="button" onclick="location.href='<?php echo base_url() . 'buildings/buildings/' . $newC['ids']; ?>'" class="btn btn-primary">Edit Building</button> -->
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <!-- Modal for remove clients -->
                                                            <div class="modal fade" id="delete_membership-<?php echo $newC['transaction_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title font-weight-bold" id="exampleModalLabel"><?=$this->lang->line('remove_transaction_permanently');?></h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <p><?=$this->lang->line('remove_transaction_confirm');?></p>
                                                                            <small class="text-danger font-italic"><?=$this->lang->line('note');?>: <?=$this->lang->line('cannot_undone');?></small>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-primary" data-dismiss="modal"><?=$this->lang->line('cancel');?></button>
                                                                            <button type="button" class="btn btn-danger transactionDelete" id="<?php echo $newC['transaction_id']; ?>"><?=$this->lang->line('remove');?></button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- End of modal -->
                                                            <!-- Modal for edit membership-->
                                                            <!-- <div class="modal fade" id="update_membership-<?php echo $newC['transaction_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
                                                            <div class="modal-dialog modal-lg" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title font-weight-bold text-primary" ><?=$this->lang->line('update_transaction');?></h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="row">
                                                                            <div class="col-md-12">
                                                                                <div class="row">
                                                                                    <div class="col-md-4">
                                                                                        <div class="form-group">
                                                                                            <input type="hidden" class="form-control" name="membership_id" value="<?php echo $newC['transaction_id']; ?>">
                                                                                            <label class="bmd-label-floating"><?=$this->lang->line('membership_name');?></label>
                                                                                            <input type="text" class="form-control name<?php echo $newC['transaction_id']; ?>" name="name" value="<?php echo $newC['name']; ?>" required>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-4">
                                                                                        <div class="form-group">
                                                                                            <label class="bmd-label-floating"><?=$this->lang->line('membership_amount');?></label>
                                                                                            <input type="number" class="form-control amount<?php echo $newC['transaction_id']; ?>" name=
                                                                                            "amount" value="<?php echo $newC['amount']; ?>" required>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-4">
                                                                                        <div class="form-group">
                                                                                            <label class="bmd-label-floating"><?=$this->lang->line('membership_days');?></label>
                                                                                            <input type="number" class="form-control days<?php echo $newC['transaction_id']; ?>" name="days" value="<?php echo $newC['days']; ?>" required>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="row">
                                                                                    <div class="col-md-4">
                                                                                        <div class="form-group">
                                                                                            <label class="bmd-label-floating"><?=$this->lang->line('contract_limit');?></label>
                                                                                            <input type="number" class="form-control contract_limit<?php echo $newC['transaction_id']; ?>" name=
                                                                                            "contract_limit" value="<?php echo $newC['contract_limit']; ?>" required>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-4">
                                                                                        <div class="form-group">
                                                                                            <label class="bmd-label-floating"><?=$this->lang->line('building_limit');?></label>
                                                                                            <input type="number" class="form-control build_limit<?php echo $newC['transaction_id']; ?>" name="build_limit" value="<?php echo $newC['build_limit']; ?>" required>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-4">
                                                                                        <div class="form-group">
                                                                                            <label class="bmd-label-floating"><?=$this->lang->line('home_limit');?></label>
                                                                                            <input type="number" class="form-control home_limit<?php echo $newC['transaction_id']; ?>" name="home_limit" value="<?php echo $newC['home_limit']; ?>" required>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary btn-round" data-dismiss="modal"><i class="material-icons">cancel</i> <?=$this->lang->line('cancel');?></button>
                                                                        <button type="submit" class="btn btn-primary btn-round membershipUpdate" id="<?php echo $newC['transaction_id']; ?>">
                                                                            <i class="material-icons">check_circle</i> <?=$this->lang->line('save');?>
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div> -->
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
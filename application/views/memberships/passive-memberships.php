<body class="">

    <?php $this->load->view('loading_screen');?>

    <div class="wrapper ">

        <!-- Top NavBar -->
        <?php $this->load->view('navigation/sidebar');?>
        <!-- End of NavBar -->

        <div class="main-panel">

            <!-- Navbar -->
            <?php $this->load->view('navigation/topbar');?>
            <!-- End Navbar -->

            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <?php $this->load->view('navigation/memberships_navbar');?>
                            <div class="tab-content tab-space">
                                <div class="tab-pane active">
                                    <div class="card">
                                        <div class="card-header card-header-primary">
                                            <h4 class="card-title mt-0"><?=$this->lang->line('passive_memberships_table')?></h4>
                                            <p class="card-category"> <?=$this->lang->line('below_is_the_list_of_passive_memberships')?></p>
                                        </div>
                                        <div class="card-body container-fluid">
                                            <div class="table-responsive">
                                                <table class="table table-hover" id="passive_membership_table">
                                                    <thead class="text-primary">
                                                        <th><?=$this->lang->line('membership_no')?></th>
                                                        <th><?=$this->lang->line('vendor_name')?></th>
                                                        <th><?=$this->lang->line('membership_type')?></th>
                                                        <th><?=$this->lang->line('transaction_no')?></th>
                                                        <th><?=$this->lang->line('contract_limit')?></th>
                                                        <th><?=$this->lang->line('start_date')?></th>
                                                        <th><?=$this->lang->line('expired_date')?></th>
                                                        <th><?=$this->lang->line('status')?></th>
                                                        <th><?=$this->lang->line('action')?></th>
                                                    </thead>
                                                    <tbody>
                                                    <?php  foreach($memberships as $key => $newC) { ?>
                                                        <tr>
                                                            <td><?php echo $newC['membership_no'];?></td>
                                                            <td><a data-target="#update_membership-<?php echo $newC['id'];?>" data-toggle="modal" rel="tooltip" title="<?php echo $this->lang->line("go_to_membership"); ?>"><?php echo $newC['vendorname'];?></a></td>
                                                            <!-- <td><?php echo $newC['names'];?></td> -->
                                                            <td><?php echo $newC['membership_type'];?></td>
                                                            <td><?php echo $newC['transaction_id'];?></td>
                                                            <td><?php echo $newC['contract_limit'];?></td>
                                                            <td><?php echo changeDate($newC['start_date']);?></td>
                                                            <td><?php echo changeDate($newC['expired_date']);?></td>

                                                            <td><span class="font-italic text-muted "><?php echo $this->lang->line($newC['membership_status']);?></span></td>
                                                            <td class="td-actions text-right">
                                                                <button type="button" rel="tooltip" title="<?php echo $this->lang->line("view_membership"); ?>" class="btn btn-info btn-sm btn-link" data-target="#memberships-<?php echo $newC['membership_no'];?>" data-toggle="modal">
                                                                    <i class="material-icons">visibility</i>
                                                                </button>|

                                                                <button type="button" rel="tooltip"  title="<?php echo $this->lang->line("edit_membership"); ?>" class="btn btn-primary btn-sm btn-link" data-target="#update_membership-<?php echo $newC['membership_no'];?>" data-toggle="modal">
                                                                    <i class="material-icons">edit</i>
                                                                </button>|
                                                                <button type="button" rel="tooltip" title="<?php echo $this->lang->line("active_membership"); ?>" class="btn btn-danger btn-sm btn-link" data-target="#active_membership-<?php echo $newC['membership_no'];?>" id="active-memberships<?php echo $newC['membership_no'];?>" data-toggle="modal">
                                                                    <i class="material-icons">verified_user</i>
                                                                </button>
                                                            </td>
                                                        </tr>

                                                         <!-- Modal to view memberships data -->
                                                        <div class="modal fade" id="memberships-<?php  echo $newC['membership_no'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title font-weight-bold" id="exampleModalLabel"><?=$this->lang->line('membership_information')?></h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="row">
                                                                            <div class="col-md-12">
                                                                                <p><strong><?=$this->lang->line('vendor_name')?>:</strong>
                                                                                    <?php echo $newC['vendorname'];?>
                                                                                </p>
                                                                                <p><strong><?=$this->lang->line('membership_type')?>:</strong>
                                                                                    <?php echo $newC['membership_type']; ?>
                                                                                </p>
                                                                                <p><strong><?=$this->lang->line('transaction_no')?>:</strong>
                                                                                    <?php echo $newC['transaction_id']; ?>
                                                                                </p>
                                                                                <p><strong><?=$this->lang->line('contract_limit')?>:</strong>
                                                                                    <?php echo $newC['contract_limit']; ?>
                                                                                </p>
                                                                                <p><strong><?=$this->lang->line('building_limit')?>:</strong>
                                                                                    <?php echo $newC['build_limit']; ?>
                                                                                </p>
                                                                                <p><strong><?=$this->lang->line('home_limit')?>:</strong>
                                                                                    <?php echo $newC['home_limit']; ?>
                                                                                </p>
                                                                                <p><strong><?=$this->lang->line('start_date')?>:</strong>
                                                                                    <?php echo changeDate($newC['start_date']); ?>
                                                                                </p>
                                                                                <p><strong><?=$this->lang->line('expired_date')?>:</strong>
                                                                                    <?php echo changeDate($newC['expired_date']); ?>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-primary" data-dismiss="modal"><?=$this->lang->line('close')?></button>
                                                                        <!-- <button type="button" onclick="location.href='<?php echo base_url().'buildings/buildings/'.$newC['ids'];?>'" class="btn btn-primary">Edit Building</button> -->
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Modal for remove memberships -->
                                                        <div class="modal fade" id="active_membership-<?php echo $newC['membership_no'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title font-weight-bold" id="exampleModalLabel"><?=$this->lang->line('active_membership_permanently')?></h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <p><?=$this->lang->line('active_membership_confirm')?></p>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-primary" data-dismiss="modal"><?=$this->lang->line('cancel')?></button>
                                                                        <button type="button" class="btn btn-danger membershipActive" id="<?php echo $newC['membership_no'];?>"><?=$this->lang->line('save')?></button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- End of modal -->
                                                        <!-- Modal for edit membership-->
                                                        <div class="modal fade" id="update_membership-<?php echo $newC['membership_no'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
                                                            <div class="modal-dialog modal-lg" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title font-weight-bold text-primary" ><?=$this->lang->line('update_membership')?></h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="row">
                                                                            <div class="col-md-12">
                                                                                <div class="row">
                                                                                    <div class="col-md-6">
                                                                                        <div class="form-group">
                                                                                            <label class="bmd-label-floating"><?=$this->lang->line('membership_type')?></label>
                                                                                            <select id="membership_type" name="membership_type" class="form-control membership_type<?php echo $newC['membership_no'];?>">
                                                                                            <?php if($newC['membership_value'] == "") { ?>
                                                                                                <option disabled selected><?=$this->lang->line('select_membership_type')?></option>
                                                                                            <?php } else { ?>
                                                                                                <option disabled selected value="<?php echo $newC["membership_value"]?>"><?php echo $newC["membership_type"]?></option>
                                                                                            <?php }?>
                                                                                            <?php foreach($membershipTypes as $key => $membershipType) {
                                                                                                if(!empty($membershipType)){  ?>
                                                                                                <option value="<?php echo $membershipType['membership_id'];?>"><?php echo $membershipType['name'];?> </option>
                                                                                            <?php }} ?>
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-6">
                                                                                        <div class="form-group">
                                                                                            <label class="bmd-label-floating"><?=$this->lang->line('vendor')?></label>
                                                                                            <select id="vendor_id" name="vendor_id" class="form-control vendor_id<?php echo $newC['membership_no'];?>" disabled>
                                                                                            <?php if($newC['user_id'] == "") { ?>
                                                                                                <option disabled selected><?=$this->lang->line('select_vendor')?></option>
                                                                                            <?php } else { ?>
                                                                                                <option disabled selected value="<?php echo $newC["user_id"]?>"><?php echo $newC["vendorname"]?></option>
                                                                                            <?php }?>
                                                                                            <?php foreach($vendors as $key => $vendor) {
                                                                                                if(!empty($newC)){  ?>
                                                                                                <option value="<?php echo $vendor['id'];?>"><?php echo $vendor['username'];?> </option>
                                                                                            <?php }} ?>
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-6">
                                                                                        <div class="form-group">
                                                                                            <label class="bmd-label-floating"><?=$this->lang->line('start_date')?></label>
                                                                                            <input type="text" class="form-control added_date<?php echo $newC["membership_no"]?>" name="added_date" value="<?php echo changeDate($newC['start_date']); ?>" onfocus="(this.type='date')" onblur="if(!this.value)this.type='text'" required>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-6">
                                                                                        <div class="form-group">
                                                                                            <label class="bmd-label-floating"><?=$this->lang->line('expired_date')?></label>
                                                                                            <input type="text" class="form-control expired_date<?php echo $newC["membership_no"]?>" name="expired_date" value="<?php echo changeDate($newC['expired_date']); ?>" onfocus="(this.type='date')" onblur="if(!this.value)this.type='text'" required>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary btn-round" data-dismiss="modal"><i class="material-icons">cancel</i> <?=$this->lang->line('cancel')?></button>
                                                                        <button type="submit" class="btn btn-primary btn-round membershipUpdate" id="<?php echo $newC['membership_no'];?>">
                                                                            <i class="material-icons">check_circle</i> <?=$this->lang->line('save')?>
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- End of modal -->
                                                    <?php }?>
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

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
                        <div class="col-md-6">
                            <button class="btn btn-primary btn-round btn-sm" data-target="#my_task" data-toggle="modal"><i class="material-icons">add_circle</i><?php echo $this->lang->line("add_task"); ?></button>
                            <div class="card">
                                <div class="card-header card-header-primary">
                                    <h4 class="card-title"><?php echo $this->lang->line("my_task"); ?></h4>
                                    <p class="card-category"><?php echo $this->lang->line("you_can_add_task_or_reminder"); ?></p>
                                </div>
                                <div class="card-body">
                                    <table class="table">
                                        <tbody>
                                            <?php if (!empty($task)) { ?>
                                                <?php foreach ($task as $key => $mytask) { ?>
                                                    <tr class="task<?php echo $mytask['task_id']; ?>">
                                                        <td><?php echo $mytask['description']; ?></td>
                                                        <td><?php echo $this->lang->line($mytask['status']); ?></td>
                                                        <?php if ($mytask['status'] == "Completed") { ?>
                                                            <td class="td-actions text-right">
                                                                <button type="button" rel="tooltip" title="<?php echo $this->lang->line("remove"); ?>" class="btn btn-danger btn-link btn-sm remove_task" id="<?php echo $mytask['task_id']; ?>">
                                                                    <i class="material-icons">close</i>
                                                                </button></td>
                                                        <?php } else { ?>
                                                            <td class="td-actions text-right">
                                                                <button type="button" rel="tooltip" title="<?php echo $this->lang->line("done_task"); ?>" class="btn btn-success btn-link btn-sm done_task" id="<?php echo $mytask['task_id']; ?>">
                                                                    <i class="material-icons">done_all</i>
                                                                </button>
                                                                <button type="button" rel="tooltip" title="<?php echo $this->lang->line("edit_task"); ?>" class="btn btn-primary btn-link btn-sm edit_task" id="<?php echo $mytask['task_id']; ?>">
                                                                    <i class="material-icons">edit</i>
                                                                </button>
                                                                <button type="button" rel="tooltip" title="<?php echo $this->lang->line("remove"); ?>" class="btn btn-danger btn-link btn-sm remove_task" id="<?php echo $mytask['task_id']; ?>">
                                                                    <i class="material-icons">close</i>
                                                                </button>
                                                            </td>
                                                        <?php } ?>
                                                    </tr>
                                                    <tr class="cancel_task<?php echo $mytask['task_id']; ?>" style="display: none;">
                                                        <form id="edit_task" method="POST">
                                                            <td>
                                                                <input class="form-control task_des" type="text" name="description" value="<?php echo $mytask['description']; ?>">
                                                            </td>
                                                            <td><?php echo $this->lang->line($mytask['status']); ?></td>
                                                            <td class="td-actions text-right">
                                                                <button rel="tooltip" title="<?php echo $this->lang->line("update_task"); ?>" class="btn btn-success btn-link btn-sm update_task" id="<?php echo $mytask['task_id']; ?>">
                                                                    <i class="material-icons">done</i>
                                                                </button>
                                                                <button type="button" rel="tooltip" title="<?php echo $this->lang->line("cancel_task"); ?>" class="btn btn-danger btn-link btn-sm cancel_task" id="<?php echo $mytask['task_id']; ?>">
                                                                    <i class="material-icons">close</i>
                                                                </button>
                                                            </td>
                                                        </form>
                                                    </tr>
                                                <?php }
                                            } else { ?>
                                                <tr>
                                                    <td class="text-center"><?php echo $this->lang->line("no_created_task"); ?></td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card card-profile">
                                <div class="card-avatar" style="height: 150px">
                                    <img class="img" src="<?php echo base_url(); ?>assets/images/person.png" />
                                </div>
                                <div class="card-body">
                                    <h6 class="card-category text-gray"><?php echo $vendor['user_type']; ?></h6>
                                    <h4 class="card-title"><?php echo $vendor['fullname']; ?></h4>

                                    <table class="w-100">
                                        <tr class="text-left">
                                            <td class="font-weight-bold"><?php echo $this->lang->line("company:"); ?></td>
                                            <td><?php echo $vendor['company']; ?> </td>
                                        </tr>
                                        <tr class="text-left">
                                            <td class="font-weight-bold"><?php echo $this->lang->line("email:"); ?></td>
                                            <td><?php echo $vendor['email']; ?> </td>
                                        </tr>
                                        <tr class="text-left">
                                            <td class="font-weight-bold"><?php echo $this->lang->line("phone:"); ?></td>
                                            <td><?php echo $vendor['phone']; ?> </td>
                                        </tr>
                                        <tr class="text-left">
                                            <td class="font-weight-bold"><?php echo $this->lang->line("address:"); ?></td>
                                            <td><?php echo $vendor['address']; ?> </td>
                                        </tr>
                                    </table>
                                    <?php if ($this->session->userdata('username') == $vendor['user']) { ?>
                                        <button class="btn btn-primary btn-sm btn-round mt-4 pl-2 pr-3" data-target="#edit_my_profile" data-toggle="modal"><i class="material-icons">edit</i> <?php echo $this->lang->line("update"); ?></button>
                                    <?php } ?>
                                    <table class="w-100">
                                        <?php if(isset($membership['name']) && isset($membership['build_limit']) && isset($membership['home_limit']) && isset($membership['contract_limit'])) { ?>
                                            <tr class="text-left">
                                                <td class="font-weight-bold"><?php echo $this->lang->line("membership_type:"); ?></td>
                                                <td><?php echo isset($membership['name'])? $membership['name'] : ""; ?> </td>
                                            </tr>
                                            <tr class="text-left">
                                                <td class="font-weight-bold"><?php echo $this->lang->line("building_count_limit"); ?></td>
                                                <td><?php echo ($membership['build_limit'] - $buildingsCount['count']).' / '.($membership['build_limit']); ?> </td>
                                            </tr>
                                            <tr class="text-left">
                                                <td class="font-weight-bold"><?php echo $this->lang->line("home_count_limit"); ?></td>
                                                <td><?php echo ($membership['home_limit'] - $homesCount['count']).' / '.$membership['home_limit']; ?> </td>
                                            </tr>
                                            
                                            <tr class="text-left">
                                                <td class="font-weight-bold"><?php echo $this->lang->line("contract_count_limit"); ?></td>
                                                <td><?php echo ($membership['contract_limit'] - $contractsCount['count']).' / '.$membership['contract_limit']; ?> </td>
                                            </tr>
                                            
                                            <tr class="text-left">
                                                <td class="font-weight-bold"><?php echo $this->lang->line("start_date"); ?>:</td>
                                                <td><?php echo $membership['added_date']; ?> </td>
                                            </tr>
                                            <tr class="text-left">
                                                <td class="font-weight-bold"><?php echo $this->lang->line("end_date"); ?>:</td>
                                                <td><?php echo $membership['expired_date']; ?> </td>
                                            </tr>
                                        <?php } else { ?>
                                            <tr class="text-left">
                                                <td class="font-weight-bold"><?php echo $this->lang->line("membership_type:"); ?></td>
                                                <td></td>
                                            </tr>
                                            <tr class="text-left">
                                                <td class="font-weight-bold"><?php echo $this->lang->line("building_count_limit"); ?></td>
                                                <td></td>
                                            </tr>
                                            <tr class="text-left">
                                                <td class="font-weight-bold"><?php echo $this->lang->line("home_count_limit"); ?></td>
                                                <td></td>
                                            </tr>
                                            
                                            <tr class="text-left">
                                                <td class="font-weight-bold"><?php echo $this->lang->line("contract_count_limit"); ?></td>
                                                <td></td>
                                            </tr>
                                            
                                            <tr class="text-left">
                                                <td class="font-weight-bold"><?php echo $this->lang->line("start_date"); ?>:</td>
                                                <td></td>
                                            </tr>
                                            <tr class="text-left">
                                                <td class="font-weight-bold"><?php echo $this->lang->line("end_date"); ?>:</td>
                                                <td></td>
                                            </tr>
                                        <?php } ?>

                                    </table>
                                    <div>
                                        <?php if ($this->session->userdata('username') == $vendor['user']) { ?>
                                            <button class="btn btn-primary btn-sm btn-round mt-4 pl-2 pr-3" data-target="#update_membership" data-toggle="modal"><i class="material-icons">edit</i><?php echo $this->lang->line("update_membership"); ?></button>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal for task-->
            <div class="modal fade" id="my_task" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title font-weight-bold text-primary"><?php echo $this->lang->line("create_task"); ?></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form id="task_form" method="POST">
                                <div class="row mt-1">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="text-primary"><?php echo $this->lang->line("create_yourtask"); ?></label>
                                            <div class="form-group">
                                                <label class="bmd-label-floating"><?php echo $this->lang->line("write_something_about_yourtask"); ?></label>
                                                <textarea class="form-control" name="task" rows="5"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary btn-round" data-dismiss="modal"><i class="material-icons">cancel</i> <?php echo $this->lang->line("cancel"); ?></button>
                            <button type="submit" class="btn btn-primary btn-round" id="my_task_btn">
                                <i class="material-icons">check_circle</i> <?php echo $this->lang->line("save"); ?>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal for edit profile-->
            <div class="modal fade" id="edit_my_profile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title font-weight-bold text-primary"><?php echo $this->lang->line("update_profile"); ?></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form id="update_my_form" enctype="mutlipart/form-data" method="POST">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="form-group form-file-upload form-file-multiple ">
                                                <input type="file" accept="image/*" onchange="loadFile(event)" name="img" class="inputFileHidden" s required>
                                                <div class="fileinput-new thumbnail img-raised text-center">

                                                    <img class="img-fluid" src="<?php echo base_url(); ?>assets/images/person.png" width="200" height="200" id="output" />

                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-8">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="bmd-label-floating"><?php echo $this->lang->line("fullname"); ?></label>
                                                    <input type="text" class="form-control" name="fname" value="<?php echo $vendor['fullname']; ?>" required>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="bmd-label-floating"><?php echo $this->lang->line("companyname"); ?></label>
                                                    <input type="text" class="form-control" name="company" value="<?php echo $vendor['company']; ?>" required>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="bmd-label-floating"><?php echo $this->lang->line("contract_number"); ?></label>
                                                    <input type="number" class="form-control" name="phone" value="<?php echo $vendor['phone']; ?>" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="bmd-label-floating"><?php echo $this->lang->line("email_address"); ?></label>
                                                    <input type="email" class="form-control" name="email" value="<?php echo $vendor['email']; ?>" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="bmd-label-floating"<?php echo $this->lang->line("address"); ?>></label>
                                                    <input type="text" class="form-control" name="address" value="<?php echo $vendor['address']; ?>" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary btn-round" data-dismiss="modal"><i class="material-icons">cancel</i><?php echo $this->lang->line("cancel"); ?></button>
                            <button type="submit" class="btn btn-primary btn-round" id="update_my_profile">
                                <i class="material-icons">check_circle</i> <?php echo $this->lang->line("save"); ?>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End of modal -->
        </div>
    </div>
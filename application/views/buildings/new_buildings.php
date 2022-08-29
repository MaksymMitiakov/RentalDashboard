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
                            <?php $this->load->view('navigation/buildings_navbar'); ?>
                            <div class="tab-content tab-space">
                                <div class="tab-pane active">
                                    <div class="card">
                                        <div class="card-header card-header-primary">
                                            <h4 class="card-title mt-0"><?php echo $this->lang->line("new_building_table"); ?></h4>
                                            <p class="card-category"><?php echo $this->lang->line("below_is_the_list_of_all_new_building"); ?></p>
                                        </div>
                                        <div class="card-body container-fluid">
                                            <div class="table-responsive">
                                                <table class="table table-hover" id="new_building_table">
                                                    <thead class="text-primary">
                                                        <th><?php echo $this->lang->line("building_no"); ?>.</th>
                                                        <th><?php echo $this->lang->line("name"); ?></th>
                                                        <th><?php echo $this->lang->line("city_district"); ?></th>
                                                        <th><?php echo $this->lang->line("type"); ?></th>
                                                        <th><?php echo $this->lang->line("status"); ?></th>
                                                        <th><?php echo $this->lang->line("action"); ?></th>
                                                    </thead>
                                                    <tbody>
                                                        <?php foreach ($new_buildings as $key => $newC) { ?>
                                                            <tr>
                                                                <td><?php echo $newC['ids']; ?></td>
                                                                <td><a href="<?php echo base_url() . 'buildings/update-buildings/' . $newC['ids']; ?>" rel="tooltip" title="<?php echo $this->lang->line("go_to_building"); ?>"><?php echo $newC['names']; ?></a></td>
                                                                <!-- <td><?php echo $newC['names']; ?></td> -->
                                                                <td><?php echo $newC['city'] . '/ ' . $newC['district']; ?></td>
                                                                <td><?php echo $newC['type']; ?></td>
                                                                <td><span class="font-italic text-muted "><?php if($newC['sta']=="New") echo $this->lang->line($newC['sta']); else echo $newC['sta']; ?></span></td>
                                                                <td class="td-actions text-right">
                                                                    <button type="button" rel="tooltip" title="<?php echo $this->lang->line('view_buildings'); ?>" class="btn btn-info btn-sm btn-link" data-target="#buildings-<?php echo $newC['ids']; ?>" data-toggle="modal">
                                                                        <i class="material-icons">visibility</i>
                                                                    </button>|
                                                                    <button type="button" rel="tooltip" title="<?php echo $this->lang->line("edit_buildings"); ?>" class="btn btn-primary btn-sm btn-link">
                                                                        <a href="<?php echo base_url() . 'buildings/update-buildings/' . $newC['ids']; ?>"><i class="material-icons">edit</i></a>
                                                                    </button>|
                                                                    <button type="button" rel="tooltip" title="<?php echo $this->lang->line("remove_buildings"); ?>" class="btn btn-danger btn-sm btn-link" data-target="#delete_building-<?php echo $newC['ids']; ?>" id="remove-loan<?php echo $newC['ids']; ?>" data-toggle="modal">
                                                                        <i class="material-icons">remove_circle</i>
                                                                    </button>
                                                                </td>
                                                            </tr>

                                                            <!-- Modal to view client data -->
                                                            <div class="modal fade" id="buildings-<?php echo $newC['ids']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title font-weight-bold" id="exampleModalLabel"><?php echo $this->lang->line("buildings_information"); ?></h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <div class="row">
                                                                                <div class="col-md-4">
                                                                                    <?php if (empty($newC['build_img'])) { ?>
                                                                                        <img class="border-round" src="<?php echo base_url() . 'assets/images/building.png' ?>" width="150" height="150" />
                                                                                    <?php } else { ?>
                                                                                        <img class="border-round" src="<?php echo base_url() . 'uploads/buildings/' . $newC['build_img']; ?>" width="150" height="150" />
                                                                                    <?php } ?>
                                                                                </div>
                                                                                <div class="col-md-8">
                                                                                    <p><strong><?php echo $this->lang->line("buildingname"); ?>:</strong>
                                                                                        <?php echo $newC['names']; ?>
                                                                                    </p>
                                                                                    <p><strong><?php echo $this->lang->line("address"); ?>:</strong>
                                                                                        <?php echo $newC['address']; ?>
                                                                                    </p>
                                                                                    <p><strong><?php echo $this->lang->line("city_district"); ?>:</strong>
                                                                                        <?php echo $newC['city']; ?>,<?php echo $newC['district']; ?>
                                                                                    </p>
                                                                                    <p><strong><?php echo $this->lang->line("postalcode"); ?>:</strong>
                                                                                        <?php echo $newC['post_code']; ?>
                                                                                    </p>
                                                                                    <p><strong><?php echo $this->lang->line("building_type"); ?>:</strong>
                                                                                        <?php echo $newC['type']; ?>
                                                                                    </p>
                                                                                    <p><strong><?php echo $this->lang->line("number_of_floors"); ?>:</strong>
                                                                                        <?php echo $newC['floor']; ?>
                                                                                    </p>
                                                                                    <p><strong><?php echo $this->lang->line("building_age"); ?>:</strong>
                                                                                        <?php echo $newC['age']; ?>
                                                                                    </p>
                                                                                    <p><strong><?php echo $this->lang->line("number_of_homes"); ?>:</strong>
                                                                                        <?php echo $newC['room']; ?>
                                                                                    </p>

                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-primary" data-dismiss="modal"><?php echo $this->lang->line("close"); ?></button>
                                                                            <!-- <button type="button" onclick="location.href='<?php echo base_url() . 'buildings/buildings/' . $newC['ids']; ?>'" class="btn btn-primary">Edit Building</button> -->
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <!-- Modal for remove clients -->
                                                            <div class="modal fade" id="delete_building-<?php echo $newC['ids']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title font-weight-bold" id="exampleModalLabel"><?php echo $this->lang->line("remove_building_permanently"); ?></h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <p><?php echo $this->lang->line("remvoe_this_building"); ?></p>
                                                                            <small class="text-danger font-italic"><?php echo $this->lang->line("note_this_process_cannot_be_undoned"); ?></small>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-primary" data-dismiss="modal"><?php echo $this->lang->line("cancel"); ?></button>
                                                                            <button type="button" class="btn btn-danger buildingdelete" id="<?php echo $newC['ids']; ?>"><?php echo $this->lang->line("remove"); ?></button>
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
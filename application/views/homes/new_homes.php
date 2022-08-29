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
                                            <h4 class="card-title mt-0"><?=$this->lang->line('new_homes_table')?></h4>
                                            <p class="card-category"><?=$this->lang->line('below_is_the_list_of_all_new_homes')?></p>
                                        </div>
                                        <div class="card-body container-fluid">
                                            <div class="table-responsive">
                                                <table class="table table-hover" id="new_home_table">
                                                    <thead class="text-primary">
                                                        <th><?=$this->lang->line('home_no')?>.</th>
                                                        <th><?=$this->lang->line('home_locate')?></th>
                                                        <th><?=$this->lang->line('building_name')?></th>
                                                        <th><?=$this->lang->line('room')?></th>
                                                        <th><?=$this->lang->line('address')?></th>
                                                        <th><?=$this->lang->line('status')?></th>
                                                        <th><?=$this->lang->line('action')?></th>
                                                    </thead>
                                                    <tbody>
                                                        <?php foreach ($new_homes as $key => $newC) { ?>
                                                            <tr>
                                                                <td><?php echo $newC['ids']; ?></td>
                                                                <td>
                                                                    <a href="<?php echo base_url() . 'homes/homes-info/' . $newC['ids']; ?>" rel="tooltip" title="<?php echo $this->lang->line("go_to_home") ?>"><?php echo $newC['locate']; ?></a>
                                                                </td>
                                                                <td>
                                                                    <?php echo $newC['build']; ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $newC['room']; ?>
                                                                </td>
                                                                <td>
                                                                    <?php echo $newC['buildAddress']; ?>
                                                                </td>
                                                                <td>
                                                                    <span class="font-italic text-muted "><?php if($newC['sta'] != "New") echo $newC['sta']; else echo $this->lang->line($newC['sta']); ?></span>
                                                                </td>

                                                                <td class="td-actions text-right">
                                                                    <button type="button" rel="tooltip" title="<?php echo $this->lang->line("view_home"); ?>" class="btn btn-info btn-sm btn-link" data-target="#homes-<?php echo $newC['ids']; ?>" data-toggle="modal">
                                                                        <i class="material-icons">visibility</i>
                                                                    </button>|
                                                                    <button type="button" rel="tooltip" title="<?php echo $this->lang->line("edit_home"); ?>" class="btn btn-primary btn-sm btn-link" data-target="#edit_home-<?php echo $newC['ids']; ?>" data-toggle="modal">
                                                                        <a href="<?php echo base_url(); ?>homes/homes-info/<?php echo $newC['ids']; ?>"><i class="material-icons">edit</i></a>
                                                                    </button>|
                                                                    <button type="button" rel="tooltip" title="<?php echo $this->lang->line("remove_home"); ?>" class="btn btn-danger btn-sm btn-link" data-target="#delete_home<?php echo $newC['ids']; ?>" id="remove-home<?php echo $newC['ids']; ?>" data-toggle="modal">
                                                                        <i class="material-icons">remove_circle</i>
                                                                    </button>
                                                                </td>
                                                            </tr>

                                                            <!-- Modal to view client data -->
                                                            <div class="modal fade" id="homes-<?php echo $newC['ids']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title font-weight-bold" id="exampleModalLabel"><?=$this->lang->line('home_information')?></h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <div class="row">
                                                                                <div class="col-md-4">
                                                                                    <?php if (!empty($newC['home_img'])) {
                                                                                        $images = explode(':', $newC['home_img']);
                                                                                        for ($i = 0; $i < sizeof($images) - 1; $i++) {
                                                                                            if($images[$i] != ""){
                                                                                    ?>
                                                                                            <img class="border-round" src="<?php echo base_url() . 'uploads/homes/' . $images[$i]; ?>" width="150" height="150" />

                                                                                        <?php }}
                                                                                    } else { ?>
                                                                                        <img class="border-round" src="<?php echo base_url() . 'assets/images/person.png' ?>" width="150" height="150" />
                                                                                    <?php } ?>
                                                                                </div>
                                                                                <div class="col-md-8">
                                                                                    <p><strong><?=$this->lang->line('building_name')?>:</strong>
                                                                                        <?php echo $newC['build']; ?>
                                                                                    </p>
                                                                                    <p><strong><?=$this->lang->line('door_number')?>:</strong>
                                                                                        <?php echo $newC['door_number']; ?>
                                                                                    </p>
                                                                                    <p><strong><?=$this->lang->line('number_of_rooms')?>:</strong>
                                                                                        <?php echo $newC['room']; ?>
                                                                                    </p>
                                                                                    <p><strong><?=$this->lang->line('current_floor')?>:</strong>
                                                                                        <?php echo $newC['locate']; ?>
                                                                                    </p>
                                                                                    <p><strong><?=$this->lang->line('using_status')?>:</strong>
                                                                                        <?php echo $newC['using_status']; ?>
                                                                                    </p>
                                                                                    <p><strong><?=$this->lang->line('home_address')?>:</strong>
                                                                                        <?php echo $newC['buildAddress']; ?>
                                                                                    </p>
                                                                                    <p><strong><?=$this->lang->line('info')?>:</strong>
                                                                                        <?php echo $newC['description']; ?>
                                                                                    </p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal"><?=$this->lang->line('close')?></button>
                                                                            <button type="button" onclick="location.href='<?php echo base_url() . 'homes/homes-info/' . $newC['ids']; ?>'" class="btn btn-primary"><?=$this->lang->line('edit_home')?></button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- End of modal -->
                                                            <!-- Modal for remove clients -->
                                                            <div class="modal fade" id="delete_home<?php echo $newC['ids']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title font-weight-bold" id="exampleModalLabel"><?=$this->lang->line('remove_home_permanently')?></h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <p><?=$this->lang->line('remove_home_confirm')?></p>
                                                                            <small class="text-danger font-italic"><?=$this->lang->line('note')?>: <?=$this->lang->line('cannot_undo')?></small>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal"><?=$this->lang->line('cancel')?></button>
                                                                            <button type="button" class="btn btn-danger homesdelete" id="<?php echo $newC['ids']; ?>"><?=$this->lang->line('remove')?></button>
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

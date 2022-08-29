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
                                            <h4 class="card-title"><?= $this->lang->line('edit_home_info') ?></h4>
                                            <p class="card-category"><?= $this->lang->line('complete_home_info') ?></p>
                                        </div>
                                        <div class="card-body">
                                            <form id="form-updater" enctype="mutlipart/form-data" action="" method="POST">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="row">
                                                            <div class="col-md-12 image-gallery">
                                                                <!-- Container for the image gallery -->
                                                                <div class="container">
                                                                    <div id="mainImages">
                                                                        <?php
                                                                        $images = explode(':', $homeInfo['home_img']);
                                                                        for ($i = 0; $i < sizeof($images) - 1; $i++) {
                                                                            if ($images[$i] != "") {
                                                                        ?>
                                                                                <div class="mySlides" index="<?= $i + 1; ?>">
                                                                                    <div class="image-area">
                                                                                        <img ref="<?= $images[$i]; ?>" src="<?php echo base_url() . 'uploads/homes/' . $images[$i]; ?>" style="width: 100%;">
                                                                                        <a class="remove-image" href="#" style="display: inline;">&#215;</a>
                                                                                    </div>
                                                                                </div>
                                                                            <?php }
                                                                        }
                                                                        if ($images[0] == "") { ?>
                                                                            <div class="mySlides">
                                                                                <div class="image-area">
                                                                                    <img src="<?php echo base_url(); ?>assets/images/building.png" style="width: 100%;">
                                                                                </div>
                                                                            </div>
                                                                        <?php } ?>
                                                                    </div>

                                                                    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                                                                    <a class="next" onclick="plusSlides(1)">&#10095;</a>

                                                                    <!-- Image text -->
                                                                    <div class="caption-container">
                                                                        <p id="caption"></p>
                                                                    </div>

                                                                    <!-- Thumbnail images -->
                                                                    <div class="row">
                                                                        <div class="container" id="tinyImages">
                                                                            <?php
                                                                            $images = explode(':', $homeInfo['home_img']);
                                                                            for ($i = 0; $i < sizeof($images) - 1; $i++) {
                                                                                if ($images[$i] != "") {
                                                                            ?>
                                                                                    <div class="column" index="<?= $i + 1 ?>">
                                                                                        <img class="demo cursor" src="<?php echo base_url() . 'uploads/homes/thumbs/' . $images[$i]; ?>" style="width: 100%" alt="<?php echo $homeInfo['description']; ?>">
                                                                                    </div>
                                                                                <?php }
                                                                            }
                                                                            if ($images[0] == "") { ?>
                                                                                <div class="column">
                                                                                    <img class="demo cursor" src="<?php echo base_url(); ?>assets/images/building.png" style="width: 100%;" alt="">
                                                                                </div>
                                                                            <?php } ?>
                                                                        </div>
                                                                    </div>
                                                                    <?php
                                                                    $images = explode(':', $homeInfo['home_img']);
                                                                    for ($i = 0; $i < sizeof($images) - 1; $i++) {
                                                                    ?>
                                                                        <!-- Modal for remove clients -->
                                                                        <div class="modal fade" id="delete_image-<?php echo $i; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                            <div class="modal-dialog" role="document">
                                                                                <div class="modal-content">
                                                                                    <div class="modal-header">
                                                                                        <h5 class="modal-title font-weight-bold" id="exampleModalLabel"><?= $this->lang->line('remove_image_permanently') ?></h5>
                                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                            <span aria-hidden="true">&times;</span>
                                                                                        </button>
                                                                                    </div>
                                                                                    <div class="modal-body">
                                                                                        <p><?= $this->lang->line('remove_image_confirm') ?></p>
                                                                                    </div>
                                                                                    <div class="modal-footer">
                                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><?= $this->lang->line('cancel') ?></button>
                                                                                        <button type="button" ids="<?php echo $homeInfo["homeid"]; ?>" image="<?php echo $images[$i]; ?>" class="btn btn-danger imagedelete"><?= $this->lang->line('remove') ?></button>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <!-- End of modal -->
                                                                    <?php } ?>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="container">
                                                                        <div class="form-group">
                                                                            <div class="form-group form-file-upload form-file-simple ">
                                                                                <input type="file" accept="image/*" class="inputFileHidden">

                                                                                <div class="input-group mt-2">
                                                                                    <span class="input-group-btn">
                                                                                        <button type="button" class="btn btn-fab btn-round btn-primary">
                                                                                            <i class="material-icons">attach_file</i>
                                                                                        </button>
                                                                                    </span>
                                                                                    <input id="selectedFileName" type="text" class="form-control inputFileVisible" placeholder="<?= $this->lang->line('choose_home_picture') ?>..">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="bmd-label-floating"><?= $this->lang->line('home_no') ?></label>
                                                                    <input type="number" class="form-control id" name="id" value="<?php echo $homeInfo['id'] ?>" readonly>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">

                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="bmd-label-floating"><?= $this->lang->line('door_number') ?></label>
                                                                    <input type="number" class="form-control door_number" name="door_number" value="<?php echo $homeInfo['door_number'] ?>">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="bmd-label-floating"><?= $this->lang->line('rent_price') ?></label>
                                                                    <input type="number" class="form-control price" name="price" value="<?php echo $homeInfo['price'] ?>">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="bmd-label-floating"><?= $this->lang->line('monthly_dues') ?></label>
                                                                    <input type="number" class="form-control dues" name="dues" value="<?php echo $homeInfo['dues'] ?>">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="bmd-label-floating"><?= $this->lang->line('deposit') ?></label>
                                                                    <input type="number" class="form-control deposit" name="deposit" value="<?php echo $homeInfo['deposit'] ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <select id="build_id" name="build_id" class="form-control build_id">
                                                                        <option disabled selected><?= $this->lang->line('choose_building') ?></option>
                                                                        <?php foreach ($buildings as $key => $build) {
                                                                            if (!empty($build)) {
                                                                                if ($homeInfo['build_id'] == $build['id']) { ?>
                                                                                    <option selected value="<?php echo $build['id']; ?>"><?php echo $build['name']; ?> </option>
                                                                                <?php } else { ?>
                                                                                    <option value="<?php echo $build['id']; ?>"><?php echo $build['name']; ?> </option>
                                                                        <?php }
                                                                            }
                                                                        } ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <select id="locate_id" name="locate_id" class="form-control locate_id">
                                                                        <option disabled selected><?= $this->lang->line('current_floor') ?></option>
                                                                        <?php foreach ($locates as $key => $locate) {
                                                                            if (!empty($locate)) {
                                                                                if ($homeInfo['locate_id'] == $locate['id']) { ?>
                                                                                    <option selected value="<?php echo $locate['id']; ?>"><?php echo $locate['name']; ?> </option>
                                                                                <?php } else { ?>
                                                                                    <option value="<?php echo $locate['id']; ?>"><?php echo $locate['name']; ?> </option>
                                                                        <?php }
                                                                            }
                                                                        } ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <select id="room_id" name="room_id" class="form-control room_id">
                                                                        <option disabled selected><?= $this->lang->line('number_of_rooms') ?></option>
                                                                        <?php foreach ($rooms as $key => $room) {
                                                                            if (!empty($room)) {
                                                                                if ($homeInfo['room_id'] == $room['id']) { ?>
                                                                                    <option selected value="<?php echo $room['id']; ?>"><?php echo $room['name']; ?> </option>
                                                                                <?php } else { ?>
                                                                                    <option value="<?php echo $room['id']; ?>"><?php echo $room['name']; ?> </option>
                                                                        <?php }
                                                                            }
                                                                        } ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <select id="heating_id" name="heating_id" class="form-control heating_id">
                                                                        <option disabled selected><?= $this->lang->line('heating_type') ?></option>
                                                                        <?php foreach ($heatings as $key => $heating) {
                                                                            if (!empty($heating)) {
                                                                                if ($homeInfo['heating_id'] == $heating['id']) { ?>
                                                                                    <option selected value="<?php echo $heating['id']; ?>"><?php echo $heating['name']; ?> </option>
                                                                                <?php } else { ?>
                                                                                    <option value="<?php echo $heating['id']; ?>"><?php echo $heating['name']; ?> </option>
                                                                        <?php }
                                                                            }
                                                                        } ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <!--div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="bmd-label-floating"><?= $this->lang->line('door_number') ?></label>
                                                                    <input type="number" class="form-control door_number" name="door_number" value="<?php echo $homeInfo['door_number'] ?>">
                                                                </div>
                                                            </div-->
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label class="bmd-label-floating"><?= $this->lang->line('gross_meter') ?></label>
                                                                    <input type="number" class="form-control gross_meter" name="gross_meter" value="<?php echo $homeInfo['gross_meter'] ?>">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label class="bmd-label-floating"><?= $this->lang->line('net_meter') ?></label>
                                                                    <input type="number" class="form-control net_meter" name="net_meter" value="<?php echo $homeInfo['net_meter'] ?>">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <select id="is_balcony" name="is_balcony" class="form-control is_balcony">
                                                                        <option disabled selected><?= $this->lang->line('is_with_balcony') ?></option>
                                                                        <?php if ($homeInfo['is_balcony'] == 'Yes') { ?>
                                                                            <option selected value="Yes"><?= $this->lang->line('yes') ?></option>
                                                                            <option value="No"><?= $this->lang->line('no') ?></option>
                                                                        <?php } else { ?>
                                                                            <option value="Yes"><?= $this->lang->line('yes') ?></option>
                                                                            <option selected value="No"><?= $this->lang->line('no') ?></option>
                                                                        <?php } ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <select id="in_site" name="in_site" class="form-control in_site">
                                                                        <option disabled selected><?= $this->lang->line('is_in_site') ?></option>
                                                                        <?php if ($homeInfo['in_site'] == 'Yes') { ?>
                                                                            <option selected value="Yes"><?= $this->lang->line('yes') ?></option>
                                                                            <option value="No"><?= $this->lang->line('no') ?></option>
                                                                        <?php } else { ?>
                                                                            <option value="Yes"><?= $this->lang->line('yes') ?></option>
                                                                            <option selected value="No"><?= $this->lang->line('no') ?></option>
                                                                        <?php } ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <select id="using_status" name="using_status" class="form-control using_status">
                                                                        <option disabled selected><?= $this->lang->line('is_using_now') ?></option>
                                                                        <?php if ($homeInfo['using_status'] == 'Landlord') { ?>
                                                                            <option selected value="Landlord"><?= $this->lang->line('landlord') ?></option>
                                                                            <option value="Tenant"><?= $this->lang->line('tenant') ?></option>
                                                                            <option value="Empty"><?= $this->lang->line('empty') ?></option>
                                                                        <?php } else if($homeInfo['using_status'] == 'Tenant') { ?>
                                                                            <option value="Landlord"><?= $this->lang->line('landlord') ?></option>
                                                                            <option selected value="Tenant"><?= $this->lang->line('tenant') ?></option>
                                                                            <option value="Empty"><?= $this->lang->line('empty') ?></option>
                                                                        <?php } else { ?>
                                                                            <option value="Landlord"><?= $this->lang->line('landlord') ?></option>
                                                                            <option value="Tenant"><?= $this->lang->line('tenant') ?></option>
                                                                            <option selected value="Empty"><?= $this->lang->line('empty') ?></option>
                                                                        <?php } ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <select id="furniture" name="furniture" class="form-control furniture">
                                                                        <option disabled selected><?= $this->lang->line('is_with_furniture') ?></option>
                                                                        <?php if ($homeInfo['furniture'] == 'Yes') { ?>
                                                                            <option selected value="Yes"><?= $this->lang->line('yes') ?></option>
                                                                            <option value="No"><?= $this->lang->line('no') ?></option>
                                                                        <?php } else { ?>
                                                                            <option value="Yes"><?= $this->lang->line('yes') ?></option>
                                                                            <option selected value="No"><?= $this->lang->line('no') ?></option>
                                                                        <?php } ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <!--div class="col-md-6">
                                                                <div class="form-group">
                                                                    <select id="is_empty" name="is_empty" class="form-control is_empty">
                                                                        <?php if ($homeInfo['is_empty'] == 'Yes') { ?>
                                                                            <option selected value="Yes"><?= $this->lang->line('yes') ?></option>
                                                                            <option value="No"><?= $this->lang->line('no') ?></option>
                                                                        <?php } else { ?>
                                                                            <option value="Yes"><?= $this->lang->line('yes') ?></option>
                                                                            <option selected value="No"><?= $this->lang->line('no') ?></option>
                                                                        <?php } ?>
                                                                    </select>
                                                                </div>
                                                            </div-->
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label><?= $this->lang->line('additional-info') ?>(<?= $this->lang->line('optional') ?>)</label>
                                                                <div class="form-group">
                                                                    <label class="bmd-label-floating"><?= $this->lang->line('write_something_about_the_home') ?>.. </label>
                                                                    <textarea class="form-control description" name="description" value="<?php echo $homeInfo['description']; ?>" rows="5"><?php echo $homeInfo['description']; ?></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <input type="hidden" name="oldImages" id="oldImages" value="" />
                                                <button class="btn btn-primary btn-round pull-right home-update"> <i class="material-icons">check_circle</i> <?= $this->lang->line('save') ?></button>
                                                <button class="btn btn-default btn-round pull-right cancel-create"><i class="material-icons">cancel</i> <?= $this->lang->line('cancel') ?></button>
                                                <div class="clearfix"></div>
                                            </form>
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
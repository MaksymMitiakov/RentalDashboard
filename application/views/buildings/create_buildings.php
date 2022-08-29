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
                                            <h4 class="card-title"><?php echo $title; ?></h4>
                                            <p class="card-category"><?php echo $this->lang->line("complete_your_building_information"); ?></p>
                                        </div>
                                        <div class="card-body">
                                            <form id="form-register" enctype="mutlipart/form-data" action="" method="POST">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <div class="form-group form-file-upload form-file-multiple ">
                                                                <input type="file" accept="image/*" onchange="loadFile(event)" class="inputFileHidden" name="build_img" id="build_img">
                                                                <div class="fileinput-new thumbnail img-raised text-center">
                                                                    <img class="img-fluid" id="output" src="<?php echo base_url(); ?>assets/images/building.png" alt="build-img" />
                                                                </div>
                                                                <div class="input-group mt-2">
                                                                    <span class="input-group-btn">
                                                                        <button type="button" class="btn btn-fab btn-round btn-primary">
                                                                            <i class="material-icons">attach_file</i>
                                                                        </button>
                                                                    </span>
                                                                    <input type="text" class="form-control inputFileVisible" placeholder="<?php echo $this->lang->line("choose_building_picture"); ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label class="bmd-label-floating"><?php echo $this->lang->line("account_no"); ?>.</label>
                                                                    <?php if ($ids == 1000) { ?>
                                                                        <input type="number" class="form-control id" name="id" value="<?php echo  10000; ?>" readonly>
                                                                    <?php } else { ?>
                                                                        <input type="number" class="form-control id" name="id" value="<?php echo $ids['id'] + 1; ?>" readonly>
                                                                    <?php } ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label class="bmd-label-floating"><?php echo $this->lang->line("buildingname"); ?></label>
                                                                    <input type="text" class="form-control name" name="name" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <select id="city_id" name="city_id" class="form-control city_id">
                                                                        <option disabled selected><?php echo $this->lang->line("choose_city"); ?></option>
                                                                        <?php foreach ($cities as $key => $city) {
                                                                            if (!empty($city)) {  ?>
                                                                                <option value="<?php echo $city['id']; ?>"><?php echo $city['name']; ?> </option>
                                                                        <?php }
                                                                        } ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <select id="district_id" name="district_id" class="form-control district_id">
                                                                        <option disabled selected><?php echo $this->lang->line("choose_district"); ?></option>
                                                                    </select>
                                                                </div>
                                                                <input type="hidden" id="chooseDistrict" value="<?php echo $this->lang->line("choose_district"); ?>"/>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label class="bmd-label-floating"><?php echo $this->lang->line("address"); ?></label>
                                                                    <input type="text" class="form-control address" name="address" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <select id="type_id" name="type_id" class="form-control type_id">
                                                                        <option disabled selected><?php echo $this->lang->line("building_type"); ?></option>
                                                                        <?php foreach ($types as $key => $type) {
                                                                            if (!empty($type)) {  ?>
                                                                                <option value="<?php echo $type['id']; ?>"><?php echo $type['name']; ?> </option>
                                                                        <?php }
                                                                        } ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <select id="floor_id" name="floor_id" class="form-control floor_id">
                                                                        <option disabled selected><?php echo $this->lang->line("number_of_floors"); ?></option>
                                                                        <?php foreach ($floors as $key => $floor) {
                                                                            if (!empty($floor)) {  ?>
                                                                                <option value="<?php echo $floor['id']; ?>"><?php echo $floor['name']; ?> </option>
                                                                        <?php }
                                                                        } ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <select id="room_id" name="room_id" class="form-control room_id">
                                                                        <option disabled selected><?php echo $this->lang->line("number_of_homes"); ?></option>
                                                                        <?php foreach ($rooms as $key => $home) {
                                                                            if (!empty($home)) {  ?>
                                                                                <option value="<?php echo $home['id']; ?>"><?php echo $home['name']; ?> </option>
                                                                        <?php }
                                                                        } ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <select id="age_id" name="age_id" name class="form-control age_id">
                                                                        <option disabled selected><?php echo $this->lang->line("building_age"); ?></option>
                                                                        <?php foreach ($ages as $key => $age) {
                                                                            if (!empty($age)) {  ?>
                                                                                <option value="<?php echo $age['id']; ?>"><?php echo $age['name']; ?> </option>
                                                                        <?php }
                                                                        } ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label class="bmd-label-floating"><?php echo $this->lang->line("postalcode"); ?></label>
                                                                    <input type="text" class="form-control post_code" name="post_code" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <button class="btn btn-primary btn-round pull-right building-save"> <i class="material-icons">check_circle</i><?php echo $this->lang->line("Submit"); ?> </button>
                                                <button class="btn btn-default btn-round pull-right cancel-create"><i class="material-icons">cancel</i> <?php echo $this->lang->line("cancel"); ?></button>
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
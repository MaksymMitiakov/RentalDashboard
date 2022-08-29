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
                                            <h4 class="card-title"><?php echo $this->lang->line("create_home_information"); ?></h4>
                                            <p class="card-category"><?php echo $this->lang->line("complete_home_info"); ?></p>
                                        </div>
                                        <div class="card-body">
                                            <form id="form-register" enctype="mutlipart/form-data" action="" method="POST">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="row">
                                                            <div class="col-md-12 image-gallery">
                                                                <!-- Container for the image gallery -->
                                                                <div class="container">
                                                                    <div id="mainImages" style="height: 300px;">
                                                                        <div class="mySlides">
                                                                            <div class="image-area">
																																								<img src="<?php echo base_url(); ?>assets/images/building.png" style="width: 100%; height: 300px;">
                                                                            </div>
                                                                        </div>
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
                                                                            <div class="column">
                                                                                <img class="demo cursor" src="<?php echo base_url(); ?>assets/images/building.png" style="width:100%" onclick="currentSlide(1)" alt="">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="container">
                                                                        <div class="form-group">
                                                                            <div class="form-group form-file-upload form-file-simple">
                                                                                <input index="1" type="file" accept="image/*" class="inputFileHidden" name="home_img1" required>
                                                                                <div class="input-group mt-2">
                                                                                    <span class="input-group-btn">
                                                                                        <button type="button" class="btn btn-fab btn-round btn-primary">
                                                                                            <i class="material-icons">attach_file</i>
                                                                                        </button>
                                                                                    </span>
                                                                                    <input type="text" class="form-control inputFileVisible" placeholder="<?php echo $this->lang->line("choose_home_picture"); ?>">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
																																<!-- Container for the image gallery -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label class="bmd-label-floating"><?php echo $this->lang->line("home_no"); ?>.</label>
                                                                    <?php  if ($acc_no == 1000) { ?>
                                                                        <input type="number" class="form-control account_no" name="id" value="<?php echo 10000; ?>" readonly>
                                                                    <?php } else { ?>
                                                                        <input type="number" class="form-control account_no" name="id" value="<?php echo $acc_no['id'] + 1; ?>" readonly>
                                                                    <?php } ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">

                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label class="bmd-label-floating"><?php echo $this->lang->line("door_number"); ?></label>
                                                                    <input type="number" class="form-control door_number" name="door_number" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label class="bmd-label-floating"><?php echo $this->lang->line("rent_price"); ?></label>
                                                                    <input type="number" class="form-control price" name="price" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label class="bmd-label-floating"><?php echo $this->lang->line("monthly_dues"); ?></label>
                                                                    <input type="number" class="form-control dues" name="dues" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label class="bmd-label-floating"><?php echo $this->lang->line("deposit"); ?></label>
                                                                    <input type="number" class="form-control deposit" name="deposit" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <select id="build_id" name="build_id" class="form-control build_id">
                                                                        <option disabled selected><?php echo $this->lang->line("choose_building"); ?></option>
                                                                        <?php foreach ($buildings as $key => $build) {
                                                                            if (!empty($build)) {  ?>
                                                                                <option value="<?php echo $build['id']; ?>"><?php echo $build['name']; ?> </option>
                                                                        <?php }
                                                                        } ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <select id="locate_id" name="locate_id" class="form-control locate_id">
                                                                        <option disabled selected><?php echo $this->lang->line("current_floor"); ?></option>
                                                                        <?php foreach ($locates as $key => $locate) {
                                                                            if (!empty($locate)) {  ?>
                                                                                <option value="<?php echo $locate['id']; ?>"><?php echo $locate['name']; ?> </option>
                                                                        <?php }
                                                                        } ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <select id="room_id" name="room_id" class="form-control room_id">
                                                                        <option disabled selected><?php echo $this->lang->line("number_of_rooms"); ?></option>
                                                                        <?php foreach ($rooms as $key => $room) {
                                                                            if (!empty($room)) {  ?>
                                                                                <option value="<?php echo $room['id']; ?>"><?php echo $room['name']; ?> </option>
                                                                        <?php }
                                                                        } ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <select id="heating_id" name="heating_id" class="form-control heating_id">
                                                                        <option disabled selected><?php echo $this->lang->line("heating_type"); ?></option>
                                                                        <?php foreach ($heatings as $key => $heating) {
                                                                            if (!empty($heating)) {  ?>
                                                                                <option value="<?php echo $heating['id']; ?>"><?php echo $heating['name']; ?> </option>
                                                                        <?php }
                                                                        } ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">

                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label class="bmd-label-floating"><?php echo $this->lang->line("gross_meter"); ?></label>
                                                                    <input type="number" class="form-control gross_meter" name="gross_meter" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label class="bmd-label-floating"><?php echo $this->lang->line("net_meter"); ?></label>
                                                                    <input type="number" class="form-control net_meter" name="net_meter" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <select id="is_balcony" name="is_balcony" class="form-control is_balcony">
                                                                        <option disabled selected><?php echo $this->lang->line("is_with_balcony"); ?></option>
                                                                        <option value="Yes"><?php echo $this->lang->line("yes"); ?></option>
                                                                        <option value="No"><?php echo $this->lang->line("no"); ?></option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <select id="in_site" name="in_site" class="form-control in_site">
                                                                        <option disabled selected><?php echo $this->lang->line("is_in_site"); ?></option>
                                                                        <option value="Yes"><?php echo $this->lang->line("yes"); ?></option>
                                                                        <option value="No"><?php echo $this->lang->line("no"); ?></option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <select id="using_status" name="using_status" class="form-control using_status">
                                                                        <option disabled selected><?php echo $this->lang->line("is_using_now"); ?></option>
                                                                        <option value="Landlord"><?php echo $this->lang->line("landlord"); ?></option>
                                                                        <option value="Tenant"><?php echo $this->lang->line("tenant"); ?></option>
                                                                        <option value="Empty"><?php echo $this->lang->line("empty"); ?></option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <select id="furniture" name="furniture" class="form-control furniture">
                                                                        <option disabled selected><?php echo $this->lang->line("is_with_furniture"); ?></option>
                                                                        <option value="Yes"><?php echo $this->lang->line("yes"); ?></option>
                                                                        <option value="No"><?php echo $this->lang->line("no"); ?></option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label><?php echo $this->lang->line("additional_info_optional"); ?></label>
                                                                <div class="form-group">
                                                                    <label class="bmd-label-floating"><?php echo $this->lang->line("write_something_about_the_home"); ?></label>
                                                                    <textarea class="form-control description" name="description" rows="5"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <button class="btn btn-primary btn-round pull-right home-save"> <i class="material-icons">check_circle</i><?php echo $this->lang->line("submit"); ?> </button>
                                                <button class="btn btn-default btn-round pull-right cancel-create"><i class="material-icons">cancel</i><?php echo $this->lang->line("cancel"); ?> </button>
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

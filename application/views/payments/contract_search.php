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
                    <div class="col-md-12">

                        <div class="card">
                            <div class="card-header card-header-text card-header-primary">
                                <div class="card-text w-100">
                                    <h4 class="card-title font-weight-bold"><?php echo $this->lang->line("contract_search"); ?></h4>
                                    <p class="card-category"><?php echo $this->lang->line("here_you_can_search_for_an_active_contracts"); ?> </p>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row w-75 ml-auto mr-auto mt-5 mb-5">
                                    <div class="w-100">
                                        <div class="input-group no-border">
                                            <input class="form-control text-center contract-search" type="text" name="search" placeholder="<?php echo $this->lang->line("please_enter_contract_no_here"); ?>" style="font-size: 30px; height: 50%">
                                            <button type="button" class="btn btn-primary btn-round btn-just-icon search_contract">
                                                <i class="material-icons">search</i>
                                                <div class="ripple-container"></div>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card table-result" style="display: none">
                            <div class="card-header border-bottom">
                                <div class="card-text w-100">
                                    <h5 class="card-title font-weight-bold text-primary"><?php echo $this->lang->line("results"); ?></h5>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-sm">
                                        <thead class="text-primary">
                                            <tr>
                                                <th><?php echo $this->lang->line("contract_no"); ?></th>
                                                <th><?php echo $this->lang->line("name"); ?></th>
                                                <th><?php echo $this->lang->line("contract_amount"); ?></th>
                                                <th><?php echo $this->lang->line("date_contract"); ?></th>
                                                <th><?php echo $this->lang->line("action"); ?></th>
                                            </tr>
                                        </thead>
                                        <tbody id="search_result">

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
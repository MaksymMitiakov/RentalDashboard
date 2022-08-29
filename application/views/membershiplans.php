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
                            <div class="tab-content tab-space">
                                <div class="tab-pane active">
                                    <div class="card">
                                        <div class="card-header card-header-primary">
                                            <h4 class="card-title mt-0"><?php echo $this->lang->line("membership_plan_table"); ?></h4>
                                            <p class="card-category"> <?php echo $this->lang->line("below_is_the_list_of_all"); ?></p>
                                        </div>
                                        <div class="pricing-box-height">
                                            <div class="container">
                                                <div class="row">
                                                    <?php foreach ($memberships as $m) { ?>
                                                        <div class="col-md-4">
                                                            <div class="pricing_div">
                                                                <div class="pack-list">
                                                                    <p><span class="package_name"><?php echo $m['name']; ?></span></p>
                                                                    <p><span> <?php echo $m['amount']; ?></span><?php echo $this->lang->line("TL"); ?></p>
                                                                    <p><span> <?php echo $m['days']; ?></span><?php echo $this->lang->line("membership_day"); ?></p>
                                                                    <p><span> <?php echo $m['contract_limit']; ?></span><?php echo $this->lang->line("membership_contracts"); ?></p>
                                                                    <p><span> <?php echo $m['home_limit']; ?></span><?php echo $this->lang->line("membership_homes"); ?></p>
                                                                    <p><span> <?php echo $m['build_limit']; ?></span><?php echo $this->lang->line("membership_buildings"); ?></p>
                                                                </div>
                                                                <div class="radio">
                                                                    <button class="btn btn-primary btn-lg btn-round" data-target="#buy_package<?php echo $m['membership_id']; ?>" data-toggle="modal"><i class="material-icons">shop</i> <?php echo $this->lang->line("buy_now"); ?></button>
                                                                </div>
                                                                <!-- Modal for payment gateway clients -->
                                                                <div class="modal fade" id="buy_package<?php echo $m['membership_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header paymentsystemheader">
                                                                                <h5 class="modal-title font-weight-bold" id="exampleModalLabel"><?php echo $this->lang->line("payment_gateways"); ?></h5>
                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                    <span aria-hidden="true">&times;</span>
                                                                                </button>
                                                                            </div>
                                                                            <div class="modal-header bankheader" style="display: none">
                                                                                <h5 class="modal-title font-weight-bold" id="exampleModalLabel"><?php echo $this->lang->line("bank_information"); ?></h5>
                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                    <span aria-hidden="true">&times;</span>
                                                                                </button>
                                                                            </div>
                                                                            <div class="modal-header creditcardpayheader" style="display: none">
                                                                                <h5 class="modal-title font-weight-bold" id="exampleModalLabel"><?php echo $this->lang->line("credit_card_payment"); ?></h5>
                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                    <span aria-hidden="true">&times;</span>
                                                                                </button>
                                                                            </div>
                                                                            <div class="modal-body paymentsystembody">
                                                                                <p><?php echo $this->lang->line("please_select_a_payment_system"); ?></p>
                                                                                <div class="col-md-12">
                                                                                    <div class="form-group">
                                                                                        <div class="form-check form-check-radio form-check-inline">
                                                                                            <label class="form-check-label">
                                                                                                <input class="form-check-input card" type="radio" name="buypackageoption" id="inlineRadio1" value="card" required> <?php echo $this->lang->line("credit_card"); ?>
                                                                                                <span class="circle">
                                                                                                    <span class="check"></span>
                                                                                                </span>
                                                                                            </label>
                                                                                        </div>
                                                                                        <div class="form-check form-check-radio form-check-inline">
                                                                                            <label class="form-check-label">
                                                                                                <input class="form-check-input bank" type="radio" name="buypackageoption" id="inlineRadio2" value="bank" required><?php echo $this->lang->line("bank_transfer"); ?>
                                                                                                <span class="circle">
                                                                                                    <span class="check"></span>
                                                                                                </span>
                                                                                            </label>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-check">
                                                                                        <label class="form-check-label">
                                                                                            <input class="form-check-input" type="checkbox" value="" id="terms_and_conditions<?php echo $m['membership_id']; ?>">
                                                                                            <span class="form-check-sign">
                                                                                                <span class="check"></span>
                                                                                            </span>
                                                                                            <a href="<?php echo base_url() . 'terms-conditions/'; ?>" rel="tooltip" target="_blank" title="<?php echo $this->lang->line("go_to_terms_and_conditions"); ?>"><?php echo $this->lang->line("agree_our_terms_and_conditions"); ?></a>
                                                                                        </label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="modal-body bankbody" style="display: none">
                                                                                <div class="col-md-12">
                                                                                    <table class="display  table table-hover">
                                                                                        <thead class="text-primary">
                                                                                            <th><?php echo $this->lang->line("bank_name"); ?></th>
                                                                                            <th><?php echo $this->lang->line("holder_name"); ?></th>
                                                                                            <th><?php echo $this->lang->line("iban_no"); ?></th>
                                                                                        </thead>
                                                                                        <tbody>
                                                                                    <?php if(!isset($banks)) $banks = array(); foreach($banks as $key => $bank){
                                                                                            if(!empty($bank)){
                                                                                        ?>
                                                                                            <tr>
                                                                                                <td><?php echo $bank['bank_name'];?></td>
                                                                                                <td><?php echo $bank['holder_name'];?></td>
                                                                                                <td><?php echo $bank['iban_no'];?></td>
                                                                                            </tr>
                                                                                      <?php } else { ?>
                                                                                            <tr>
                                                                                                <td colspan="5"><?php echo $this->lang->line("no_bank_details"); ?></td>
                                                                                            </tr>
                                                                                      <?php } }?>
                                                                                        </tbody>
                                                                                    </table>
                                                                                </div>
                                                                            </div>
                                                                            <div class="modal-body creditcardpaybody" style="display: none">
                                                                                <!-- <p><?php echo $this->lang->line("please_select_a_payment_system"); ?></p> -->
                                                                                <div class="row">
                                                                                    <div class="col-md-12">
                                                                                        <div class="form-group">
                                                                                            <label class="bmd-label-floating"><?php echo $this->lang->line("cardholdername"); ?></label>
                                                                                            <input type="text" class="form-control cardholdername<?php echo $m['membership_id']; ?>" name="cardholdername" required>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-12">
                                                                                        <div class="form-group">
                                                                                            <label class="bmd-label-floating"><?php echo $this->lang->line("cardnumber"); ?></label>
                                                                                            <input type="text" class="form-control cardnumber<?php echo $m['membership_id']; ?>" name="cardnumber" required>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-12">
                                                                                        <div class="form-group">
                                                                                            <label class="bmd-label-floating"><?php echo $this->lang->line("expiredmonth"); ?></label>
                                                                                            <input type="number" class="form-control expiredmonth<?php echo $m['membership_id']; ?>" name="expiredmonth" required>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-12">
                                                                                        <div class="form-group">
                                                                                            <label class="bmd-label-floating"><?php echo $this->lang->line("expiredyear"); ?></label>
                                                                                            <input type="number" class="form-control expiredyear<?php echo $m['membership_id']; ?>" name="expiredyear" required>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-md-12">
                                                                                        <div class="form-group">
                                                                                            <label class="bmd-label-floating"><?php echo $this->lang->line("cvc"); ?></label>
                                                                                            <input type="text" class="form-control cvc<?php echo $m['membership_id']; ?>" name="cvc" required>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="modal-footer bankfooter" style="display: none">
                                                                                <button type="button" class="btn btn-secondary cancelmodal" data-dismiss="modal"><?php echo $this->lang->line("cancel"); ?></button>
                                                                                <button type="button" class="btn btn-danger bankinformationregister" amount="<?php echo $m['amount']; ?>" id="<?php echo $m['membership_id']; ?>"><?php echo $this->lang->line("pay_now"); ?></button>
                                                                            </div>
                                                                            <div class="modal-footer creditcardpayfooter" style="display: none">
                                                                                <button type="button" class="btn btn-secondary cancelmodal" data-dismiss="modal"><?php echo $this->lang->line("cancel"); ?></button>
                                                                                <button type="button" class="btn btn-danger creditcardpay" amount="<?php echo $m['amount']; ?>" id="<?php echo $m['membership_id']; ?>"><?php echo $this->lang->line("pay_now"); ?></button>
                                                                            </div>
                                                                            <div class="modal-footer paymentsystemfooter">
                                                                                <button type="button" class="btn btn-secondary cancelmodal" data-dismiss="modal"><?php echo $this->lang->line("cancel"); ?></button>
                                                                                <button type="button" class="btn btn-danger buypackage" id="<?php echo $m['membership_id']; ?>"><?php echo $this->lang->line("continue"); ?></button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- End of modal -->
                                                            </div>
                                                        </div>
                                                    <?php } ?>
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
    </div>

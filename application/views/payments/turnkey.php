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
                            <div class="card">
                                <div class="card-body mr-5 ml-5 mt-5 mb-5">
                                  <div class="text-center">
                                    <h3 class="mb-0 font-weight-bold">ANAHTAR TESLİM TUTANAĞI</h3>
                                  </div>

                                  <div class="row-sozlesme">

                                    <div class="row">
                                      <div class="col-3"></div>
                                      <div class="col-3 font-weight-bold">KİRACI AD-SOYAD :</div>
                                      <div class="col-6"><?php echo $customer[0]['fullName']; ?></div>
                                    </div>
                                    <div class="row">
                                      <div class="col-3"></div>
                                      <div class="col-3 font-weight-bold">KİRACI TC :</div>
                                      <div class="col-6"><?php echo $customer[0]['identity']; ?></div>
                                    </div>
                                    <div class="row">
                                      <div class="col-3"></div>
                                      <div class="col-3 font-weight-bold ">KİRACI ADRES :</div>
                                      <div class="col-6"><?php echo $customer[0]['address']; ?></div>
                                    </div>
                                    <div class="row">
                                      <div class="col-3"></div>
                                      <div class="col-3 font-weight-bold">KİRAYA VEREN :</div>
                                      <div class="col-6"><?php echo $this->session->userdata('fullname'); ?></div>
                                    </div>
                                    <div class="row">
                                      <div class="col-3"></div>
                                      <div class="col-3 font-weight-bold">KİRA SÖZLEŞMESİ BAŞLANGIÇ  :</div>
                                      <div class="col-6"><?php echo $contract[0]['date_contract']; ?></div>
                                    </div>
                                  </div>
                                  <div class="form-inline" style="padding-top: 70px;" >
                                    <div style="margin-left: 20px;"  class="l-font">
                                      <p style="padding-left: 70px;padding-right: 70px;">Yukarıda yazılı teslim tarihi itibariyle tahliye ediyorum. Kira sözleşmesine dayalı teslim etmem gereken tüm bilgi ve belgelerle beraber taşınmaza ait anahtarı da teslim ettiğimi beyan ederim. Evde bulunan tüm eşyalarımı aldığımı kabul eder, içeride unuttuğum, kaybettiğim, zarar gören herhangi bir eşyamdan dolayı kiraya verenin sorumlu olmadığını taahhüt ederim. İşbu taşınmazdan hiç bir hak ve talebim kalmamıştır. Kiracılık vasfımdan doğan taşınmazın zilliyeti olma, taşınmazı kullanma gibi tüm haklarımın sona erdiğini kabul ederim.Kiraya veren kiracının birikmiş kira borçlarından kaynaklanabilecek alacakları baki kalmak ve fazlaya dair tüm hakları saklı kalmak kaydı ile taşınmazın anahtarını teslim almıştır. İş bu tutanak tarafımızdan mahallinde tanzim olunarak müşterek imza altına alınmıştır.</p>

                                    </div>
                                  </div>
                                  <div class="row-sozlesme">

                                    <div class="row">
                                      <div class="col-2 font-weight-bold text-center">TARİH :</div>
                                      <div class="col-2"><?php echo date('d-m-Y'); ?></div>
                                      <div class="col-2 font-weight-bold text-center">SAAT :</div>
                                      <div class="col-2"><?php echo date('H:i:s'); ?></div>
                                        <div class="col-4"></div>
                                    </div>
                                    <div class="row"  style="padding-top: 100px;">
                                      <div class="col-4 font-weight-bold text-center" >KİRACI İMZA</div>
                                      <div class="col-4"></div>
                                      <div class="col-4 font-weight-bold text-center">KİRAYA VEREN İMZA</div>
                                    </div>
                                    <div class="row">
                                      <div class="col-4 text-center"><?php echo $customer[0]['fullName']; ?></div>
                                      <div class="col-4"></div>
                                      <div class="col-4 text-center"><?php echo $this->session->userdata('fullname'); ?></div>
                                    </div>
                                  </div>

                                </div>
                                <div class="text-right">
                                    <button type="button" class="btn btn-primary no-print" onclick="jQuery('.card-body').print()"><?php echo $this->lang->line("Print"); ?></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
                                <div class="card-body  mr-5 ml-5 mt-5 mb-5">

                                  <div class="text-center">
                                    <h3 class="mb-0 font-weight-bold">TAHLİYE TAAHHÜTNAMESİ</h3>
                                  </div>

                                  <div class="row-sozlesme">

                                    <div class="row text-center">
                                      <div class="col-6">DAİRE  :</div>
                                      <div class="col-6">  <input class="text-p text-center font-weight-bold" value=""></div>
                                    </div>
                                    <div class="row text-center">
                                      <div class="col-6">TAHLİYE TARİHİ</div>
                                      <div class="col-6">  <input class="text-p text-center font-weight-bold" value=""></div>
                                    </div>

                                  </div>

                                  <div class="row-sozlesme">

                                    <div class="row">
                                      <div class="col-3"></div>
                                      <div class="col-3">Kiraya Veren :</div>
                                      <div class="col-6"><?php echo $this->session->userdata('fullname'); ?></div>
                                    </div>
                                    <div class="row">
                                      <div class="col-3"></div>
                                      <div class="col-3">Adres :</div>
                                      <div class="col-6"><?php echo $this->session->userdata('address'); ?></div>
                                    </div>
                                    <div class="row">
                                      <div class="col-3"></div>
                                      <div class="col-3">Kiralayan :</div>
                                      <div class="col-6"><?php echo $customer[0]['fullName']; ?></div>
                                    </div>
                                    <div class="row">
                                      <div class="col-3"></div>
                                      <div class="col-3">Kiralananın Adresi :</div>
                                      <div class="col-6"><?php echo $customer[0]['address']; ?></div>
                                    </div>
                                    <div class="row">
                                      <div class="col-3"></div>
                                      <div class="col-3">Kira Söz. Tarihi  :</div>
                                      <div class="col-6"><?php echo $customer[0]['date_contract']; ?></div>
                                    </div>
                                  </div>



                                  <div class="form-inline" style="padding-top: 70px;" >
                                    <div style="margin-left: 20px;"  class="l-font">
                                      <p style="padding-left: 70px;padding-right: 70px;">Halen kiracı olarak kullanmakta olduğum yukarıda yazılı adresteki taşınmazı hiçbir ihtar ve ihbara gerek kalmadan kayıtsız ve şartsız olarak tarihte hiç bir koşul ileri sürmeksizin tahliye edeceğimi, teslim aldığım şekilde ve sağlam olarak tahliye etmeyi;  temiz, boyalı ve sağlam olarak adı geçen mal sahibinin icrai takibata geçerek yapacağı bilumum masrafları ve tahliyeyi geciktirmemden dolayı uğrayacağı zarar ve ziyanları hiçbir ihtar, ihbar ve hükme gerek kalmadan derhal nakden ve peşinen ödeyeceğimi, tarafıma açılacak tahliye davasını kabul etmeyi ve derhal evi tahliye etmeyi beyan kabul ve taahhüt ederim.</p>

                                    </div>
                                  </div>

                                  <div class="row-sozlesme">

                                    <div class="row">
                                      <div class="col-4"></div>
                                      <div class="col-4"></div>
                                      <div class="col-4">TAAHHÜT TARİHİ</div>
                                    </div>
                                    <div class="row">
                                      <div class="col-4"></div>
                                      <div class="col-4"></div>
                                      <div class="col-4"><?php echo date('d-m-Y'); ?></div>
                                    </div>
                                    <div class="row">
                                      <div class="col-1"></div>
                                      <div class="col-4">MAL SAHİBİ (KİRALAYAN) :</div>
                                      <div class="col-4 left-text"><?php echo $this->session->userdata('fullname'); ?></div>
                                      <div class="col-3"></div>
                                    </div>
                                    <div class="row">
                                      <div class="col-1"></div>
                                      <div class="col-4">TAAHHÜT EDEN (KİRACI VE TC) :</div>
                                      <div class="col-4 left-text"><?php echo $customer[0]['fullName']; ?>/<?php echo $customer[0]['identity']; ?></div>
                                      <div class="col-3"></div>
                                    </div>
                                    <div class="row">
                                      <div class="col-1"></div>
                                      <div class="col-4">İMZA  :</div>
                                      <div class="col-4 "></div>
                                      <div class="col-3"></div>
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

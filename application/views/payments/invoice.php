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
                                <div class="card-body card-border mr-5 ml-5 mt-5 mb-5">
                                    <div class="text-center">
                                        <h5 class="mb-0 font-weight-bold">
                                            <?php echo $this->session->userdata('company'); ?></h5>
                                    </div>
                                    <div class="row">
                                        <div class="col-4"></div>
                                        <div class="col-4 text-center">
                                            <p class="mb-0 l-font"> <?php echo $this->session->userdata('address'); ?>
                                            </p>
                                            <h6 class="font-weight-bold"><u>TAHSİLAT MAHBUZU</u></h6>
                                        </div>
                                    </div>
                                    <hr style="height:2px;border-width:0;color:gray;background-color:gray">

                                    <div class="col-12 mt-3">
                                        <div class="row mt-2 mb-1">
                                            <div class="col-5">
                                                <div class="form-inline">
                                                    <label class="text-dark l-font"><span class="font-weight-bold padding-label">MÜŞTERİ ADI
                                                            :</span> <?php echo $customer[0]['fullName']; ?></label>

                                                </div>
                                                <div class="form-inline">
                                                    <label class="text-dark l-font"><span class="font-weight-bold padding-label">TC KİMLİK NO :</span>
                                                        <?php echo $customer[0]['identity']; ?></label>
                                                </div>
                                                <div class="form-inline">
                                                    <label class="text-dark l-font"><span class="font-weight-bold padding-label">TELEFON NO :</span>
                                                        <?php echo $customer[0]['phone']; ?></label>
                                                </div>

                                            </div>
                                            <div class="col-2"></div>
                                            <div class="col-5">
                                                <div class="form-inline">

                                                    <label class="text-dark l-font"><span class="font-weight-bold padding-label">TARİH :</span>
                                                        <?php echo changeDate($transaction[0]['date']); ?></label>
                                                </div>
                                                <div class="form-inline">
                                                    <label class="text-dark l-font"><span class="font-weight-bold padding-label">MAKBUZ NO :</span>
                                                        <?php echo $transaction[0]['transaction_id']; ?></label>

                                                </div>
                                                <div class="form-inline">
                                                    <label class="text-dark l-font"><span class="font-weight-bold padding-label">ÖDEME TUTARI :</span>
                                                        <?php echo $transaction[0]['amount']; ?>TL</label>

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-inline invoice-top">
                                        <p class="l-font"><span>Sn</span> <span class="font-weight-bold padding-span"><?php echo $customer[0]['fullname']; ?></span>'
                                            dan yukarıdaki bilgilere istinaden <span class="font-weight-bold padding-span"><?php echo changeDate($transaction[0]['date']); ?></span>,
                                            tarihinde <span class="font-weight-bold padding-span"><?php echo $transaction[0]['amount']; ?>TL</span>tahsil
                                            edilmiştir.</p>
                                    </div>

                                    <table class="table font-weight-bold text-center">
                                        <thead class="text-p invoice-table">
                                            <th>Nakit</th>
                                            <th>Çek</th>
                                            <th>Kredi Kartı</th>
                                            <th>Banka Havale</th>
                                            <th>Senet</th>
                                        </thead>
                                        <tbody class="invoice-body">

                                             <tr>
                                                <?php if ($transaction[0]['payment_type'] == '1') { ?>
                                                    <td><?php echo $transaction[0]['amount']; ?></td>
                                                <?php } else if ($transaction[0]['payment_type'] == '2') { ?>
                                                    <td><?php echo $transaction[0]['amount']; ?></td>
                                                <?php } else if ($transaction[0]['payment_type'] == '3') { ?>
                                                    <td><?php echo $transaction[0]['amount']; ?></td>
                                                <?php } else if ($transaction[0]['payment_type'] == '4') { ?>
                                                    <td><?php echo $transaction[0]['amount']; ?></td>
                                                <?php } else if ($transaction[0]['payment_type'] == '5') { ?>
                                                    <td><?php echo $transaction[0]['amount']; ?></td>
                                                <?php } ?>
                                        </tbody>
                                    </table>

                                    <div class="form-inline">
                                        <p class="l-font"> <span class="font-weight-bold padding-span"><?php echo changeDate($transaction[0]['date']); ?></span>
                                            tarihinde yaptığınız <span class="font-weight-bold padding-span"><?php echo $transaction[0]['amount']; ?>TL</span>
                                            ödemeden sonra <span class="font-weight-bold padding-span"><?php echo $transaction[0]['due_payment']; ?>TL</span>
                                            taksitlerinizden kalan toplam borç mevcuttur. Bilgilerinize...</p>
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

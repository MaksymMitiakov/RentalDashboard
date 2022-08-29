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
                <div class="card-body mr-5 ml-5">
                  <div class="text-center">
                    <h3 class="mb-0 font-weight-bold">KİRA SÖZLEŞMESİ</h3>
                  </div>
                  <div class="row-sozlesme">
                    <div class="row">
                      <div class="col-12 text-center col-sozlesme sozlesme-baslik">MÜLK BİLGİLERİ</div>
                    </div>
                    <div class="row">
                      <div class="col-3 col-sozlesme">İL</div>
                      <div class="col-3 col-sozlesme"><?php echo $city[0]['city']; ?></div>
                      <div class="col-3 col-sozlesme">İLÇE</div>
                      <div class="col-3 col-sozlesme"><?php echo $district[0]['district']; ?></div>
                    </div>
                    <div class="row">
                      <div class="col-3 col-sozlesme">CADDE / SOKAK / NUMARA</div>
                      <div class="col-9 col-sozlesme "><?php echo $building[0]['address']; ?></div>
                    </div>
                    <div class="row">
                      <div class="col-3 col-sozlesme">ŞİMDİKİ DURUMU</div>
                      <?php if ($home[0]['using_status'] == 'Empty') { ?>
                          <div class="col-9 col-sozlesme">Boş</div>
                      <?php }  else if ($home[0]['using_status'] == 'Landlord') { ?>
                        <div class="col-9 col-sozlesme">Ev Sahibi</div>
                    <?php }   else if ($home[0]['using_status'] == 'Tenant') { ?>
                      <div class="col-9 col-sozlesme">Kiracı</div>
                      <?php } ?>
                    </div>
                    <div class="row">
                      <div class="col-3 col-sozlesme">NE İÇİN KULLANILACAĞI</div>
                      <div class="col-9 col-sozlesme"><?php echo $type[0]['type']; ?></div>
                    </div>
                  </div>

                  <div class="row-sozlesme">
                    <div class="row">
                      <div class="col-12 text-center col-sozlesme sozlesme-baslik">KİRALAYAN BİLGİLERİ</div>
                    </div>
                    <div class="row">
                      <div class="col-3 col-sozlesme">ADI/ SOYADI</div>
                      <div class="col-3 col-sozlesme"><?php echo $this->session->userdata('fullname'); ?></div>
                      <div class="col-3 col-sozlesme">TC KİMLİK NO</div>
                      <div class="col-3 col-sozlesme"><?php echo $this->session->userdata('identity'); ?></div>
                    </div>
                    <div class="row">
                      <div class="col-3 col-sozlesme">ADRES</div>
                      <div class="col-9 col-sozlesme "><?php echo $this->session->userdata('address'); ?></div>
                    </div>

                  </div>

                  <div class="row-sozlesme">
                    <div class="row">
                      <div class="col-12 text-center col-sozlesme sozlesme-baslik">KİRACININ BİLGİLERİ</div>
                    </div>
                    <div class="row">
                      <div class="col-3 col-sozlesme">ADI/ SOYADI</div>
                      <div class="col-3 col-sozlesme"><?php echo $customer[0]['fullname']; ?></div>
                      <div class="col-3 col-sozlesme">TC KİMLİK NO</div>
                      <div class="col-3 col-sozlesme"><?php echo $customer[0]['identity']; ?></div>
                    </div>
                    <div class="row">
                      <div class="col-3 col-sozlesme">ADRESİ</div>
                      <div class="col-9 col-sozlesme "><?php echo $customer[0]['address']; ?></div>
                    </div>
                    <div class="row">
                      <div class="col-3 col-sozlesme">İLETİŞİM</div>
                      <div class="col-9 col-sozlesme"><?php echo $customer[0]['phone']; ?></div>

                    </div>

                  </div>

                  <div class="row-sozlesme">
                    <div class="row">
                      <div class="col-12 text-center col-sozlesme sozlesme-baslik">KEFİL BİLGİLERİ</div>
                    </div>
                    <div class="row">
                      <div class="col-3 col-sozlesme">ADI/ SOYADI</div>
                      <div class="col-3 col-sozlesme"><?php echo $guarantor[0]['gua_name']; ?></div>
                      <div class="col-3 col-sozlesme">TC KİMLİK NO</div>
                      <div class="col-3 col-sozlesme"><?php echo $guarantor[0]['gua_identity']; ?></div>
                    </div>
                    <div class="row">
                      <div class="col-3 col-sozlesme">ADRESİ</div>
                      <div class="col-9 col-sozlesme ">------</div>
                    </div>
                    <div class="row">
                      <div class="col-3 col-sozlesme">İLETİŞİM</div>
                      <div class="col-9 col-sozlesme"><?php echo $guarantor[0]['gua_phone']; ?></div>

                    </div>

                  </div>
                  <div class="row-sozlesme">
                    <div class="row">
                      <div class="col-12 text-center col-sozlesme sozlesme-baslik">KİRA BİLGİLERİ</div>
                    </div>
                    <div class="row">
                      <div class="col-3 col-sozlesme">AYLIK KİRA BEDELİ</div>
                      <div class="col-3 col-sozlesme"><?php echo $home[0]['price']; ?></div>
                      <div class="col-3 col-sozlesme">YILLIK KİRA BEDELİ</div>
                      <div class="col-3 col-sozlesme"><?php echo $contract['contract_amount']; ?></div>
                    </div>
                    <div class="row">
                      <div class="col-3 col-sozlesme">KİRA BAŞLANGIÇ TARİHİ</div>
                      <div class="col-3 col-sozlesme"><?php echo changeDate($contract['date_contract']); ?></div>
                      <div class="col-3 col-sozlesme">KİRA BİTİŞ TARİHİ</div>
                      <div class="col-3 col-sozlesme"><?php echo changeDate($approve[0]['due_date']); ?></div>
                    </div>
                    <div class="row">
                      <div class="col-3 col-sozlesme">DEPOZİTO BEDELİ</div>
                      <div class="col-9 col-sozlesme"><?php echo $home[0]['deposit']; ?></div>

                    </div>
                    <div class="row">
                      <div class="col-3 col-sozlesme">ÖDEME TARİHİ VE ŞEKLİ</div>
                      <div class="col-9 col-sozlesme"><?php echo changeDate($transaction[0]['dates']); ?>/<?php echo $transaction[0]['typ']; ?></div>
                    </div>
                  </div>


                  <div class="row sozlesme-sart">
                    <div class="col-12 text-center col-sozlesme sozlesme-baslik">UMUMİ ŞARTLAR</div>
                  </div>
                  <div class="form-inline">
                    <div style="margin-left: 20px;">
                      <ol class="l-font">
                        <li style="margin-bottom: 20px">Kiracı kiraladığı şeyi kendi malı gibi kullanmaya ve bozulmamasına efsaf ve meziyetlerini şöhret ve itibarını kaybetmesine meydan vermemeye içinde oturanlarla ( varsa ) onlara iyi davranmaya mecburdur.</li>
                        <li style="margin-bottom: 20px">Kiralanan yerin, su , elektirik, doğalgaz masrafları kiracıya aittir.</li>
                        <li style="margin-bottom: 20px">Kiracı kiraladığı yeri kısmen veya tamamen başkasına devir ve ciro edemez. Kısmen ve tamamen hiçbir ad altında kullandıramaz. Devir hakkı yokur.</li>
                        <li style="margin-bottom: 20px">Kiracı kiraladığı yerin, kiralanan kiracı tarafından üçüncü şahsa kısmen veya tamamen kiralanıp da taksimatı ve ciheti tahsisi değiştirilir veya herhangi bir suretle tahrip ve tadil edilirse, mal sahibi kira akdini bozabileceği, bu yüzden vukua gelecek zarar ve ziyanı protesto çekmeye ve hüküm almaya gerek kalmaksızın kiracı tazmine mecburdur. Vaki zararın üçüncü şahıs tarafından yapılmış olması mal sahibinin birinci kiracıdan talep hakkına tesir etmez.</li>
                        <li style="margin-bottom: 20px">Kiralanan şeyin tamiri lazım gelir ve üçüncü bir şahış onun üzerinde hak iddia ederse, kiracı hemen mal sahibine haber vermeye mecburdur. Haber vermez ise zarardan mesul olacaktır. Kiracı zaruri tamiratın icrasna müsaade etmeye mecburdur. Kiralanan şeyin alelade kullanılması için, menteşelemek, cam taktırmak, reze koymak, kilit ve sürgü yerleştirmek, badana gibi ufak tefek kusurlar, mal sahibine haber vermeden ve münasip müddet beklemeden kiracı tarafından yaptırılır ise mal sahibinden istenemez. </li>
                        <li style="margin-bottom: 20px">Mecura yapılacak her türlü faydalı ya da lüks imalat, tadilat vs. masrafı kiracı tarafından üstlenilecektir. Tahliye halinde kiraya verenden herhangi bir bedel talep edilmeyecektir. </li>
                        <li style="margin-bottom: 20px">Kiracı kiraladığı şeyi ne halde buldu ise mal sahibine o halde ve adete göre teslim etmeye mecburdur. Kiralanan gayrimenkul içinde bulunan demirbaş eşya ve aletler kontrat müddetinin bitiminde tamamen iade ile mükelleftir. Gerek bu demirbaşlar ve gerek kiralanan şeyin tefferuatı zayi edilir ve kullanmaktan dolayı eskirse kiracı bunları kıymetleri ile tazmine ve sahibi talep eylediği halde ödemeye mecburdur. </li>
                        <li style="margin-bottom: 20px">Kira akdi tarafların serbest iradeleri ile karşılıklı olarak veya mahkeme kararı ile fesih edildiğinde kiracı fesih tarihinden veya kararın kesinleşme tarihinden itibaren en geç bir ay içinde mecuru tahliye ederek mal sahibine teslim etmeye mecburdur. Aksi halde kiracı mecuru geç teslimden dolayı meydana gelecek zararları ödemeyi kabul ve taahhüt eder.</li>
                      </ol>
                    </div>
                  </div>

                  <div class="row sozlesme-sart">
                    <div class="col-12 text-center col-sozlesme sozlesme-baslik">ÖZEL ŞARTLAR</div>
                  </div>

                  <div class="form-inline">
                    <div style="margin-left: 20px;">
                      <ol class="l-font">
                        <li style="margin-bottom: 20px">Kiracı hiçbir mecburiyet ve baskı olmaksızın mecuru görüp hali hazır durumu beğenip kiralamaktadır.
                          <p>a - Süre sonunda mal sahibi mecuru tekrar kiraya verip vermemekte serbesttir.</p>
                          <p>b - Kira süresi gün / ay / yıl - gün / ay / yıl tarihlerine münhasır x aydır. Beş yıllık kira akdi süresince kiralananın kira bedeli her yıl herhangi bir ihtara gerek kalmaksızın TEFE , TÜFE ortalaması oranınca arttırılacaktır. </p>
                          <p>c - Kira akdi süresi sonrasında 6570 sayılı yasanın 11. maddesi hükmü gereği kendiliğinden yenilendiği taktirde kira parasında her yıl herhangi bir ihtara gerek kalmaksızın enfilasyon oranında artırım yapılacaktır. Bu artırım miktarı TÜİK'nun belirlediği yıllık toptan eşya fiyat genel endeksinde ki artış oranından az olamaz. Kiracı bu şekilde bulunacak rakamla kiraya devam edip etmemekte karar verecek ve yazı ile bildirecektir.</p>
                          <p>d - Anlaşma olmaması halinde kiracı en geç mukavele bitiminde mecuru tahliye edeceğini şimdiden taahhüt eder. </p>
                          <p>e - Her mukavele bitiminde bu fiyat tespiti usulünün uygulanacağını kiracı şimdiden itirazsız kabul eder.</p>
                          <p>f - Kiracı 12 aylık kira süresi için geçerli olarak belirlenen ve ödemeyi kabul ettiği kira parasına her ne sebeple olursa olsun itiraz etmeyeceğini, belirlenen işbu aylık kira paralarını, kendi serbest iradesi ile ve herhangi bir maddi veya menevi tazyik altında kalmaksızın kabul ederek ödemeyi taahhüt ettiğini, bu nedenle kira parasının miktarı ile ilgili olarak herhangi bir dava açmayacağını, bu hususta ki dava haklarından şimdiden feragat ettiğini kabul ve taahhüt eder.</p>
                        </li>
                        <li style="margin-bottom: 20px">Kiracı mecuru ancak umumi şartlarda yazılı taahhüt ettiği kullanım nevi için kullanabilir. İştigal mevzuunun değiştirilmesi ancak mal sahibinin yazılı muvafakatı ile olabilir. Kiracı buna rağmen aksine hareket ederse kira akdine muhalefet etmiş olacağını kabul eder.</li>
                        <li style="margin-bottom: 20px">Tüm elektirik tesisatı tenvirat vs. oda başına belirli bir watt gücü için öngörülmüştür. Kiracı daha yüksek güçte cereyanlı alet kullanılmasının yasak olup tesisatı bozacağını ve yangın tehlikesi oluşturacağını kabul eder. Aksi hareket mukavele feshi için neden olabileceği gibi tüm zarar sorumluluğu kiracıya ödettirilecektir. </li>
                        <li style="margin-bottom: 20px">Kiralanan, yerinde görüldükten sonra beğenilelerek noksansız ve kusursuz teslim alınmıştır. Kira süresince olacak her türlü tahribattan, yangın, sabotaj ve hırsızlıktan ötürü doğacak zarar ziyandan mal sahibi meshul tutulamaz. Kiracı her türlü sigortayı kendisi yaptıracaktır.</li>
                        <li style="margin-bottom: 20px">Kiracı kiralananı mukavele bitiminden önce terketmek isterse durumu en az iki ay önceden mal sahibine yazılı bildirecektir. Bu bildirimden sonra kiralayan akit bitimine kadar kira borçlerını ödeyecektir. Ayrıca kiracı yukarıdaki yazılı bildirimi yapmadığı taktirde yine akit bitimine kadar kira bedellerini mal sahibine ödemek zorundadır. </li>
                        <li style="margin-bottom: 20px">İş bu kira sözleşmesinde kiracının kanuni ikametgahı olarak gösterilen adresleri ile dava konusu mecurun adresin kiracı açısından her türlü kanuni tebligatların yapılacağı adreslerdir. Kiracı ikametgah adresini değiştirdiği takdirde derhal mal sahibine yeni adresini 7 gün içinde yazılı olarak bildirecektir. </li>
                        <li style="margin-bottom: 20px">Kira sözleşmeleri yazılı olarak tanzim edilir, sözleşme harç ve masrafları kiracıya aiittir. </li>
                        <li style="margin-bottom: 20px">Kira müddetinin uzaması halinde müşterek borçlu ve müteselsil kefil kira müddetince müşterek borçluluk ve müteselsil kefaletinin uzayacağını peşinen kabul eder.</li>
                        <li style="margin-bottom: 20px">Aylık kira paralarının herhangi birisinin süresinde ödenmemesi halinde dönem sonuna kadar ki müteakip ayların tümünün muaccel hale geleceğini ve mal sahibinin tüm kira bedellerini talep edebileceğini, ödenmemesi halinde temerrüt sebebi sayılacabileceğini kiracı şimdiden kabul ve taahhüt etmiştir. </li>
                        <li style="margin-bottom: 20px">Kiracı bu sözleşme ile kendisine tahmil edilen hususlara riayet etmediği takdirde bu hallerin tahliye sebebi sayılacağını peşinen kabul eder. </li>
                        <li style="margin-bottom: 20px">İhtilafların halli Bursa Mahkemeleri ve icra dairelerine aittir. </li>
                        <li style="margin-bottom: 20px">Siteye verilecek olunan rahatsızlıklardan dolayı site yönetiminin alacağı kararlardan dolayı doğabilecek zarar ziyan kiracıya aittir. </li>
                        <li style="margin-bottom: 20px">Kira müddetinin bitiminden evvel taraflar yazılı olarak fesih bildirmezlerse sözleşme aynı şartlarda bir yıl daha uzayacaktır. Özel şartlar madde 1 hükmü mahfuz olup, kiralayan kira bedellerinin tespiti hususunda gerekli işlemleri yapabilir. </li>
                        <li style="margin-bottom: 20px">Kira bedeli her ayın x gününde elden peşin yada havale / eft yolu ile x banka x hesap numarasına gönderilecektir. </li>
                        <li style="margin-bottom: 20px">BANKA HESAP BİLGİLERİ</li>
                        <li style="margin-bottom: 20px">Bu sözleşmede yazılı bulunmayan hükümlere ihtiyaç duyulduğunda 6570 sayılı kira kanunu, medeni kanunu, borçlar kanunu 634 sayılı kat mülkiyeti kanunu ve diğer yürürlükteki alakalı kanun ve yargıtay kararları uygulanır. </li>
                        <li style="margin-bottom: 20px">Meskur akit iki tarafın ve kiracı kefilin rızası ile ve yukarıda yazılı şartlarla kiralanmış olduğuna dair bu sözleşme iki nüsha olarak tanzim ve teati edilmiştir.</li>
                      </ol>
                    </div>
                  </div>



                  <div class="row-imza text-center">
                    <div class="row">
                      <div class="col-4">KİRACI</div>
                      <div class="col-4">KEFİL</div>
                      <div class="col-4">KİRALAYAN</div>
                    </div>
                    <div class="row">
                      <div class="col-4"><?php echo $customer[0]['fullname']; ?></div>
                      <div class="col-4"><?php echo $guarantor[0]['gua_name']; ?></div>
                      <div class="col-4"><?php echo $this->session->userdata('fullname'); ?></div>
                    </div>
                    <div class="row">
                      <div class="col-4">İMZA</div>
                      <div class="col-4">İMZA</div>
                      <div class="col-4">İMZA</div>
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
  </div>

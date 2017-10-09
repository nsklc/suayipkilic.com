<!-- <div class="w3-twothird"> -->

      <div class="w3-container w3-card-2 w3-light-grey w3-margin-bottom" id="work">
        <!-- <h3 class="w3-text-grey w3-padding-16"><i class="fa fa-suitcase fa-fw w3-margin-right w3-xxlarge w3-text-teal"></i><?php echo $language['Work Experience'][$i]; ?></h2> -->
        <div class="w3-container w3-padding-32" id="work">
          <h3 class="w3-border-bottom w3-border-light-grey w3-padding-16">
		          <img src="img/case.png"  ><?php echo ' '.$language['Work Experience'][$i]; ?></h3>
        </div>
        <?php
            echo getWork('2016','','İSVEA EURASİA YAPI MALZEMELERİ SANAYİ VE TİCARET ANONİM ŞİRKETİ','http://isveabagno.it/','isveabagno.it');
            echo getWork('2007','','KIZE MOBILYA İMALAT TAS.ÜRÜN.SAN.VE TİC.A.Ş.','http://kize.com.tr','kize.com.tr');
            echo getWork('2008','','EURODECOR - Beka Ahşap Ürünleri San. Tic. A.Ş.','http://www.eurodecor.com.tr','eurodecor.com.tr');
            echo getWork('2011','','VERONNI - ÖZYURT İNŞAAT DEKORASYON SAN.TİC.LTD.ŞTİ - ','http://veronni.com.tr','veronni.com.tr');

            if (!$isIndex) {
                echo getWork('2014','','BORPANEL MOBİLYA-ORMAN ÜRÜN.VE İNŞ.MALZ.SAN.DIŞ TİC.A.Ş.','http://www.borpanel.com.tr','borpanel.com.tr');

                echo getWork('2015','','ECE BANYO GEREÇLERİSANAYİ VE TİCAREA.Ş.','http://www.ece.com.tr','ece.com.tr');

                echo getWork('2017','','VRM PROJE İNŞAAT TAAHHÜT ENERJİ ÜRETİM SANAYİ VE TİCARET ANO','http://vrmplus.com.tr/en/','vrmplus.com.tr/en/');
                                            echo getWork('2013','','ÖZ TATAROĞLU MOBİLYA İNŞ.GIDA TUR.TAŞ.SAN VE TİC.LTD.ŞTİ.','','');
            }
        ?>

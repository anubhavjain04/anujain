<?php
		if($dataProvider && $dataProvider->getItemCount()>0){			
			$count=$dataProvider->getItemCount();
			$pagination=$dataProvider->getPagination();
			$total=$dataProvider->getTotalItemCount();
			$start=$pagination->currentPage*$pagination->pageSize+1;
			$end=$start+$count-1;
			if($end>$total)
			{
				$end=$total;
				$start=$end-$count+1;
			}
			?>

<h1>Your Search Results (<?php echo $total; ?>)</h1>
<div class="dot-line mrgb20"></div>
<?php
			$data = $dataProvider->getData();
			for($i=0; $i<count($data); $i++ ){
				$result = $data[$i];
				$rowtype = "";
				if($i % 2 == 0){
					$rowtype = "even";
				}else{
					$rowtype = "odd";
				}
				
				?>
<div class="bdr1 mrgb20 curve10">
  <div class="bgclr5 pad15"><span class="bigtxt-s clrw"><?php echo 'BJM'.$result->MemberCode ?></span></div>
  <div class="pad15"> <a href="#">
    <div class="fleft bdr1 women">
      <?php
					$imgPath = '';										
					if($result->MemberPhoto && trim($result->MemberPhoto)!=""){
						$imgPath = Yii::app()->request->baseUrl."/..". Yii::app()->params['matrimonyPath']."/".$result->MemberPhoto;
					}
					if($imgPath){
				?>
      <img src='<?php echo $imgPath; ?>' title='<?php echo $result->MemberName ?>' />
      <?php
					}
				?>
    </div>
    </a>
    <div class="fleft pad5 wdth500">
      <div class="padt3 padb10">
        <div class="fleft bigtxt-s"><a href="#" class="clr5"><?php echo $result->MemberName ?></a></div>
        <div class="fright">
          <input type="button" value="View Full Profile" class="medimum-btn wdth45" />
        </div>
        <div class="clear"></div>
      </div>
      <div class="padt5">
        <div class="fleft wdth90 clr3">Age, Height</div>
        <div class="fleft padl5 padr10">:</div>
        <div class="fleft clrblack">24 yrs,  5ft 2in - 157cm </div>
        <div class="cleard"></div>
      </div>
      <div class="padt5">
        <div class="fleft wdth90 clr3">Sect</div>
        <div class="fleft padl5 padr10">:</div>
        <div class="fleft clrblack">Digambar</div>
        <div class="cleard"></div>
      </div>
      <div class="padt5">
        <div class="fleft wdth90 clr3">Sub Sect</div>
        <div class="fleft padl5 padr10">:</div>
        <div class="fleft clrblack">Digambar-Bisapanthi</div>
        <div class="cleard"></div>
      </div>
      <div class="padt5">
        <div class="fleft wdth90 clr3">Location</div>
        <div class="fleft padl5 padr10">:</div>
        <div class="fleft clrblack">Bhubaneshwar, Odisha, India</div>
        <div class="cleard"></div>
      </div>
      <div class="padt5">
        <div class="fleft wdth90 clr3">Education</div>
        <div class="fleft padl5 padr10">:</div>
        <div class="fleft clrblack">BFA</div>
        <div class="cleard"></div>
      </div>
      <div class="padt5">
        <div class="fleft wdth90 clr3">Occupation</div>
        <div class="fleft padl5 padr10">:</div>
        <div class="fleft clrblack">BFA</div>
        <div class="cleard"></div>
      </div>
    </div>
    <div class="cleard"></div>
    <div class="padt10">
      <div class="pad5 bgclr4"> </div>
    </div>
  </div>
</div>
<?php
			}
			
		}else{
		?>
<div>No results found.....</div>
<?php
		}
		?>

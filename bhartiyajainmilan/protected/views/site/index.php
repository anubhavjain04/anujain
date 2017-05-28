<?php 
$this->pageTitle="Bhartiya Jain Milan" 

?>

<div id="header-banner">
  <div class="row-2 relative">    
    <div class="slider fleft">
      <ul class="items">
        <li><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/head-slider/1.jpg" alt=""/></li>
        <li><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/head-slider/2.jpg" alt=""/></li>
        <li><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/head-slider/3.jpg" alt=""/></li>
        <li><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/head-slider/4.jpg" alt=""/></li>
        <li><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/head-slider/5.jpg" alt=""/></li>
        <li><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/head-slider/6.jpg" alt=""/></li>
		<li><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/head-slider/7.jpg" alt=""/></li>
        <li><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/head-slider/8.jpg" alt=""/></li>
      </ul>
      <a href="#" class="play">stop</a> </div>
	<div class="fright hindi">
      <div class="slogan-1">
      	<div class="stitle-1">Bhartiya Jain Milan</div>
        <div class="stitle-2">Jain Gaurav Smriti Varsh</div>
        <div class="padding"><a class="button-top png" href="#"><span class="png"><span class="png">more</span></span> </a></div>
      </div>
      <div class="slogan-2 ">
      	<div class="stitle-1">Bhartiya Jain Milan</div>
        <div class="stitle-2">Foundation</div>
        <div class="padding"><a class="button-top png" href='<?php echo Yii::app()->createUrl("/staticPages/foundationEstablishment");?>'><span class="png"><span class="png">more</span></span> </a></div>
      </div>
      <div class="slogan-3 ">
      	<div class="stitle-1">Bhartiya Jain Milan Samachaar</div>
        <div class="stitle-2">Monthly Magazine</div>
        <div class="padding"><a class="button-top png" href='<?php echo Yii::app()->createUrl("/magazine/monthlyMagazine");?>'><span class="png"><span class="png">more</span></span> </a></div>
      </div>
      <div class="slogan-4 ">
      	<div class="stitle-1">Bhartiya Jain Milan</div>
        <div class="stitle-2">Hospital (Sardhana)</div>
        <div class="padding"><a class="button-top png" href='<?php echo Yii::app()->createUrl("/staticPages/hospitalEstablishment");?>'><span class="png"><span class="png">more</span></span> </a></div>
      </div>
    </div>  
  </div>
</div>
<div id="content">
  <div class="wrapper">
    <div class="col-1">
      <!-- for Forthcoming programs -->
      <div class="row-2 p3">
        <div class="box1">
          <div class="corner-top-left">
            <div class="corner-top-right">
              <div class="corner-bot-left">
                <div class="corner-bot-right">
                  <div id="forthcomingPrograms" class="padding">
                      <h3 class="color-14">Forthcoming Programs</h3>
                      <div class="margin-bot scroll-container" style="height: 240px; overflow: hidden;">
                       	  <?php 
						  foreach($programsNewData as $newProgram){
						  ?>		
                          <div class="border-bot indent-bot scroll-item">
                            <div class="wrapper">
                              <div class="date-box"> <?php echo date('M',strtotime($newProgram->venueDate)); ?><br />
                                <span><?php echo date('d',strtotime($newProgram->venueDate)); ?></span> </div>                                
                              <div class="extra-box color-5"> 
                              <?php 
							  	if(!is_null($newProgram->fkLevelTableId) && !empty($newProgram->fkLevelTableId)){
									$sublevel = "";
									if($newProgram->fkLevelCode == "ZONE"){
											$zone = ZoneMaster::model()->findByPk($newProgram->fkLevelTableId);
											$sublevel = "Zone-".$zone->ZoneCode;
										
									}
									else if($newProgram->fkLevelCode == "BRANCH"){
										$branch = BranchMaster::model()->findByPk($newProgram->fkLevelTableId);
										$sublevel = "Branch-".$branch->BranchName;
									}
									echo "<div class=\"indent3 bcolor-1 color-13\">".$sublevel."</div>";
								}else{
									echo "<div class=\"indent3 bcolor-1 color-13\">".$newProgram->fkLevelCode."</div>";
								}
							  ?>
                              	<div class="color-9 strong"><div class="fleft"><?php echo $newProgram->programName; ?></div><div class="fright"><?php echo $newProgram->venuePlace; ?></div></div><br />
                                <?php echo $newProgram->shortDesc; ?>
                                <h5><?php echo date('h:i a',strtotime($newProgram->venueDate)); ?></h5><a class="color-4 it" href='<?php echo Yii::app()->createUrl('/programs/viewProgram?id='.$newProgram->pkProgramId); ?>'>more..</a> </div>
                            </div>
                          </div>
                          <?php 
						  }
						  ?>
                      </div>
                      <a class="button png" href='<?php echo Yii::app()->createUrl('/programs/forthcomingPrograms'); ?>'><span class="png"><span class="png">all programs</span></span> </a> </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- for recent programs -->
      
      <div class="row-2 p3">
    <div class="box1">
      <div class="corner-top-left">
        <div class="corner-top-right">
          <div class="corner-bot-left">
            <div class="corner-bot-right">
              <div id="recentPrograms" class="padding">
                <h4 class="color-14">Recent Programs</h4>
                <div class="scroll-container" style="height: 200px; overflow: hidden;">
                	<?php 
					foreach($programsOldData as $oldProgram){
					?>
                        <div class="recent border-bot indent-bot scroll-item"> 
                        	<?php 
							if(!is_null($oldProgram->fkLevelTableId) && !empty($oldProgram->fkLevelTableId)){
								$sublevel = "";
								if($oldProgram->fkLevelCode == "ZONE"){
										$zone = ZoneMaster::model()->findByPk($oldProgram->fkLevelTableId);
										$sublevel = "Zone-".$zone->ZoneCode;
									
								}
								else if($oldProgram->fkLevelCode == "BRANCH"){
									$branch = BranchMaster::model()->findByPk($oldProgram->fkLevelTableId);
									$sublevel = "Branch-".$branch->BranchName;
								}
								echo "<div class=\"indent3 bcolor-1 color-13\">".$sublevel."</div>";
							}else{
								echo "<div class=\"indent3 bcolor-1 color-13\">".$oldProgram->fkLevelCode."</div>";
							}						  
						  ?>
                          <div class="strong color-9"><?php echo $oldProgram->programName; ?></div>
                          <div class="clear"></div>
                          <div class="color-2"><div class="date"><?php echo date('d F Y',strtotime($oldProgram->venueDate)); ?></div><div class="city strong"><?php echo $oldProgram->venuePlace; ?></div></div>
                          
                          <a class="color-4 it" href='<?php echo Yii::app()->createUrl('/programs/viewProgram?id='.$oldProgram->pkProgramId); ?>'>more..</a> </div>
                    <?php 
					}
					?>
                </div>
                <a class="button png" href='<?php echo Yii::app()->createUrl('/programs/recentPrograms'); ?>'><span class="png"><span class="png">all programs</span></span> </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
      
      
      
      <div class="row-1 p4" style="clear:both;">
        <div class="box">
          <div class="tail-top">
            <div class="tail-bot">
              <div class="tail-left">
                <div class="tail-right">
                  <div class="corner-top-left">
                    <div class="corner-top-right">
                      <div class="corner-bot-left">
                        <div class="corner-bot-right">
                          <div class="padding">
                            <h2 class="title-1">Latest <strong>News</strong></h2>
                            <h3 style="margin-bottom: 15px; color:#F00;"><span style="font-size: 0.75em;">Bhartiya Jain Milan in <span style="font-size: 1.5em;">News </span>/ </span><span class="hindi">भारतीय जैन मिलन समाचारों में</span></h3>
							<p><i>Please click on news to view more..</i></p>
                            <ul class="lnews hindi-size hindi">
                            <?php 
								$criteria=new CDbCriteria;								
								$criteria->order = ' newsDate DESC, newsOrder ASC ';
								$criteria->limit = 15;
								$allNews = News::model()->findAll($criteria);
								foreach($allNews as $news){
							?>		
								<li>
                                	<span class="town"><span><?php echo $news->city; ?></span></span> : 
                                    <span class="content"><a href='<?php echo Yii::app()->createUrl("/news/view/id/".$news->pkNewsId);?>'><?php echo mb_substr($news->title, 0, 90, "UTF-8"); ?>...</a></span>
                                </li>
							<?php
								}
							?>  
                            </ul>
                            <div style="text-align: right; margin-top: 5px;">
                            <a class="button1 png" href='<?php echo Yii::app()->createUrl("/news/list");?>'><span class="png"><span class="png">Read More</span></span> </a>
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
      <div class="row-2">
        <div class="indent">
          <h3>Our Mission</h3>
        </div>
        <div class="wrapper hindi-size">
          
          <div class="col-1"> <img class="indent-bot" src="<?php echo Yii::app()->request->baseUrl; ?>/images/p1-seva.jpg" alt="Service" />
            <div class="indent hindi">
              <p class="text-3 color-4">सेवा (Service) </p>
              <p>हो सके तो खुशियाँ, दर्द के मारों में बाँट दो।</p>
              <a class="button png" href='<?php echo Yii::app()->createUrl("/staticPages/service");?>'><span class="png"><span class="png">read more</span></span> </a> </div>
          </div>
          <div class="col-2"> <img class="indent-bot" src="<?php echo Yii::app()->request->baseUrl; ?>/images/p2-sahayta.jpg" alt="Help" />
            <div class="indent hindi">
              <p class="text-3 color-4">सहायता (Help)</p>
              <p>दो कांटे कम कर दिये, गुज़रे जहां से हम।</p>
              <a class="button png" href='<?php echo Yii::app()->createUrl("/staticPages/help");?>'><span class="png"><span class="png">read more</span></span> </a> </div>
          </div>
          <div class="col-3 p4"> <img class="indent-bot" src="<?php echo Yii::app()->request->baseUrl; ?>/images/p3-sanskar.jpg" alt="Sanskar" />
            <div class="indent hindi">
              <p class="text-3 color-4">संस्कार (Sanskar)</p>
              <p>शुद्ध, सात्विक और पारदर्शी, हो मन वचन और आचरण।</p>
              <a class="button png" href='<?php echo Yii::app()->createUrl("/staticPages/sanskar");?>'><span class="png"><span class="png">read more</span></span> </a> </div>
          </div>
          
          <div class="col-1"> <img class="indent-bot" src="<?php echo Yii::app()->request->baseUrl; ?>/images/p4-samajik.jpg" alt="Social" />
            <div class="indent hindi">
              <p class="text-3 color-4">सामाजिक (Social)</p>
              <p>पानी, पेड़ पशु और कन्या, बचा पायें तो बचेगी दुनिया।</p>
              <a class="button png" href='<?php echo Yii::app()->createUrl("/staticPages/social");?>'><span class="png"><span class="png">read more</span></span> </a> </div>
          </div>
          <div class="col-2"> <img class="indent-bot" src="<?php echo Yii::app()->request->baseUrl; ?>/images/p5-education.jpg" alt="Educational" />
            <div class="indent hindi">
              <p class="text-3 color-4">शैक्षिक (Educational)</p>
              <p>कम आय वर्ग के बच्चों के लिये शिक्षा की समुचित व्यवस्था।</p>
              <a class="button png" href='<?php echo Yii::app()->createUrl("/staticPages/educational");?>'><span class="png"><span class="png">read more</span></span> </a> </div>
          </div>
          <div class="col-3 p4"> <img class="indent-bot" src="<?php echo Yii::app()->request->baseUrl; ?>/images/p6-shakahaar.jpg" alt="Veganism" />
            <div class="indent hindi">
              <p class="text-3 color-4">शाकाहार (Veganism)</p>
              <p>शाकाहार का मूल मन्त्र, निर्मल मन, निरोगी काया।</p>
              <a class="button png" href='<?php echo Yii::app()->createUrl("/staticPages/vaganism");?>'><span class="png"><span class="png">read more</span></span> </a> </div>
          </div>
          
           <div class="col-1"> <img class="indent-bot" src="<?php echo Yii::app()->request->baseUrl; ?>/images/p7-sanskriti.jpg" alt="Culture" />
            <div class="indent hindi">
              <p class="text-3 color-4">संस्कृति (Culture)</p>
              <p>जैन इतिहास एवं संस्कृति की रक्षा।</p>
              <a class="button png" href='<?php echo Yii::app()->createUrl("/staticPages/culture");?>'><span class="png"><span class="png">read more</span></span> </a> </div>
          </div>
          <div class="col-2"> <img class="indent-bot" src="<?php echo Yii::app()->request->baseUrl; ?>/images/p8-jainekta.jpg" alt="Jain Unity" />
            <div class="indent hindi">
              <p class="text-3 color-4">जैन एकता (Jain Unity)</p>
              <p>हम नहीं दिगम्बर, श्वेताम्बर, तेरहपंथी, स्थानकवासी, हम एक पंथ के अनुयायी, हम एक देव के विश्वासी।</p>
              <a class="button png" href='<?php echo Yii::app()->createUrl("/staticPages/jainUnity");?>'><span class="png"><span class="png">read more</span></span> </a> </div>
          </div>
          <div class="col-3"> <img class="indent-bot" src="<?php echo Yii::app()->request->baseUrl; ?>/images/p9-dharmik.jpg" alt="Religious" />
            <div class="indent hindi">
              <p class="text-3 color-4">धार्मिक (Religious)</p>
              <p>आदि ऋषभ के पुत्र भरत का, भारत देश महान, ऋषभ देव से महावीर तक, करे सुमंगल गान।</p>
              <a class="button png" href='<?php echo Yii::app()->createUrl("/staticPages/religious");?>'><span class="png"><span class="png">read more</span></span> </a> </div>
          </div>

        </div>
      </div>
    </div>
     <?php include("rightNewsProgrames.php"); ?>
    
  </div>
</div>

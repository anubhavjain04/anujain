<div>
  <div class="padt30">
    <div class="fleft wdth280">
      <div class="clrw search-header bld mediumhdrtxt">REFINE SEARCH</div>
      <div class="pad10 padt20 bdr1">
      	<div>
          <h3>Refine your search</h3>
          <div>
            <p> You can refine your search results by simply modify/change search criteria as given below:- </p>
          </div>
        </div>
        
        <form id="formSearch" action='<?php echo Yii::app()->createUrl("/search/results"); ?>' method="post">
            <div id="accordion">
              <h3>Age</h3>
              <div>
                <ul>
                    <li>
                    	<span class="arrow"></span>
                        <span data-bind="text: ageFrom"></span> yrs To <span data-bind="text: ageTo"></span> yrs
                    </li>
                </ul>
                <div class="tlright"><a href='javascript:void(0)' rel="click here to change criteria" data-bind="click: searchDialogViewModel.ageDialog.openDialog">change</a></div>
                <div data-bind="dialog: searchDialogViewModel.ageDialog.bindDialog(), dialogVisible: searchDialogViewModel.ageDialog.isOpen" style="display: none;">
                    <select data-bind="options: ageList, value: ageFrom"></select>
                    <label class="padl5 padr5">To</label>
                	<select data-bind="options: ageList, value: ageTo"></select>
                    <label class="padl5 padr5">Years</label>
                </div>
              </div>
              <h3>Height</h3>
              <div>
                 <ul>
                    <li><span class="arrow"></span>
                        <span data-bind="text: heightInWords(heightFrom())"></span> To <span data-bind="text: heightInWords(heightTo())"></span>
                    </li>
                </ul>                
                <div class="tlright"><a href="javascript:void(0)" rel="click here to change criteria" data-bind="click: searchDialogViewModel.heightDialog.openDialog">change</a></div>
                <div data-bind="dialog: searchDialogViewModel.heightDialog.bindDialog(), dialogVisible: searchDialogViewModel.heightDialog.isOpen" style="display: none;">
                    <select data-bind="options: heightList, optionsText: 'value', optionsValue: 'key', value: heightFrom"></select>
					<label class="padl5 padr5">To</label>
                    <select data-bind="options: heightList, optionsText: 'value', optionsValue: 'key', value: heightTo"></select>
                </div>
              </div>
              <h3>Marital Status</h3>
              <div>
                 <ul>
                    <li><span class="arrow"></span>Unmarried</li>
                    <li><span class="arrow"></span>Seperated</li>
                </ul>
                <div class="tlright"><a href="javascript:void(0)" rel="click here to change criteria" onclick='$("#dgMaritalStatus").dialog("open");'>change</a></div>
                <div id="dgMaritalStatus" title="Marital Status" style="display: none;">
                <?php 
					$maritalStatus = array(''=>'Any','1'=>'Unmarried', '2'=>'Widow / Widower', '3'=>'Divorced', '4'=>'Separated');
						echo CHtml::checkBoxList('Search[maritalStatus]','',$maritalStatus,array('template'=>'{input}<span class="padl10"></span>{label}','separator'=>'<span class="padl5 padr25"></span>', 'class'=>'validate[required,funcCall[validateMaritalStatus]]'));
				?>
                </div>
              </div>
              <h3>Mother Toungue</h3>
              <div>
                <ul>
                    <li><span class="arrow"></span>Hindi</li>
                    <li><span class="arrow"></span>Gujrati</li>
                </ul>
                <div class="tlright"><a href="#" rel="click here to change criteria">more...</a></div>
              </div>
              <h3>Sect</h3>
              <div>
                <ul>
                    <li><span class="arrow"></span>Digamber</li>
                    <li><span class="arrow"></span>Shevetamber</li>
                </ul>
                <div class="tlright"><a href="#" rel="click here to change criteria">more...</a></div>
              </div>
              <h3>Sub Sect</h3>
              <div>
                <ul>
                    <li><span class="arrow"></span>Digamber-Terapanthi</li>
                    <li><span class="arrow"></span>Shevetamber-Sthanakvasi</li>
                </ul>
                <div class="tlright"><a href="#" rel="click here to change criteria">more...</a></div>
              </div>
              <h3>Caste</h3>
              <div>
                <ul>
                    <li><span class="arrow"></span>Jain-Baniya</li>
                    <li><span class="arrow"></span>Jain-Oswal</li>
                </ul>
                <div class="tlright"><a href="#" rel="click here to change criteria">more...</a></div>
              </div>
              <h3>Education</h3>
              <div>
                <ul>
                    <li><span class="arrow"></span>Masters - Management / Others</li>
                    <li><span class="arrow"></span>Others</li>
                </ul>
                <div class="tlright"><a href="#" rel="click here to change criteria">more...</a></div>
              </div>
              <h3>Occupation</h3>
              <div>
                <ul>
                    <li><span class="arrow"></span>Software Professional (883)</li>
                    <li><span class="arrow"></span>Doctors</li>
                </ul>
                <div class="tlright"><a href="#" rel="click here to change criteria">more...</a></div>
              </div>
              <h3>Annual Income</h3>
              <div>
                <ul>
                    <li><span class="arrow"></span>Rs.1 lakh to Rs.3 lakh (1656)</li>
                </ul>
                <div class="tlright"><a href="#" rel="click here to change criteria">more...</a></div>
              </div>
              <h3>Country</h3>
              <div>
                <ul>
                    <li><span class="arrow"></span>India</li>
                    <li><span class="arrow"></span>Others</li>
                </ul>
                <div class="tlright"><a href="#" rel="click here to change criteria">more...</a></div>
              </div>
              <h3>Physical Status</h3>
              <div>
                <ul>
                    <li><span class="arrow"></span>Normal (7250)</li>
                    <li><span class="arrow"></span>Physically Challenged (59)</li>
                </ul>
                <div class="tlright"><a href="#" rel="click here to change criteria">more...</a></div>
              </div>
              
            </div>
        </form>
      </div>
    </div>
    <div class="fright wdth700">
     <?php include('searchSpec.php'); ?>
    </div>
  </div>
</div>
<script type="text/javascript">
	var searchSpec = $.parseJSON('<?php echo $json = json_encode($searchSpec); ?>');
</script>

<!--<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/search/search.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/search/uiFunctions.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/search/searchDialogs.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/search/searchResults.js"></script>

<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/search/searchModel.js"></script> -->

<?php
	$filepath = Yii::app()->basePath."/views/layouts/jsLibrary.php";
	include($filepath); 
?>

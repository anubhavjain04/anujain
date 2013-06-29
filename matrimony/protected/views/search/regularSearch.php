<div>
  <h1>Search</h1>
  <div id="tabs">
    <ul>
      <li><a href="#tabs-1">Regular</a></li>
      <li><a href="#tabs-2">By Matrimony Id</a></li>
    </ul>
    <div id="tabs-1">
      <h2>Basic Search Criteria</h2>
      <form id="formRegularSearch" name="formRegularSearch" action='<?php echo Yii::app()->createUrl("/search/results"); ?>' method="post">
        <div style="width:100%;" class="padt20"> 
        	<div class="row">
            	<div class="dot-line padt10"></div>
            	<dl>
                	<dt><label class="bld">Looking for</label></dt>
                    <dd>
                    	<input type="radio" id="bride" name="Search[sex]"  value="0" onclick="checkGenderAge(18);" checked="checked" />
                        <span class="padl0"></span>
                        <label for="bride">Bride </label>
                        <span class="padl5 padr25"></span>
                        <input type="radio" id="groom" name="Search[sex]" value="1" onclick="checkGenderAge(21);">
                      	<span class="padl0"></span>
                      	<label for="groom">Groom </label>
                    </dd>
                </dl>
            </div>
        	<div class="row">
            	<div class="dot-line padt10"></div>
            	<dl>
                	<dt><label class="bld">Age</label></dt>
                    <dd>
                    	<?php
							$year = array();
							for($i=18; $i<=70; $i++){
								$year[$i] = $i;
							}
						?>
                        <?php
							echo CHtml::dropDownList('Search[ageFrom]','', $year,array('id'=>'ageFrom', 'class'=>'search-input wdth50 validate[optional,funcCall[validateAgeRange]]'));							
						?>
                        <label class="padl5 padr5">To</label>
                        <?php
							echo CHtml::dropDownList('Search[ageTo]','', $year,array('id'=>'ageTo', 'class'=>'search-input wdth50 validate[optional,funcCall[validateAgeRange]]'));							
						?>
                        <label class="padl5 padr5">Years</label>
                    </dd>
                </dl>
            </div>
        	<div class="row">
            	<div class="dot-line padt10"></div>
            	<dl>
                	<dt><label class="bld">Height</label></dt>
                    <dd>
                    	 <?php
							$height = array();
							$initialValue = 119.38;
							for($i=4; $i<8; $i++){					
								for($j=0; $j<12; $j++){
									$initialValue = $initialValue + 2.54;						
									$key = number_format($initialValue,2);
									$value = $i.' feet'.(($j==0)?'':' '.$j.' inches');
									$height[$key]= $value; 
								}
							}
							
						?>
						<?php 
							echo CHtml::dropDownList('Search[heightFrom]','',$height, array('id'=>'heightFrom', 'class'=>'search-input wdth130 validate[optional,funcCall[validateHeightRange]]')); 
						?>
                        <label class="padl5 padr5">To</label>
                        <?php 
							echo CHtml::dropDownList('Search[heightTo]','',$height, array('id'=>'heightTo', 'class'=>'search-input wdth130 validate[optional,funcCall[validateHeightRange]]')); 
						?>
                    </dd>
                </dl>
            </div>
            <div class="row">
            	<div class="dot-line padt10"></div>
            	<dl>
                	<dt><label class="bld">Marital Status</label></dt>
                    <dd>
                    	<?php
						
						$maritalStatus = array(''=>'Any','1'=>'Unmarried', '2'=>'Widow / Widower', '3'=>'Divorced', '4'=>'Separated');
						echo CHtml::checkBoxList('Search[maritalStatus]','',$maritalStatus,array('template'=>'{input}<span class="padl10"></span>{label}','separator'=>'<span class="padl5 padr25"></span>', 'class'=>'validate[required,funcCall[validateMaritalStatus]]'));
						?>
                    </dd>
                </dl>
            </div>
        	<div class="row">
            	<div class="dot-line padt10"></div>
            	<dl>
                	<dt><label class="bld">Sect</label></dt>
                    <dd>
                    	<?php
                    	$sect = CHtml::listData(MatrimonySect::model()->findAll(array('order'=>' SectName ASC ')),'pkSectId','SectName');
		                echo CHtml::dropDownList('Search[sect][]','',$sect,array('id'=>'sect', 'prompt'=>'Any', 'class'=>'search-input wdth150', 'onchange'=>'getSubSect($(this).val(), \''.Yii::app()->homeUrl.'/matrimonySubSect/getSubSects\');'));
						?>
                    </dd>
                </dl>
            </div>
            <div class="row">
            	<div class="dot-line padt10"></div>
            	<dl>
                	<dt><label class="bld">Sub Sect</label></dt>
                    <dd>
            			<?php 
						$subsect = array();
						echo CHtml::dropDownList('Search[subsect][]','',$subsect,array('id'=>'subsect', 'prompt'=>'Any', 'class'=>'search-input wdth150'));?>
                    </dd>
                </dl>
            </div>
            <div class="row">
            	<div class="dot-line padt10"></div>
            	<dl>
                	<dt><label class="bld">Caste</label></dt>
                    <dd>
                    	<?php 
							$sql = "(SELECT pkCasteId as pkCasteId,CasteName as CasteName FROM matrimony_caste where pkCasteId not in(0,1,2) order by CasteName)
									union
									(SELECT pkCasteId as pkCasteId,CasteName as CasteName FROM matrimony_caste where pkCasteId in(0,1,2) order by pkCasteId)";
									$command=Yii::app()->db->createCommand($sql);
									$results=$command->queryAll();
							$caste = CHtml::listData($results,'pkCasteId','CasteName');
							echo CHtml::dropDownList('Search[caste][]','',$caste,array('id'=>'caste', 'prompt'=>'Any', 'class'=>'search-input wdth150'));
						?>
                    </dd>
                </dl>
            </div>
            <div class="row">
            	<div class="dot-line padt10"></div>
            	<dl>
                	<dt><label class="bld">Mother Tongue</label></dt>
                    <dd>
                    	<?php
							$motherTongue = CHtml::listData(MatrimonyMotherTongue::model()->findAll(array('order'=>' TongueName ASC ')),'pkTongueId','TongueName');
							echo CHtml::dropDownList('Search[mothertongue][]','',$motherTongue,array('id'=>'mothertongue', 'prompt'=>'Any', 'class'=>'search-input wdth150'));
						?>
                    </dd>
                </dl>
            </div>
            <div class="row">
            	<div class="dot-line padt10"></div>
            	<dl>
                	<dt><label class="bld">Education</label></dt>
                    <dd>
                    	<?php 
							$allCoursesGroups = CHtml::listData(MatrimonyCourseGroup::model()->findAll(array('order'=>'GroupName')),'pkCourseGroupId','GroupName');		
							echo CHtml::dropDownList('Search[educationGroup][]','',$allCoursesGroups,array('id'=>'education', 'prompt'=>'Any', 'class'=>'search-input wdth150'));
						?>
                    </dd>
                </dl>
            </div>
            <div class="row">
            	<div class="dot-line padt10"></div>
            	<dl>
                	<dt><label class="bld">Country</label></dt>
                    <dd>
                    	<?php
							$country = CHtml::listData(Country::model()->findAll(array('order'=>' CountryName ASC ')),'pkCountryId','CountryName');
							echo CHtml::dropDownList('Search[country][]','',$country,array('id'=>'country', 'prompt'=>'Any', 'class'=>'search-input wdth150'));
						?>
                    </dd>
                </dl>
            </div>
            <div class="row">
            	<div class="dot-line padt10"></div>
            	<dl>
                	<dt></dt>
                    <dd>
                    	<input type="submit" class="big-btn width100" value="Search" onclick="return $('#formRegularSearch').validationEngine('validate');" />
                    </dd>
                </dl>
            </div>
            <div class="padb35"></div>
        </div>
      </form>
    </div>
    <div id="tabs-2">
    	<h2>BY MATRIMONY ID</h2>
      	<form id="formByIDSearch" name="formByIDSearch" action="" method="post">
        	<div style="width:100%;" class="padt20"> 
            	 <div class="row">
                    <div class="dot-line padt10"></div>
                    <dl>
                        <dt><label class="bld">BJM Matrimony ID</label></dt>
                        <dd>
                            <input type="text" id="memberCode" name="memberCode" class="search-input validate[required]" />
                        </dd>
                    </dl>
                </div>
                <div class="row">
                    <div class="dot-line padt10"></div>
                    <dl>
                        <dt></dt>
                        <dd>
                            <input type="submit" class="big-btn width100" value="Search" onclick="return $('#formByIDSearch').validationEngine('validate');" />
                        </dd>
                    </dl>
                </div>
                <div class="padb35"></div>
            </div>
        </form>    
    </div>
  </div>
</div>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/search.js"></script>
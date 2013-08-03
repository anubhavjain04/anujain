<div>
  <h1>Search</h1>
  
    <ul class="nav nav-tabs">
      <li class="active"><a href="#tabs-1" data-toggle="pill">Regular</a></li>
      <li><a href="#tabs-2" data-toggle="pill">By Matrimony Id</a></li>
    </ul>
    <div class="tab-content">
    <div id="tabs-1" class="tab-pane active">
      <h2>Basic Search Criteria</h2>
      <form id="formRegularSearch" name="formRegularSearch" action='<?php echo Yii::app()->createUrl("/search/results"); ?>' method="post">
        <div style="width:100%;" class="padt20"> 
        	<div class="row">
            	<div class="dot-line padt10"></div>
            	<dl>
                	<dt><label class="bld">Looking for</label></dt>
                    <dd>
                    	<input type="radio" id="bride" name="sex"  value="0" data-bind="checked: sex"  />
                        <span class="padl0"></span>
                        <label for="bride">Bride </label>
                        <span class="padl5 padr25"></span>
                        <input type="radio" id="groom" name="sex" value="1" data-bind="checked: sex" />
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
           				<select data-bind="options: ageList, value: ageFrom" class="search-input wdth50"></select>
                        <label class="padl5 padr5">To</label>
                        <select data-bind="options: ageList, value: ageTo" class="search-input wdth50"></select>
                        <label class="padl5 padr5">Years</label>
                    </dd>
                </dl>
            </div>
        	<div class="row">
            	<div class="dot-line padt10"></div>
            	<dl>
                	<dt><label class="bld">Height</label></dt>
                    <dd>
                    	<select data-bind="options: heightList, optionsText: 'text', optionsValue: 'key', value: heightFrom" class="search-input wdth130"></select>
						<label class="padl5 padr5">To</label>
                    	<select data-bind="options: heightList, optionsText: 'text', optionsValue: 'key', value: heightTo" class="search-input wdth130"></select>
                    </dd>
                </dl>
            </div>
            <div class="row">
            	<div class="dot-line padt10"></div>
            	<dl>
                	<dt><label class="bld">Marital Status</label></dt>
                    <dd>
                    	<select data-bind="options: maritalStatusList, optionsText: 'text', optionsValue: 'key', selectedOptions: selectedMaritalStatus" size="5" multiple="true" class="search-input wdth130"></select>                    	
                    </dd>
                </dl>
            </div>
        	<div class="row">
            	<div class="dot-line padt10"></div>
            	<dl>
                	<dt><label class="bld">Sect</label></dt>
                    <dd>
                    	<select data-bind="options: sectList, optionsText: 'SectName', value: selectedSect, event: {change: afterSectChange}" class="search-input wdth130"></select>                    	
                    </dd>
                </dl>
            </div>
            <div class="row">
            	<div class="dot-line padt10"></div>
            	<dl>
                	<dt><label class="bld">Sub Sect</label></dt>
                    <dd>
                    	<select data-bind="options: subSectList, optionsText: 'SubSectName', value: selectedSubSect" class="search-input wdth130"></select>
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
    <div id="tabs-2" class="tab-pane">
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

<?php
	$filepath = Yii::app()->basePath."/views/layouts/jsLibrary.php";
	include($filepath); 
?>


<!--<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/search/search.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/search/searchPage.js"></script>-->
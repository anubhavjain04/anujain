<section>
    <div class="fleft padt20" >
      <div class="pad5" style="border: solid 1px #CCCCCC; ">
        <div style="width:460px; height: 232px; background:url(img/banner.jpg) no-repeat; border: solid 1px #F63F03;"></div>
      </div>
      <div class="hp-banner-jain-txt tlcenter padt25 padb15" style="background: url(img/ribbon-love.gif) no-repeat left center;"> 
      	To find someone who will love you <br />
        for no reason. 
      </div>
     
    </div>
    <div class="fright">
      <div class="hp-reg padb10 padt5">
        <div class="register-bg">
          <div class="padl20 padt5">Register</div>
        </div>
        <div id="homeregisterform">
          <div style="float:left">
            <div id="membership1"> 
              <!-- Register Form - Start -->
              <form action="#" id="frmRegister" name="frmRegister" method="post">
                <div class="mediumtxt" id="hpreg">
                  <dl>
                    <dt>
                      <label for="profile">Profile created by<span class="rdclr"> *</span></label>
                    </dt>
                    <dd>
                      <select tabindex="1" class="selectfield wdth197" name="profile" id="profile">
                        <option value="0" selected="selected">--- Select ---</option>
                        <option value="1">Self</option>
                        <option value="2">Parents</option>
                        <option value="3">Sibling</option>
                        <option value="4">Relative</option>
                        <option value="5">Friend</option>
                      </select>
                    </dd>
                  </dl>
                  <dl>
                    <dt>
                      <label for="name"><span id="mpname">Name</span><span class="rdclr"> *</span></label>
                    </dt>
                    <dd>
                      <input type="text" tabindex="2" value="" name="name" id="name" maxlength="40" class="textfield" style="width:188px;">
                    </dd>
                  </dl>
                  <dl class="height18">
                    <dt class="padt1">
                      <label for="gendermale">Gender<span class="rdclr"> *</span></label>
                    </dt>
                    <dd></dd>
                    <dd>
                      <label for="gendermale">
                        <input type="radio" id="gendermale" name="gender" value="1" class="radio" tabindex="3">
                        Male</label>
                      &nbsp;
                      <label for="genderfemale">
                        <input type="radio" id="genderfemale" name="gender" value="2" class="radio" tabindex="4">
                        Female</label>
                      <input type="hidden" value="21" name="MaleAge">
                      <input type="hidden" value="18" name="FemaleAge">
                    </dd>
                  </dl>
                  <dl>
                    <dt>
                      <label for="dobDay">Date of birth<span class="rdclr"> *</span></label>
                    </dt>
                    <dd id="dobDay">
                      <div class="fleft padr4">
                        <select tabindex="5" class="wdth55" id="dobDay" name="dobDay">
                          <option selected="" value="0">-Date-</option>
                          <option value="1">1</option>
                          <option value="2">2</option>                          
                        </select>
                        &nbsp;
                        <select tabindex="6" class="selectfield wdth75" id="dobMonth" name="dobMonth" >
                          <option selected="" value="0">-Month-</option>
                          <option value="01">January</option>
                          <option value="02">February</option>                          
                        </select>
                        &nbsp;
                        <select tabindex="7" name="dobYear" id="DOBYEAR" class="selectfield wdth55" >
                          <option selected="" value="0">-Year-</option>
                          <option value="1995">1995</option>
                          <option value="1994">1994</option>                          
                        </select>
                        <input type="hidden" value="0" id="age" name="age">
                      </div>
                    </dd>
                  </dl>
                  <!-- Marital Status  --> 
                  <span id="maritalStatusDivId">
                  <input type="hidden" value="4" name="MaritalCount">
                  <dl>
                    <dt class="frmlabel">
                      <label for="">Marital Status <span class="rdclr"> *</span></label>
                    </dt>
                    <dd>
                      <select tabindex="8" value="" class="radiomargin mstatus_valid wdth197" name="maritalStatus" id="maritalStatus">
                        <option value="0" selected="selected">--- Select ---</option>
                        <option value="1">Unmarried</option>
                        <option value="2">Widow / Widower</option>
                        <option value="3">Divorced</option>
                        <option value="4">Separated</option>
                      </select>
                    </dd>
                  </dl>
                  </span> 
                  <!--MARITAL STATUS--> 
                  
                  <!-- appearence  --> 
                  
                  <!-- appearence  --> 
                  
                  <!-- culturalBackground  --> 
                  <span id="culturalBackground"><!--RELIGION-->
                  <input type="hidden" value="1" id="religionOption" name="religionOption">
                  <input type="hidden" value="5" id="religion" name="religion">
                  <!--RELIGION--> 
                  
                  <!--DENOMINATION-->
                  <input type="hidden" value="2" id="denominationOption" name="denominationOption">
                  <input type="hidden" value="sect" name="denominationlabel" id="denominationlabel">
                  <dl>
                    <dt class="frmlabel" id="denomlbl">
                      <label for="">Sect <span class="rdclr"> *</span></label>
                    </dt>
                    <dd>
                      <select onchange="funDenomination();" tabindex="20" class="wdth197" name="denomination" id="denomination">
                        <option alt="--- Select ---" title="--- Select ---" selected="" value="0">--- Select ---</option>
                        <option alt="Shvetambar" title="Shvetambar" value="36">Shvetambar</option>
                        <option alt="Digambar" title="Digambar" value="37">Digambar</option>
                      </select>
                      <span id="denominationspan"></span> </dd>
                  </dl>
                  <!--DENOMINATION--> 
                  
                  <!--CASTE-->
                  
                  <dl id="casteDivId">
                    <input type="hidden" value="sub sect" id="castelabel" name="castelabel">
                    <input type="hidden" value="9" id="casteOption" name="casteOption">
                    <input type="hidden" value="1" name="castemandatory" id="castemandatory">
                    <dt class="branchDiv">
                      <label for="">Sub Sect </label>
                      <span class="rdclr">*</span></dt>
                    <dd>
                      <select onchange="funCaste('','');" id="caste" name="caste" tabindex="21" class="wdth197">
                        <option alt="--- Select ---" title="--- Select ---" selected="" value="0">--- Select ---</option>
                        <option alt="Shvetambar-Murtipujaka" title="Shvetambar-Murtipujaka" value="1016">Shvetambar-Murtipujaka</option>
                        <option alt="Shvetambar-Sthanakvasi" title="Shvetambar-Sthanakvasi" value="1017">Shvetambar-Sthanakvasi</option>
                        <option alt="Shvetambar-Terapanthi" title="Shvetambar-Terapanthi" value="1018">Shvetambar-Terapanthi</option>
                        <option alt="Digambar-Bisapanthi" title="Digambar-Bisapanthi" value="1019">Digambar-Bisapanthi</option>
                        <option alt="Digambar-Gumanapanthi" title="Digambar-Gumanapanthi" value="1020">Digambar-Gumanapanthi</option>
                        <option alt="Digambar-Taranapanthi" title="Digambar-Taranapanthi" value="1021">Digambar-Taranapanthi</option>
                        <option alt="Digambar-Terapanthi" title="Digambar-Terapanthi" value="1022">Digambar-Terapanthi</option>
                        <option alt="Digambar-Totapanthi" title="Digambar-Totapanthi" value="1023">Digambar-Totapanthi</option>
                        <option alt="Others" title="Others" value="9997">Others</option>
                      </select>
                      <span id="castespan"></span> </dd>
                  </dl>
                  
                  <!--CASTE--> 
                  
                  <!--SUBCASTE-->
                  <input type="hidden" value="12" id="subCasteOption" name="subCasteOption">
                  <input type="hidden" value="caste" name="subcastelabel" id="subcastelabel">
                  <input type="hidden" value="0" id="subcastemandatory" name="subcastemandatory">
                  <div id="subCasteDivId">
                    <dl>
                      <dt class="frmlabel" id="subcastelbl">
                        <label for="">Caste </label>
                      </dt>
                      <dd>
                        <select id="subCaste" name="subCaste" tabindex="22" class="wdth197">
                          <option alt="--- Select ---" title="--- Select ---" selected="" value="0">--- Select ---</option>
                          <option alt="Jain - Agarwal" title="Jain - Agarwal" value="3000">Jain - Agarwal</option>
                          <option alt="Jain - Bania" title="Jain - Bania" value="3006">Jain - Bania</option>
                          <option alt="Jain - Intercaste" title="Jain - Intercaste" value="3005">Jain - Intercaste</option>
                          <option alt="Jain - Jaiswal" title="Jain - Jaiswal" value="3001">Jain - Jaiswal</option>
                          <option alt="Jain - Khandelwal" title="Jain - Khandelwal" value="3002">Jain - Khandelwal</option>
                          <option alt="Jain - Kutchi" title="Jain - Kutchi" value="3007">Jain - Kutchi</option>
                          <option alt="Jain - Oswal" title="Jain - Oswal" value="3003">Jain - Oswal</option>
                          <option alt="Jain - Porwal" title="Jain - Porwal" value="3004">Jain - Porwal</option>
                          <option alt="Jain - Vaishya" title="Jain - Vaishya" value="3008">Jain - Vaishya</option>
                          <option alt="Others" title="Others" value="9997">Others</option>
                          <option alt="Don't wish to specify" title="Don't wish to specify" value="9998">Don't wish to specify</option>
                          <option alt="Don't know my sub-caste" title="Don't know my sub-caste" value="9999">Don't know my sub-caste</option>
                        </select>
                        <span id="subcastespan"></span> </dd>
                    </dl>
                  </div>
                  
                  <!--SUBCASTE-->
                  <input type="hidden" value="1" name="religionfeature" id="religionfeature">
                  <input type="hidden" value="1" name="denominationfeature" id="denominationfeature">
                  <input type="hidden" value="1" name="castefeature" id="castefeature">
                  <input type="hidden" value="1" name="subcastefeature" id="subcastefeature">
                  <input type="hidden" value="2501" name="communityId" id="communityId">
                  </span> 
                  
                  <!-- MotherTongue  --> 
                  <span id="MotherTongueDivId">
                  <input type="hidden" value="1" name="mothertonguefeature">
                  <input type="hidden" value="81" name="motherTongueOption">
                  <dl>
                    <dt id="mtonglbl" class="frmlabel">
                      <label for="">Mother Tongue<span class="rdclr"> *</span></label>
                    </dt>
                    <dd>
                      <select tabindex="23" class="wdth197" name="motherTongue" id="motherTongue">
                        <option alt="--- Select ---" title="--- Select ---" selected="" value="0">--- Select ---</option>                        
                        <option alt="English" title="English" value="10">English</option>
                        <option alt="Hindi" title="Hindi" value="17">Hindi</option>
                       
                      </select>
                      <span class="errortxt" id="mothertonguespan"></span></dd>
                  </dl>
                  <!--MOTHER TONGUE--></span>
                  <dl>
                    <dt>
                      <label for="country">Country living in<span class="rdclr"> *</span></label>
                    </dt>
                    <dd>
                      <select onchange="countryChk();" class="srchselect wdth197" tabindex="24" size="1" name="country" id="country">
                        <option value="0">--- Select ---</option>
                        <option value="98">India</option>
                        <option value="222">United States of America</option>
                        <option value="220">United Arab Emirates</option>                        
                      </select>
                      <br>
                      <span class="errortxt" id="clspan"></span> </dd>
                  </dl>
                  <dl>
                    <dt>
                      <label for="countryCode">Mobile Number<span class="rdclr"> *</span></label>
                    </dt>
                    <dd id="MOBILEBOX">
                      <div class="fleft padr4">
                        <select class="srchselect wdth65" tabindex="25" size="1" name="countryCode" id="countryCode">
                          <option value="0">--- Country Code ---</option>
                          <option value="98">India (91)</option>
                          <option value="222">United States of America (1)</option>
                          <option value="220">United Arab Emirates (971)</option>                          
                        </select>
                        <input value="" class="textfield wdth120 mobilepos" maxlength="50" id="mobileNo" name="mobileNo" tabindex="26">
                      </div>
                    </dd>
                  </dl>
                  <dl>
                    <dt>
                      <label for="email">E-mail<span class="rdclr"> *</span></label>
                    </dt>
                    <dd>
                      <input value="" tabindex="27" class="textfield wdth188" maxlength="50" id="email" name="email" style="width:188px;">
                    </dd>
                  </dl>
                  <dl>
                    <dt>
                      <label for="password">Login Password<span class="rdclr"> *</span></label>
                    </dt>
                    <dd>
                      <input type="password" value="" tabindex="28" maxlength="20" class="textfield wdth188" id="password" name="password" style="width:188px;">
                    </dd>
                  </dl>
                  <div class="padt10 padl5 padr4 ">
                    <div class="fleft">
                      <div class="fleft padr5 padt10">
                        <input type="checkbox" value="1" tabindex="29" name="termsAndConditions" id="termsAndConditions" checked="checked">
                      </div>
                      <div class="clr1 fleft padt8 mediumhdrtxt">
                        <label for="termsAndConditions">I agree to the <a class="link" href="#nogo" target="_blank">Privacy Policy </a> <br>
                          and <a class="link" href="#nogo" target="_blank">Terms &amp; Conditions</a></label>
                      </div>
                      <div class="cleard"><!--  --></div>
                    </div>
                    <div class="padt12 fright">
                      <input type="submit" value="Register" alt="Login" class="medimum-btn" tabindex="30">
                    </div>
                    <div class="cleard"><!--  --></div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
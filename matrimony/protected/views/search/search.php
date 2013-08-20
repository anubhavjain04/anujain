<div data-bind="visible: !showSearchResults()">
    <div data-bind="template: { name: 'search/views/regularSearch'}">
    </div>
</div>
<div data-bind="visible: showSearchResults()">
    <div data-bind="template: { name: 'search/views/searchResults'}">
    </div>
</div>


<?php
	$filepath = Yii::app()->basePath."/views/layouts/jsLibrary.php";
	include($filepath); 
?>
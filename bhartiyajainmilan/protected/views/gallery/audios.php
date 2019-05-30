<?php
$pageSize = Yii::app()->user->getState('pageSize',Yii::app()->params['defaultPageSize']);
?>
<?php $this->pageTitle="Gallery | Events | Function | Videos" ?>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/grid.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/resources/js/programs/view.js" type="text/javascript"></script>

<div id="content">
    <div class="wrapper">
        <div class="row-1 p4">
            <div class="box">
                <div class="padding">
                    <h4 class="title-1">
                        Gallery <strong>Audios</strong>
                    </h4>
                    <h4 class="title-1"> 
                        <strong>Find:</strong>
                    </h4>
                    <div class="form-theme">
                        <div id="filters">
                            <ul class="left">
                                <li><label for="title" >Audio Title</label></li>
                                <li><input id="title" type="text" name="Gallery[title]"  /></li>
                                <li><label for="date" >Date</label></li>
                                <li><input id="date" autocomplete="off" type="text" name="Gallery[date]"  /></li>
                            </ul> 
                            <ul class="left">
                                <li><label for="shortDesc" >Short Description</label></li>
                                <li><input id="shortDesc" type="text" name="Gallery[shortDesc]"  /></li>
                            </ul>
                            <div class="reset-float"></div>
                            <button id="searchRecord" class="alignment">Search</button>   
                        </div>
                    <div>
                    <div class="clear p3"></div>
                    <form name="actionForm" id="actionForm" action="" method="post">
                        <div style="color: #FF0000;">
                            <?php if(isset($_GET['msg']) && !empty($_GET['msg'])) { echo $_GET['msg']; } ?></div>
                        <?php
                        $dataProvider = $model->search("2");
                        if($dataProvider->getItemCount()>0)
                        {
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
                        <div class="p1">
                            <span>No. of max. videos per page : </span>
                            <select id="pageSize" name="pageSize" pval="<?php echo $pageSize; ?>">
                                <option value="5">5</option>
                                <option value="10">10</option>
                                <option value="20">20</option>
                                <option value="30">30</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                                <option value="200">200</option>
                            </select>
                        </div>
                        <div id="grid-data_loader" class="ajax"></div>
                        <div id="grid-data">
                            <div class="p1">
                                <?php 								
                                    $pager=array();
                                    $class='CLinkPager';
                                    $pager['pages']=$dataProvider->getPagination();
                                    if($pager['pages']->getPageCount()>1)
                                    {
                                        echo '<div id="pager" class="pager">';
                                        $this->widget($class,$pager);
                                        echo '</div>';
                                    }									
                                ?>

                            </div>
                            <div class="alignright">Displaying <?php echo $start; ?>-<?php echo $end; ?> of <?php echo $total; ?> results.</div>
                            <div class="gallery list">
                                <div class="gVideos p2">
                                    <?php 
                                        $data = $dataProvider->getData();
                                        for($i=0; $i<count($data); $i++ ) {
                                            $item = $data[$i];
                                    ?>
                                    <div class="gVideo">
                                        <div class="gTitle"><?php echo $item->title ?></div>
                                        <div class="gDesc"><?php echo $item->shortDesc ?></div>
                                        <div><strong><?php echo date('d F Y',strtotime($item->date)); ?></strong></div>
                                        <div class="media"><?php echo $item->longDesc ?></div>
                                    </div>
                                    <?php
                                        }
                                    ?>
                                </div>
                            </div>
                            <?php 								
                                $pager=array();
                                $class='CLinkPager';
                                $pager['pages']=$dataProvider->getPagination();
                                if($pager['pages']->getPageCount()>1)
                                {
                                    echo '<div id="pager" class="pager">';
                                    $this->widget($class,$pager);
                                    echo '</div>';
                                }									
                            ?>
                            <input type="hidden" id="grid-data_pageURL" value="<?php echo Yii::app()->createUrl(Yii::app()->controller->getId().'/'.Yii::app()->controller->getAction()->getId(),$_GET); ?>"  />
                            <input type="hidden" id="grid-data_searchURL" value="<?php echo Yii::app()->createUrl(Yii::app()->controller->getId().'/'.Yii::app()->controller->getAction()->getId()); ?>"  />
                        </div>    
                        <?php
                        }else{
                            echo '<div id="grid-data"> No videos uploaded.</div>';
                        }
                        ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">	
	$(document).ready(function() {
		$('#date')
		.datepicker({
			startDate:'01/01/1900', 
			changeMonth: true, 
			changeYear: true, 
			yearRange: '-40:+10'
		});
    });
</script>
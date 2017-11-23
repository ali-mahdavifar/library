<?php
$this->title = 'Home';
?>
    <div class="site-index" style="background:url(<?= \yii\helpers\Url::to('@web/images/background.jpg') ?>);background-size:cover">
        <div class="jumbotron">
            <h1 style="color:#ff6666">Welcome To Our Website</h1>
        </div>
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    </div>

<?php
//
//use scotthuangzl\googlechart\GoogleChart;
//
//echo GoogleChart::widget(array('visualization' => 'OrgChart', 'packages'=>'orgchart' ,
//    'data' => array(
//        array('Name', 'Manager','ToolTip'),
//        array(array('v'=>'Mike','f'=>'Mike<div style="color:red; font-style:italic">President</div>'), '', 'The President'),
//        array(array('v'=>'Jim','f'=>'Jim<div style="color:red; font-style:italic">Vice President</div>'), 'Mike', 'VP'),
//        array('Alice', 'Mike', ''),
//        array('Bob', 'Jim', 'Bob Sponge'),
//        array('Carol', 'Bob', '')
//    ),
//    'options' => array('allowHtml' => true)));
//?>
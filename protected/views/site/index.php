<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<?php echo TbHtml::pageHeader('', Yii::t('strings','Welcome to '.CHtml::encode(Yii::app()->name)))?>

<?php $aboutContent = 
"
<h2>WSSMP</h2>
<div style='font-size:large;'>
<p>WSS MASTER PLAN  Database is a comprehensive system designed to collect,
store and report on water and satination assets inventory data for all of Tanzania's WSS networks.</p>
<p>It includes GIS component with the necessary tools to deal with data storage, map
publication and geodatabase management.
</p>
</div>
" ;

?>
<?php echo TbHtml::heroUnit(null,$aboutContent);?>

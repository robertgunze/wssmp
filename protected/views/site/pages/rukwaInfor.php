<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name . ' - Rukwa Region';
$this->breadcrumbs=array(
	'Rukwa Region',
);
?>
<?php echo TbHtml::pageHeader('', 'Rukwa Region'); ?>

<?php $aboutContent = 
"

<div style='font-size:small;'>
<p>information about capacity building, finance goes here</p>
</div>
" ;

?>
<?php echo TbHtml::heroUnit(null,$aboutContent);?>
  




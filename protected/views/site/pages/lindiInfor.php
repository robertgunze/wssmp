<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name . ' - Lindi Region';
$this->breadcrumbs=array(
	'Lindi Region',
);
?>
<?php echo TbHtml::pageHeader('', 'Lindi Region'); ?>

<?php $aboutContent = 
"

<div style='font-size:small;'>
<p>information about capacity building, finance goes here</p>
</div>
" ;

?>
<?php echo TbHtml::heroUnit(null,$aboutContent);?>
  




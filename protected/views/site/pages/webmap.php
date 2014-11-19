<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name . ' - Web Map';
$this->breadcrumbs=array(
	'Web Map',
);

?>
<?php echo TbHtml::pageHeader('', 'Web Map'); ?>

    <?php $this->widget('bootstrap.widgets.TbHeroUnit', array(
  
    'content' =>



	             '<table>'
	             .'<tr>'
	             .'<th>'
	
			
						   . TbHtml::linkbutton('01.Arusha ', array( 'url' => '#','color' =>TbHtml::BUTTON_COLOR_PRIMARY,)).'<br>'
						   . TbHtml::linkbutton('02.Dar es salaam  ', array( 'url' => '#','color' =>TbHtml::BUTTON_COLOR_WARNING, )).'<br>'
						   . TbHtml::linkbutton('03.Dodoma ', array( 'url' => '#','color' =>TbHtml::BUTTON_COLOR_PRIMARY, )).'<br>'
						   . TbHtml::linkbutton('04.Iringa ', array( 'url' => '#','color' =>TbHtml::BUTTON_COLOR_PRIMARY, )).'<br>'
						   . TbHtml::linkbutton('05.Kagera ', array( 'url' => '#','color' =>TbHtml::BUTTON_COLOR_PRIMARY, )).'<br>'
						   . TbHtml::linkbutton('06.Kigoma', array( 'url' => '#','color' =>TbHtml::BUTTON_COLOR_PRIMARY, )).'<br>'
						   . TbHtml::linkbutton('07.Kilimanjaro', array( 'url' => '#','color' =>TbHtml::BUTTON_COLOR_PRIMARY, )).
						   
				 '<th>'.
				
				 
				 '<th>'.
			
						     TbHtml::linkbutton('08.Lindi', array( 'url' => './uploads/lindimap.php','color' =>TbHtml::BUTTON_COLOR_SUCCESS, 'target'=>'_blank' )).'<br>'
						   . TbHtml::linkbutton('09.Manyara', array( 'url' => '#','color' =>TbHtml::BUTTON_COLOR_SUCCESS, )).'<br>'
						   . TbHtml::linkbutton('10.Mara', array( 'url' => '#','color' =>TbHtml::BUTTON_COLOR_SUCCESS, )).'<br>'
						   . TbHtml::linkbutton('11.Mbeya', array( 'url' => '#','color' =>TbHtml::BUTTON_COLOR_SUCCESS, )).'<br>'
						   . TbHtml::linkbutton('12.Morogoro', array( 'url' => '#','color' =>TbHtml::BUTTON_COLOR_SUCCESS, )).'<br>'
						   . TbHtml::linkbutton('13.Mtwara', array( 'url' => './uploads/mtwaramap.php','color' =>TbHtml::BUTTON_COLOR_SUCCESS, 'target'=>'_blank' )).'<br>'
						   . TbHtml::linkbutton('14.Mwanza', array( 'url' => '#','color' =>TbHtml::BUTTON_COLOR_SUCCESS, )).
						   
				 '<th>'.
				 
				 
				 '<th>'.

						     TbHtml::linkbutton('15.Pwani', array( 'url' => '#','color' =>TbHtml::BUTTON_COLOR_DANGER, )).'<br>'
						   . TbHtml::linkbutton('16.Rukwa', array( 'url' => './uploads/rukwamap.php','color' =>TbHtml::BUTTON_COLOR_DANGER, 'target'=>'_blank' )).'<br>'
						   . TbHtml::linkbutton('17.Ruvuma', array( 'url' => '#','color' =>TbHtml::BUTTON_COLOR_DANGER, )).'<br>'
						   . TbHtml::linkbutton('18.Shinyanga', array( 'url' => '#','color' =>TbHtml::BUTTON_COLOR_DANGER, )).'<br>'
						   . TbHtml::linkbutton('19.Singida', array( 'url' => '#','color' =>TbHtml::BUTTON_COLOR_DANGER, )).'<br>'
						   . TbHtml::linkbutton('20.Tabora', array( 'url' => '#','color' =>TbHtml::BUTTON_COLOR_DANGER, )).'<br>'
						   . TbHtml::linkbutton('21.Tanga', array( 'url' => '#','color' =>TbHtml::BUTTON_COLOR_DANGER, )).
						   
				 '<th>'.
				 
				 
				 
				 '</tr>'.
				 
 
				 '</table>',
    )); ?>
	
	


  




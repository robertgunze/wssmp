<?php /* @var $this Controller */ 
 Yii::app()->bootstrap->register();
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<!--<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />-->
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">

	<div id="header">
		<div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?></div>
	</div><!-- header -->

	<div id="mainmenu" >
            <?php  $this->widget('bootstrap.widgets.TbNavbar', array(
                    'brandLabel' => '<strong><span style="color:#47ADCB">WSS </span>MASTER PLAN</strong>',
                    'display' => TbHtml::NAVBAR_DISPLAY_FIXEDTOP,
                    'items'=>array(
                        array(
                            'class' => 'bootstrap.widgets.TbNav',
			'items'=>array(
                                array('label'=>'Map', 'url'=>array('/site/map'),'visible'=>true ),

                                array('label'=>'System Settings', 'url'=>array('#'),'visible'=>!Yii::app()->user->isGuest, 
                                    'items'=>array(
                                        
                                      )
                                    ),
                                array('label'=>'Users and Security', 'url'=>array('#'),'visible'=>!Yii::app()->user->isGuest),
                                array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),
				array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
			),
                       )
		    )
		)); ?>
	</div><!-- mainmenu --><br /><br /><br /><br />
	<?php if(isset($this->breadcrumbs)):?>
        
               <?php $this->widget('bootstrap.widgets.TbBreadcrumb', array(
                                'links' => $this->breadcrumbs,        
               )); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>
	<div id="footer" class="well">
            <?php if(!Yii::app()->user->isGuest): ?>
                Currently logged in as: Current date: <?php echo date('Y-m-d @ H:i:s')?>	
                <br />
            <?php endif;?>
		Copyright &copy; <?php echo date('Y'); ?> by FinogSolutions.
		All Rights Reserved.<br/>
               <?php //echo Yii::powered(); ?>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>

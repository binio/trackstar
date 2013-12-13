<?php /* @var $this Controller */ ?>
<?php Yii::app()->bootstrap->register(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
    <?php echo Yii::app()->bootstrap->registerCoreCss(); ?>
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>


    <?php $this->widget('bootstrap.widgets.TbHeroUnit', array(
        'htmlOptions'=>array('style'=>"background-image:url('http://www.australia.com/contentimages/about-australias-landscapes-coastal-australian-beaches.jpg')"),
        'heading' => CHtml::encode(Yii::app()->name),
        'content' => '<p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>',
    )); ?>

<!-- header -->


    <?php

    //$message = $this->getModule()->mrthello;

        $this->widget('bootstrap.widgets.TbNavbar', array(
        'brandLabel' => '',
        'display' => null, // default is static to top
        'items' => array(
            array(
                'class' => 'bootstrap.widgets.TbNav',
                'items'=>array(
                    array('label'=>Yii::t('app','model.topmenu.home'), 'url'=>array('/site/index')),
                    array('label'=>Yii::t('app','model.topmenu.about'), 'url'=>array('/site/page', 'view'=>'about')),
                    array('label'=>Yii::t('app','model.topmenu.contact'), 'url'=>array('/site/contact')),
                    array('label'=>Yii::t('app','model.topmenu.profil'), 'url'=>array('/site/profile'),'visible'=>!Yii::app()->user->isGuest ),
                    array('label'=>Yii::t('app','model.topmenu.login'), 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
                    array('label'=>Yii::t('app','model.topmenu.group'), 'url'=>array('/group/admin'),'visible'=>!Yii::app()->user->isGuest),
                    array('label'=>Yii::t('app','model.topmenu.intention'), 'url'=>array('/intention/admin'),'visible'=>!Yii::app()->user->isGuest ),
                    array('label'=>Yii::t('app','model.topmenu.logout').'('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest),
                    array(
                        'url' => Yii::app()->getModule('message')->inboxUrl,
                        'label' => 'Messages' .
                            (Yii::app()->getModule('message')->getCountUnreadedMessages(Yii::app()->user->getId()) ?
                                ' (' . Yii::app()->getModule('message')->getCountUnreadedMessages(Yii::app()->user->getId()) . ')' : ''),
                        'visible' => !Yii::app()->user->isGuest),
                ),
            ),
        ),
    )); ?>

	<!-- mainmenu -->
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('bootstrap.widgets.TbBreadcrumb', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
        <div id="container">
		Copyright &copy; <?php echo date('Y'); ?> by My Company.<br/>
		All Rights Reserved.<br/>
		<?php echo Yii::powered(); ?>
        </div>
	</div><!-- footer -->



</body>

<script type="text/javascript">

    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-46336966-1']);
    _gaq.push(['_trackPageview']);

    (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();

</script>
</html>

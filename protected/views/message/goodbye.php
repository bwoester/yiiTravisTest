<?php
$this->breadcrumbs=array(
	'Message'=>array('/message'),
	'HelloWorld',
);?>
<h1>Goodbye, Yii developer!</h1>
<p>
  <?php echo CHtml::link("Hello",array('message/helloWorld')); ?>
</p>
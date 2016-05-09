  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title><?=  isset($title)?$title:''?></title>
    <link href="<?=urlfull()?>vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?=urlfull()?>vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
    <link href="<?=urlfull()?>production/css/custom.css" rel="stylesheet" />
    <link href="<?=urlfull()?>vendors/fancybox/jquery.fancybox.css" rel="stylesheet" type="text/css"/>
    <script src="<?=urlfull()?>vendors/jquery/dist/jquery.min.js"></script>
    <script src="<?=urlfull()?>vendors/fancybox/jquery.fancybox.js" type="text/javascript"></script>
    <?php if(isset($this->data['css'])){foreach ($css as $item) {echo '<link href="'.urlfull().$item.'" rel="stylesheet" />';}} ?>
    <?php if(isset($this->data['js'])){foreach ($js as $item) {echo '<script src="'.urlfull().$item.'"></script>';}} ?>
  </head>
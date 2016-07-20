<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
   <p>展示模板文件视图</p> 
   <p><?php echo $this->_valueMap['name']; ?></p>
   <p><?php echo $this->_valueMap['age']; ?></p>
   <?php echo ++$age;?>
   <?php if ($age > 18) {?>
        <p>已成年</p>
    <?php } else if ($age < 10) {?>
        <p>小毛孩</p>
   <?php }?>

   <?php foreach ($this->_valueMap['friends'] as $k => $v) {?> 
    <p style="color: red"><?php echo $v?> </p>
   <?php }?>
</body>
</html>
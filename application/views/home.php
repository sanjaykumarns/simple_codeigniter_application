<title>Home</title>
<?php
$this->load->helper('html');
$image_properties = array(
          'src' => DOMAIN.'/images/ci.jpg',
          'width'=>'50%',
          'height'=>'50%',
          'style' =>'margin-left:20%;padding:2%'
);
echo img($image_properties);
echo br(3);
echo heading('Welcome!', 3);
$list = array(
            'red',
            'blue',
            'green',
            'yellow'
            );
$attributes = array('id'    => 'mylist', 'class' => 'aa');
echo ul($list, $attributes);
?>


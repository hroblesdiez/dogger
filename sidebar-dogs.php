<?php
/*
* The sidebar containing the dogs widget area 
* @package Dogger
*/
?>

<aside class="flex flex-col items-start justify-around space-y-6 lg:flex lg:flex-row lg:items-start lg:justify-start lg:space-x-20 lg:space-y-0" id="primary" role="complementary">

    <?php dynamic_sidebar('dogs'); ?>

</aside>
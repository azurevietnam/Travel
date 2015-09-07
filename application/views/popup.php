<?php
/**
 * Created by PhpStorm.
 * User: HaiLong
 * Date: 5/26/2015
 * Time: 9:54 PM
 */?>
<div class="photo-gallery style1" id="photo-gallery1" data-animation="slide" data-sync="#image-carousel1">
    <ul class="slides">
        <?php foreach ($imgData as $store) { echo '
            <li ><img src = "'.base_url().$store->IMG_URL.'" alt = "'.$store->IMG_ALT.'" /></li >';
        }?>
    </ul>
</div>
<div class="image-carousel style1" id="image-carousel1" data-animation="slide" data-item-width="70" data-item-margin="10" data-sync="#photo-gallery1">
    <ul class="slides">
        <?php foreach ($imgData as $store) { echo '
            <li ><img src = "'.base_url().$store->IMG_URL.'" alt = "'.$store->IMG_ALT.'" /></li >';
        }?>
    </ul>
</div>
<?php
function urlfull($url='Lib/'){
    return base_url().$url;
}
function ImageError($url){ return is_file(trim($url,'/'))?$url:'/Images/image.gif';}

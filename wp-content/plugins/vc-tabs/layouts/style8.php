<?php
if (!defined('ABSPATH'))
    exit;
responsive_tabs_with_accordions_user_capabilities();
$styledata = Array('id' => 8, 'style_name' => 'style8', 'css' => 'heading-font-size |20| heading-font-color |#757575| heading-background-color |#ffffff| heading-font-active-color |#a700d1| heading-background-active-color |#ffffff| heading-font-familly |Open+Sans| heading-font-weight |300| heading-width |180| heading-text-align |flex-start| heading-padding |15| content-font-size |16| content-font-color |#999999| content-background-color |#ffffff| content-padding-top |30| content-padding-right |30| content-padding-bottom |30| content-padding-left |30| content-line-height |1.5| content-font-familly |Open+Sans| content-font-weight |300| content-font-align |left| content-border-color |#d6d6d6| custom-css || ||||||||');
$listdata = Array(
    0 => Array('id' => 1, 'styleid' => 6, 'title' => 'Default Title', 'files' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec ex nec arcu consequat faucibus. Donec quis risus nec lacus dictum tincidunt. Nulla facilisis, sem id fermentum aliquet, mauris sem rutrum magna, venenatis consequat quam justo sed lacus. Nullam vitae laoreet metus. Pellentesque non ultrices nibh.</p><p>Quisque a faucibus nibh, id accumsan nulla. Donec hendrerit sed turpis at elementum. Fusce feugiat diam leo, ac volutpat nisl porta eget. Cras a arcu dapibus, placerat ipsum quis, blandit eros. Nunc pharetra nunc ut nulla sagittis, et fringilla enim fringilla. Duis et pharetra justo, a facilisis lectus. Fusce et neque non leo convallis dignissim. Donec ut dignissim nisl. Aenean vitae consectetur metus. Duis ut interdum ante.</p>', 'css' => 'fas fa-address-book'),
    1 => Array('id' => 2, 'styleid' => 6, 'title' => 'Default Title', 'files' => '<p>Sed vel consectetur orci. Ut a rhoncus metus. Aliquam vel nisl commodo ante interdum rhoncus in sit amet est. Cras mollis, eros non venenatis faucibus, risus massa cursus elit, sed feugiat arcu quam ut neque. Sed sed aliquam urna, nec dapibus est. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Integer dignissim vel mi ut fringilla. Suspendisse potenti.</p> <p>Ut tristique tristique laoreet. Sed porttitor orci sed dictum semper.Sed sit amet commodo arcu, nec molestie nunc. In hac habitasse platea dictumst. Phasellus accumsan ante id dolor tristique scelerisque. Maecenas eu porttitor velit. </p>', 'css' => 'fab fa-algolia'),
    2 => Array('id' => 3, 'styleid' => 6, 'title' => 'Default Title', 'files' => '<p>Sed sit amet commodo arcu, nec molestie nunc. In hac habitasse platea dictumst. Phasellus accumsan ante id dolor tristique scelerisque. Maecenas eu porttitor velit. Nulla sed nibh posuere nunc facilisis egestas ac eget dolor. Donec a urna non enim mattis dapibus. Vestibulum placerat arcu ac ante dapibus accumsan. Nulla facilisi.</p>    <p>&nbsp;</p>  <p>Mauris urna metus, dapibus non velit eu, facilisis pretium arcu. Ut porttitor, urna vitae volutpat efficitur, tortor libero pretium elit, eget ornare mi nulla at velit. Sed quam odio, consectetur a iaculis non, suscipit vel augue. </p>', 'css' => 'fab fa-adn'),
    3 => Array('id' => 4, 'styleid' => 6, 'title' => 'Default Title', 'files' => '<p>Mauris urna metus, dapibus non velit eu, facilisis pretium arcu. Ut porttitor, urna vitae volutpat efficitur, tortor libero pretium elit, eget ornare mi nulla at velit. Sed quam odio, consectetur a iaculis non, suscipit vel augue. Donec semper ornare aliquam. Quisque quis nunc non massa congue bibendum. Praesent sollicitudin sem sit amet convallis auctor.</p> <p>Sed sit amet commodo arcu, nec molestie nunc. In hac habitasse platea dictumst. Phasellus accumsan ante id dolor tristique scelerisque. Maecenas eu porttitor velit. Nulla sed nibh posuere nunc facilisis egestas ac eget dolor. Donec a urna non enim mattis dapibus. Vestibulum placerat arcu ac ante dapibus accumsan. Nulla facilisi.</p>', 'css' => 'fas fa-ambulance'),
);
echo '<input type="hidden" name="oxi-tabs-data-' . $styledata['id'] . '" id="oxi-tabs-data-' . $styledata['id'] . '" value="' . $styledata['css'] . '">';
echo ctu_admin_style_layouts($styledata, $listdata);
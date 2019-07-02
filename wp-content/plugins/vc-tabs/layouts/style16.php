<?php

if (!defined('ABSPATH'))
    exit;
responsive_tabs_with_accordions_user_capabilities();

$styledata = Array('id' => 16, 'style_name' => 'style16', 'css' => 'heading-font-size |20| heading-font-color |#ffffff| heading-background-color |#4a4a4a| heading-font-active-color |#ffffff| heading-background-active-color |#2da690| heading-position |left| heading-font-familly |Open+Sans| heading-font-weight |500| heading-padding |20| heading-margin |20| heading-icon-size |24| heading-icon-padding-bottom |5| heading-border-radius |5| heading-box-shadow-Blur |10| heading-box-shadow-color |rgba(214, 214, 214, 1)| content-font-size |16| content-font-color |#474747| content-background-color |#ffffff| content-width |80| content-padding-top |30| content-padding-right |30| content-padding-bottom |30| content-padding-left |30| content-line-height |1.5| content-font-familly |Open+Sans| content-font-weight |300| content-font-align |left| content-border-radius |5|content-box-shadow-Blur |10| content-box-shadow-color |rgba(240, 240, 240, 1)| heading-font-style |normal| content-box-shadow-Horizontal |0| content-box-shadow-Vertical |0| content-box-shadow-Spread |0| heading-box-shadow-Horizontal |0| heading-box-shadow-Vertical |0| heading-box-shadow-Spread |0| custom-css ||||||||||');
$listdata = Array(
    0 => Array('id' => 1, 'styleid' => 16, 'title' => 'Default Title', 'files' => ' <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce elementum mauris eu malesuada fringilla. Vivamus ultricies, nunc eu tincidunt fringilla, lectus ligula tristique elit, ac egestas lorem quam at velit. In luctus tempus faucibus. Fusce sem nisi, dignissim ut elementum at, eleifend at augue. In ligula erat, vestibulum sit amet pellentesque et, vulputate at erat. Suspendisse leo lectus, lobortis sit amet eros et, efficitur dictum leo. Aenean sem dolor, tincidunt vel velit eu, imperdiet ultrices mauris. Suspendisse et ante blandit, tincidunt magna non, posuere ante. Sed semper lectus non imperdiet lobortis. Quisque aliquam ultricies nisi, nec consequat dolor auctor vitae. Donec laoreet egestas magna, at dictum dolor porttitor eget. In aliquet sit amet turpis ut sagittis.</p> <p>&nbsp;</p> <p>Mauris a lectus fringilla, laoreet ligula a, scelerisque dolor. Curabitur interdum mauris at felis pellentesque, ac commodo massa varius. Quisque suscipit varius nulla a feugiat. Aenean vel lacus congue, eleifend sem egestas, efficitur ipsum. Ut non tellus tellus. Nullam sodales, metus sit amet varius ultricies, eros mi consequat nisi, ut bibendum tortor lectus eu odio. Proin sit amet felis rhoncus, blandit massa in, placerat massa. Nunc malesuada egestas odio, a scelerisque diam gravida ut.</p>', 'css' => VcTabsAdminFontAwesomeData('book')),
    1 => Array('id' => 2, 'styleid' => 16, 'title' => 'Default Title', 'files' => ' <p>Mauris a lectus fringilla, laoreet ligula a, scelerisque dolor. Curabitur interdum mauris at felis pellentesque, ac commodo massa varius. Quisque suscipit varius nulla a feugiat. Aenean vel lacus congue, eleifend sem egestas, efficitur ipsum. Ut non tellus tellus. Nullam sodales, metus sit amet varius ultricies, eros mi consequat nisi, ut bibendum tortor lectus eu odio. Proin sit amet felis rhoncus, blandit massa in, placerat massa. Nunc malesuada egestas odio, a scelerisque diam gravida ut.</p> <p>&nbsp;</p> <p>Maecenas placerat malesuada turpis sit amet molestie. Pellentesque hendrerit, arcu vitae scelerisque viverra, sem mauris rutrum quam, vitae laoreet arcu turpis eget dolor. Ut pulvinar orci urna, sit amet lacinia ligula viverra sit amet. Nunc vulputate nec elit non vehicula. Fusce iaculis velit eu felis pharetra rutrum. Cras a odio rutrum, pellentesque purus non, malesuada orci. Maecenas elit elit, fermentum et lacinia et, scelerisque quis magna. Morbi eget consequat nisl, eu hendrerit enim. Nulla cursus felis vitae eros pellentesque, eget finibus massa tincidunt. Morbi non feugiat mauris, ac molestie metus. Curabitur purus mi, feugiat ut arcu a, facilisis viverra est.</p>', 'css' => VcTabsAdminFontAwesomeData('github')),
    2 => Array('id' => 3, 'styleid' => 16, 'title' => 'Default Title', 'files' => '<p>Maecenas placerat malesuada turpis sit amet molestie. Pellentesque hendrerit, arcu vitae scelerisque viverra, sem mauris rutrum quam, vitae laoreet arcu turpis eget dolor. Ut pulvinar orci urna, sit amet lacinia ligula viverra sit amet. Nunc vulputate nec elit non vehicula. Fusce iaculis velit eu felis pharetra rutrum. Cras a odio rutrum, pellentesque purus non, malesuada orci. Maecenas elit elit, fermentum et lacinia et, scelerisque quis magna. Morbi eget consequat nisl, eu hendrerit enim. Nulla cursus felis vitae eros pellentesque, eget finibus massa tincidunt. Morbi non feugiat mauris, ac molestie metus. Curabitur purus mi, feugiat ut arcu a, facilisis viverra est.</p><p>&nbsp;</p><p>Duis molestie, odio vitae molestie rutrum, massa sapien vestibulum urna, in finibus magna nulla ut magna. Integer aliquam ante ac eros ultrices viverra. Phasellus tempus est et mauris condimentum rhoncus egestas vel neque. Proin sed mollis est, eu ullamcorper neque. Quisque eu lobortis ex, convallis iaculis turpis. Donec id aliquam velit, a aliquam quam. Sed pellentesque felis sit amet arcu malesuada, scelerisque consectetur neque ultricies. Sed ultrices porttitor pretium. Donec ornare, est et maximus porta, nisl odio imperdiet velit, in laoreet diam risus eu odio. Suspendisse euismod orci eget quam fermentum, vulputate aliquet turpis lacinia. Fusce in molestie dui. Quisque ante erat, volutpat sed facilisis ac, condimentum nec eros. Pellentesque ac dignissim mauris. Maecenas consequat a nunc pellentesque congue. Cras ipsum felis, rhoncus a finibus vestibulum, pretium vel neque.</p>', 'css' => VcTabsAdminFontAwesomeData('adn')),
    3 => Array('id' => 4, 'styleid' => 16, 'title' => 'Default Title', 'files' => '<p>Duis molestie, odio vitae molestie rutrum, massa sapien vestibulum urna, in finibus magna nulla ut magna. Integer aliquam ante ac eros ultrices viverra. Phasellus tempus est et mauris condimentum rhoncus egestas vel neque. Proin sed mollis est, eu ullamcorper neque. Quisque eu lobortis ex, convallis iaculis turpis. Donec id aliquam velit, a aliquam quam. Sed pellentesque felis sit amet arcu malesuada, scelerisque consectetur neque ultricies. Sed ultrices porttitor pretium. Donec ornare, est et maximus porta, nisl odio imperdiet velit, in laoreet diam risus eu odio. Suspendisse euismod orci eget quam fermentum, vulputate aliquet turpis lacinia. Fusce in molestie dui. Quisque ante erat, volutpat sed facilisis ac, condimentum nec eros. Pellentesque ac dignissim mauris. Maecenas consequat a nunc pellentesque congue. Cras ipsum felis, rhoncus a finibus vestibulum, pretium vel neque.</p> <p>&nbsp;</p> <p>Morbi id leo risus. Duis ultricies neque a ante viverra sagittis. Ut sit amet commodo velit, viverra luctus dui. Etiam porta fermentum urna, in dictum nunc dictum id. Curabitur cursus vulputate leo, eu tincidunt elit dignissim sed. Vestibulum non erat ornare, mattis mauris et, tempor augue. Integer diam urna, blandit quis diam in, consequat ullamcorper elit. Fusce sed purus tincidunt, rutrum lorem sit amet, fringilla eros. Maecenas in purus at nulla luctus lacinia id et diam. Nunc rutrum metus eget ullamcorper condimentum. Nullam tempus massa vitae metus ornare, vitae posuere dolor malesuada. Morbi id volutpat erat, in congue mi. Sed placerat ullamcorper turpis at auctor. Phasellus eu gravida velit, vel auctor purus. Sed sollicitudin ante id augue malesuada, nec faucibus mi feugiat. Ut ante sapien, vestibulum et blandit in, suscipit sagittis nisl.</p>', 'css' => VcTabsAdminFontAwesomeData('ambulance'))
);
echo '<input type="hidden" name="oxi-tabs-data-' . $styledata['id'] . '" id="oxi-tabs-data-' . $styledata['id'] . '" value="' . $styledata['css'] . '">';
echo ctu_admin_style_layouts($styledata, $listdata);

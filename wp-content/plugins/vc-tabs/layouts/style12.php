<?php

if (!defined('ABSPATH'))
    exit;
responsive_tabs_with_accordions_user_capabilities();


$styledata = Array('id' => 12, 'style_name' => 'style12', 'css' => 'heading-font-size |20| heading-font-color |#ffffff| heading-background-color |rgba(0, 158, 147, 1)| heading-font-active-color |#ffffff| heading-background-active-color |rgba(28, 151, 217, 1)| heading-font-familly |Open+Sans| heading-font-weight |500| heading-width |240| heading-padding |15| heading-margin-bottom |5| heading-box-shadow-Blur |5| heading-box-shadow-color |rgba(240, 240, 240, 1)| content-font-size |16| content-font-color |#828282| content-background-color |rgba(255, 255, 255, 1)| content-padding-top |30| content-padding-right |30| content-padding-bottom |30| content-padding-left |30| content-width |75| content-line-height |1.5| content-font-familly |Open+Sans| content-font-weight |300| content-font-align |left| content-border |1| content-border-color |#dedede|content-box-shadow-Blur |10| content-box-shadow-color |rgba(224, 224, 224, 1)| content-radius |5| heading-font-style |normal| content-box-shadow-Horizontal |0| content-box-shadow-Vertical |0| content-box-shadow-Spread |0| heading-box-shadow-Horizontal |0| heading-box-shadow-Vertical |0| heading-box-shadow-Spread |0| custom-css || ||||||||||||||||');
$listdata = Array(
    0 => Array('id' => 1, 'styleid' => 12, 'title' => 'Default Title', 'files' => '<p>Nulla sit amet imperdiet turpis. Nunc id erat quis lectus feugiat hendrerit sed quis est. Proin molestie ligula quis sapien pulvinar tempor. Curabitur rhoncus, ante sit amet porttitor tristique, ipsum libero vulputate dui, ac scelerisque turpis velit vitae magna. Maecenas ullamcorper nisl nibh, porta placerat magna ornare ut. Nam non mauris congue, ornare erat eget, lacinia sem.</p> <p>&nbsp;</p> <p>Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vestibulum justo lorem, venenatis ac porttitor quis, venenatis sit amet velit. Nunc pharetra gravida turpis non aliquet. Aenean quis arcu nec dui imperdiet fringilla. Pellentesque elementum diam eget ex condimentum efficitur.</p>', 'css' => 'fas fa-address-book'),
    1 => Array('id' => 2, 'styleid' => 12, 'title' => 'Default Title', 'files' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam ac pretium enim, ac elementum erat. Nulla facilisi. Sed vitae lobortis erat. Cras nec sapien mattis, molestie purus vel, pulvinar metus. Nunc augue ante, placerat at finibus ac, gravida id massa. Nullam sit amet mollis nunc.&nbsp;</p> <p>&nbsp;</p> <p>In egestas purus quis ligula volutpat semper. Integer neque tellus, mollis rutrum auctor eget, semper vel diam. Sed laoreet rutrum dictum. Maecenas fermentum lobortis nulla. Etiam blandit est et nisi facilisis semper.</p>', 'css' => 'fab fa-algolia'),
    2 => Array('id' => 3, 'styleid' => 12, 'title' => 'Default Title', 'files' => '<p>Donec aliquet sapien a enim efficitur, id bibendum magna tincidunt. Mauris lobortis nisi vel ligula hendrerit ultricies. Fusce non finibus arcu. Ut quis euismod nisi. Donec dignissim dictum nulla, non rhoncus justo consectetur et. Integer ut orci condimentum, dignissim tortor at, hendrerit arcu. Cras facilisis magna eu arcu vehicula bibendum. Sed vestibulum quam id posuere ultrices. Sed condimentum magna tellus, at iaculis enim sollicitudin et.</p> <p>&nbsp;</p><p>Sed urna magna, viverra eu dui vel, iaculis congue mauris. Ut eget fermentum ante. Donec vel vehicula dolor. Integer laoreet nisl mi, et vehicula mauris porta ut. Cras venenatis, sapien in finibus scelerisque, nibh felis porttitor odio, ac porta ex urna iaculis massa. Curabitur scelerisque justo enim. Donec venenatis orci ut convallis interdum.</p>', 'css' => 'fab fa-adn'),
    3 => Array('id' => 4, 'styleid' => 12, 'title' => 'Default Title', 'files' => '<p>Mauris pharetra lectus id lacinia porttitor. Etiam vel dui at felis elementum convallis in sit amet arcu. Maecenas ultricies arcu vel turpis rhoncus, in maximus nibh tempor. Mauris id mauris ligula. Cras nec metus at massa dictum cursus nec in leo. In vel justo sed urna dictum semper sagittis vel diam. Duis ut velit molestie, tempor ex at, condimentum risus. Sed dignissim velit sit amet augue viverra, ut fringilla enim rutrum.</p> <p>&nbsp;</p><p>Curabitur vel lobortis nisl. Sed scelerisque purus quis massa pharetra dignissim. Morbi molestie est neque, et tincidunt velit volutpat vitae. Proin luctus aliquet placerat. Nam consequat a nulla id condimentum. Ut turpis quam, pellentesque eget feugiat posuere, malesuada vitae erat. Donec facilisis leo vehicula elit semper, nec pulvinar mi rhoncus.&nbsp;</p>', 'css' => 'fas fa-ambulance')
);
echo '<input type="hidden" name="oxi-tabs-data-' . $styledata['id'] . '" id="oxi-tabs-data-' . $styledata['id'] . '" value="' . $styledata['css'] . '">';
echo ctu_admin_style_layouts($styledata, $listdata);

<?php

return array(
    'enabled' => array(
        'title' => _wp('Enable'),
        'value' => '1',
        'control_type' => waHtmlControl::CHECKBOX,
        'description' => _wp('Set this checkbox for enable the plugin'),
    ),
    'template' => array(
        'title' => _wp('Hooks template'),
        'value' => '<span style="color:red;">%hookname%</span>',
        'description' => _wp('Use %hookname% for insert hook name.'),
        'control_type' => waHtmlControl::TEXTAREA
    ),
);
<?php

$features = [
    'partial_function_application' => 'Partial Function Application',
    'new_time_duration_class' => 'New \Time\Duration Class',
    'poling_api' => 'Poling API',
    'new_clamp_function' => 'New clamp() Function',
    'new_sort_direction_enum' => 'New SortDirection Enum',
    'readonly_property_defaults' => 'Readonly Property Defaults',
    'stream_error_handling' => 'Stream Error Handling',
    'doc_comments_for_function_parameters' => 'DocComments for Function Parameters',
    'new_reflection_methods' => 'New ReflectionProperty::isReadable() and ReflectionProperty::isWritable() Methods',
];

$links = [];
foreach ($features as $featureKey => $featureName) {
    $links[] = sprintf(
        "<li style='margin-bottom: 10px;'><a href='?v=8.6&feature=%s'>%s</a></li>",
        $featureKey,
        $featureName
    );
}

echo '<pre>';
echo '<h1>PHP 8.6</h1>';
echo sprintf("<ul>%s</ul>", implode('', $links));
<?php

require __DIR__ . '/vendor/autoload.php';

$finder = PhpCsFixer\Finder::create()
    ->in(__DIR__ . '/src')
    ->in(__DIR__ . '/tests')
;
$finder->append([
    __DIR__ . '/.php_cs',
    __DIR__ . '/.phpstorm.meta.php',
]);

$rules = [
    '@PSR2' => true,
    '@Symfony' => true,
    '@DoctrineAnnotation' => true,
    'concat_space' => [
        'spacing' => 'one',
    ],
    'array_indentation' => true,
    'compact_nullable_typehint' => true,
    'explicit_indirect_variable' => true,
    'explicit_string_variable' => true,
    'heredoc_to_nowdoc' => true,
    'linebreak_after_opening_tag' => true,
    'list_syntax' => ['syntax' => 'short'],
    'array_syntax' => ['syntax' => 'short'],
    'no_binary_string' => true,
    'no_useless_return' => true,
    'no_useless_else' => true,
    'cast_spaces' => false,
    'phpdoc_align' => true,
    'phpdoc_var_without_name' => true,
    'combine_consecutive_unsets' => true,
    'phpdoc_summary' => false,
    'yoda_style' => false,
    'general_phpdoc_annotation_remove' => [
        'annotations' => ['author'],
    ],
    'align_multiline_comment' => true,
    'combine_consecutive_issets' => true,
    'fully_qualified_strict_types' => true,
    'phpdoc_trim_consecutive_blank_line_separation' => true,
    'dir_constant' => true,
    'ereg_to_preg' => true,
    'fopen_flag_order' => true,
    'fopen_flags' => true,
    'function_to_constant' => true,
    'implode_call' => true,
    'is_null' => true,
    'logical_operators' => true,
    'modernize_types_casting' => true,
    'no_alias_functions' => true,
];

return PhpCsFixer\Config::create()
    ->setRules($rules)
    ->setUsingCache(true)
    ->setCacheFile(__DIR__ . '/.php_cs.cache')
    ->setFinder($finder);

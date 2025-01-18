<?php

$finder = (new PhpCsFixer\Finder())
    ->files()
    ->exclude('node_modules')
    ->exclude('vendor')
    ->exclude('tests')
    ->exclude('build')
    ->ignoreDotFiles(true)
    ->ignoreVCS(true)
    ->in(__DIR__);

$config = (new PhpCsFixer\Config())
    ->setRules([
        '@Symfony' => true,
        'array_syntax' => ['syntax' => 'short'],
        'yoda_style' => false,
        'echo_tag_syntax' => ['format' => 'long'],
        'no_alternative_syntax' => true,
        'ordered_imports' => true,
        'no_alternative_syntax' => true,
        'ordered_class_elements' => true,
        'phpdoc_order' => true,
        //'no_superfluous_phpdoc_tags' => [
        //    'allow_mixed' => true,
        //    'allow_unused_params' => true,
        //],
        //'phpdoc_add_missing_param_annotation' => [
        //    'only_untyped' => false,
        //],
    ])
    ->setFinder($finder);

return $config;

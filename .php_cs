<?php

use PhpCsFixer\Config;
use PhpCsFixer\Finder;

$finder = Finder::create()->in(['src', 'tests']);

return Config::create()
    ->setRules([
        '@Symfony' => true,
        'array_syntax' => [
            'syntax' => 'short',
        ],
        'blank_line_before_statement' => true,
        'linebreak_after_opening_tag' => true,
        'ordered_class_elements' => [
            'sortAlgorithm' => 'alpha',
        ],
        'ordered_imports' => true,
        'yoda_style' => false,
        'concat_space' => [
            'spacing' => 'one',
        ],
        'no_superfluous_phpdoc_tags' => false,
    ])
    ->setFinder($finder);
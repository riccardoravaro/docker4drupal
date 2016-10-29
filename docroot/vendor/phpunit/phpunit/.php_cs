<?php
$finder = Symfony\CS\Finder\DefaultFinder::create()
    ->files()
    ->in('build')
    ->in('src')
    ->in('tests')
    ->name('*.php')
    ->name('*.phpt');

return Symfony\CS\Config\Config::create()
    ->level(\Symfony\CS\FixerInterface::NONE_LEVEL)
    ->fixers(
        array(
<<<<<<< HEAD
            'duplicate_semicolon',
            'empty_return',
            'extra_empty_lines',
            'join_function',
            'list_commas',
            'no_blank_lines_after_class_opening',
            'no_empty_lines_after_phpdocs',
=======
            'align_double_arrow',
            'align_equals',
            'braces',
            'concat_with_spaces',
            'duplicate_semicolon',
            'elseif',
            'empty_return',
            'encoding',
            'eof_ending',
            'extra_empty_lines',
            'function_call_space',
            'function_declaration',
            'indentation',
            'join_function',
            'line_after_namespace',
            'linefeed',
            'list_commas',
            'long_array_syntax',
            'lowercase_constants',
            'lowercase_keywords',
            'method_argument_space',
            'multiple_use',
            'namespace_no_leading_whitespace',
            'no_blank_lines_after_class_opening',
            'no_empty_lines_after_phpdocs',
            'parenthesis',
            'php_closing_tag',
>>>>>>> ea75da0d6d82e55b23a2a2f5ed629e3b52ee75d9
            'phpdoc_indent',
            'phpdoc_no_access',
            'phpdoc_no_empty_return',
            'phpdoc_no_package',
            'phpdoc_params',
            'phpdoc_scalar',
<<<<<<< HEAD
            'phpdoc_to_comment',
            'phpdoc_trim',
            'return',
            'self_accessor',
=======
            'phpdoc_separation',
            'phpdoc_to_comment',
            'phpdoc_trim',
            'phpdoc_types',
            'phpdoc_var_without_name',
            'remove_lines_between_uses',
            'return',
            'self_accessor',
            'short_tag',
            'single_line_after_imports',
>>>>>>> ea75da0d6d82e55b23a2a2f5ed629e3b52ee75d9
            'single_quote',
            'spaces_before_semicolon',
            'spaces_cast',
            'ternary_spaces',
<<<<<<< HEAD
            'trim_array_spaces',
            'unused_use',
            'whitespacy_lines',
            'align_double_arrow',
            'align_equals',
            'concat_with_spaces'
=======
            'trailing_spaces',
            'trim_array_spaces',
            'unused_use',
            'visibility',
            'whitespacy_lines'
>>>>>>> ea75da0d6d82e55b23a2a2f5ed629e3b52ee75d9
        )
    )
    ->finder($finder);


<?php

$finder = PhpCsFixer\Finder::create()
    ->in(__DIR__)
    ->exclude(['vendor', 'storage', 'bootstrap'])
    ->name('*.php');

return (new PhpCsFixer\Config())
    ->setRiskyAllowed(true) // Enable risky rules
    ->setRules([
        // Predefined rule sets
        '@PSR12' => true,
        '@PSR12:risky' => true,
        '@PHP80Migration' => true,
        '@PHP80Migration:risky' => true,
        '@PHPUnit84Migration:risky' => true,

        // Import and order rules
        'no_unused_imports' => true,
        'ordered_imports' => [
            'imports_order' => ['class', 'function', 'const'],
        ],

        // PHPDoc rules
        'no_superfluous_phpdoc_tags' => ['remove_inheritdoc' => true],
        'phpdoc_types_order' => [
            'null_adjustment' => 'always_last',
        ],

        // Strictness rules
        'strict_comparison' => true,
        'strict_param' => true,

        // Whitespace and formatting
        'multiline_whitespace_before_semicolons' => [
            'strategy' => 'no_multi_line',
        ],

        // Clean up unnecessary structures
        'no_superfluous_elseif' => true,
        'no_useless_else' => true,
        'no_useless_return' => true,

        // PHPUnit rules
        'php_unit_internal_class' => true,
        'php_unit_construct' => true,
        'php_unit_fqcn_annotation' => true,
        'php_unit_set_up_tear_down_visibility' => true,
        'php_unit_test_case_static_method_calls' => [
            'call_type' => 'self',
        ],

        // Final and static usage rules
        'final_class' => true,
        'final_public_method_for_abstract_class' => true,
        'self_static_accessor' => true,
        'static_lambda' => true,

        // Global namespace imports
        'global_namespace_import' => true,

        'phpdoc_align' => true, // Align PHPDoc annotations
        'phpdoc_no_empty_return' => true, // Removes `@return void` if no return
        'phpdoc_summary' => true, // Ensure PHPDoc summaries end with a period
        'phpdoc_trim' => true, // Trims blank lines in PHPDoc
        'phpdoc_trim_consecutive_blank_line_separation' => true, // Remove consecutive blank lines in PHPDoc
        'phpdoc_order' => true, // Ensure annotations are ordered properly
        'phpdoc_no_useless_inheritdoc' => true, // Remove useless `@inheritdoc`

        'array_indentation' => true, // Ensure arrays are indented
        'trailing_comma_in_multiline' => ['elements' => ['arrays']], // Adds trailing commas in multiline arrays
        'normalize_index_brace' => true, // Use consistent square bracket indexing

        'single_import_per_statement' => true, // Enforce one `use` statement per line
        'no_leading_import_slash' => true, // Removes leading slashes in `use` statements
        'declare_equal_normalize' => ['space' => 'none'], // Normalize spacing around `=` in `declare` statements

        'indentation_type' => true, // Use consistent indentation (e.g., spaces)
        'method_chaining_indentation' => true, // Enforce indentation for method chaining
        'no_extra_blank_lines' => ['tokens' => ['extra']], // Removes extra blank lines
        'blank_line_before_statement' => [
            'statements' => ['return', 'throw', 'try'],
        ], // Adds a blank line before specified statements

        'no_trailing_comma_in_singleline' => true, // Disallow trailing commas in single-line arrays
        'yoda_style' => false, // Disable Yoda conditions (e.g., `$value === true`)
        'control_structure_continuation_position' => ['position' => 'same_line'], // Enforce control structure braces position

        'combine_consecutive_unsets' => true, // Combines multiple `unset` calls into one
        'no_empty_statement' => true, // Removes empty statements
        'simplified_null_return' => true, // Simplifies `return null;` to `return;`

        'single_quote' => true, // Use single quotes for strings where possible
        'string_implicit_backslashes' => ['double_quoted' => 'escape'], // Escape backslashes in double-quoted strings
        'visibility_required' => ['elements' => ['const', 'method', 'property']], // Require visibility for constants, methods, and properties

        'no_unneeded_final_method' => true, // Remove final from methods in final classes
        'combine_consecutive_issets' => true, // Combines multiple `isset` calls
        'single_space_around_construct' => true, // Ensures a single space after language constructs like `if`, `else`, etc.
    ])
    ->setFinder($finder);

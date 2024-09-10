<?php

declare(strict_types=1);

namespace fn;

use FeatureNinja\Cva\ClassVarianceAuthority;

/**
 * @param string|array<int, string> $base
 * @param array{
 *     variants?: array<string, array<string, string|array<int, string>>>,
 *     compoundVariants?: array<int, array<string, string>>,
 *     defaultVariants?: array<string, string>
 * } $config
 */
function cva(string|array $base, array $config): ClassVarianceAuthority
{
    return ClassVarianceAuthority::new($base, $config);
}

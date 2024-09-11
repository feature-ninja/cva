<?php

declare(strict_types=1);

namespace FeatureNinja\Cva;

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

use function fn\cva;

final class ClassVarianceAuthorityTest extends TestCase
{
    #[Test]
    public function examples(): void
    {
        $button = cva(
            ['font-semibold', 'border', 'rounded'],
            [
                'variants' => [
                    'intent' => [
                        'primary' => ['bg-blue-500', 'text-white', 'border-transparent', 'hover:bg-blue-600'],
                        'secondary' => ['bg-white', 'text-gray-800', 'border-gray-400', 'hover:bg-gray-100'],
                    ],
                    'size' => [
                        'small' => ['text-sm', 'py-1', 'px-2'],
                        'medium' => ['text-base', 'py-2', 'px-4'],
                    ],
                ],
                'compoundVariants' => [
                    [
                        'intent' => 'primary',
                        'size' => 'medium',
                        'class' => 'uppercase',
                    ],
                ],
                'defaultVariants' => [
                    'intent' => 'primary',
                    'size' => 'medium',
                ],
            ],
        );

        $this->assertSame(
            'font-semibold border rounded bg-blue-500 text-white border-transparent hover:bg-blue-600 text-base py-2 px-4 uppercase',
            $button(),
        );

        $this->assertSame(
            'font-semibold border rounded bg-white text-gray-800 border-gray-400 hover:bg-gray-100 text-sm py-1 px-2',
            $button(['intent' => 'secondary', 'size' => 'small']),
        );
    }
}

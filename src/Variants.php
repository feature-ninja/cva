<?php

declare(strict_types=1);

namespace FeatureNinja\Cva;

final readonly class Variants
{
    /**
     * @param array<string, array<string, string|array<int, string>>> $config
     */
    private function __construct(
        private array $config,
    )
    {
    }

    /**
     * @param array<string, array<string, string|array<int, string>>> $config
     */
    public static function of(array $config): self
    {
        return new self($config);
    }

    /**
     * @param array<string, string> $props
     */
    public function resolve(array $props): ClassNames
    {
        $classNames = ClassNames::empty();
        foreach ($props as $key => $value) {
            $classNames = $classNames->concat(ClassNames::of($this->config[$key][$value] ?? ''));
        }

        return $classNames;
    }
}

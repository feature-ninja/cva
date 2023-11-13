<?php

declare(strict_types=1);

namespace FeatureNinja\Cva;

final readonly class DefaultVariants
{
    /**
     * @param array<string, string> $config
     */
    private function __construct(
        private array $config,
    )
    {
    }

    /**
     * @param array<string, string> $config
     */
    public static function of(array $config): self
    {
        return new self($config);
    }

    /**
     * @param array<string, string> $props
     * @return array<string, string>
     */
    public function merge(array $props): array
    {
        foreach ($this->config as $key => $value) {
            $props[$key] ??= $value;
        }

        return $props;
    }
}

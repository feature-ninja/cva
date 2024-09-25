<?php

declare(strict_types=1);

namespace FeatureNinja\Cva;

final readonly class ClassVarianceAuthority
{
    public function __construct(
        public ClassNames $base,
        public Config $config,
    ) {
    }

    /**
     * @param string|array<int, string> $base
     * @param array{
     *     variants?: array<string, array<string, string|array<int, string>>>,
     *     compoundVariants?: array<int, array<string, string>>,
     *     defaultVariants?: array<string, string>
     * } $config
     */
    public static function new(string|array $base, array $config): self
    {
        return new self(
            ClassNames::of($base),
            Config::of($config),
        );
    }

    /**
     * @param array<string, string> $props
     */
    public function __invoke(array $props = []): string
    {
        $props = $this->config->defaultVariants->merge($props);

        $additionalClassNames = ClassNames::of($props['class'] ?? $props['className'] ?? '');

        return $this->base
            ->concat($this->config->variants->resolve($props))
            ->concat($this->config->compoundVariants->resolve($props))
            ->concat($additionalClassNames)
            ->toString();
    }
}

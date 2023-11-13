<?php

declare(strict_types=1);

namespace FeatureNinja\Cva;

final readonly class Config
{
    public function __construct(
        public ?Variants $variants,
        public ?CompoundVariants $compoundVariants,
        public ?DefaultVariants $defaultVariants,
    )
    {
    }

    /**
     * @param array{variants?: array<string, array<string, string|array<int, string>>>, compoundVariants?: array<int, array<string, string>>, defaultVariants?: array<string, string>} $config
     */
    public static function of(array $config): self
    {
        $variants = $config['variants'] ?? null;
        if ($variants) {
            $variants = Variants::of($variants);
        }

        $compoundVariants = $config['compoundVariants'] ?? null;
        if ($compoundVariants) {
            $compoundVariants = CompoundVariants::of($compoundVariants);
        }

        $defaultVariants = $config['defaultVariants'] ?? null;
        if ($defaultVariants) {
            $defaultVariants = DefaultVariants::of($defaultVariants);
        }

        return new self($variants, $compoundVariants, $defaultVariants);
    }
}

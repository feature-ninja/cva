<?php

declare(strict_types=1);

namespace FeatureNinja\Cva;

final readonly class CompoundVariants
{
    /**
     * @param array<int, array<string, string>> $config
     */
    private function __construct(
        private array $config,
    )
    {
    }

    /**
     * @param array<int, array<string, string>> $config
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
        foreach ($this->config as $compoundVariant) {
            if (!$this->matches($props, $compoundVariant)) {
                continue;
            }

            $classNames = $classNames->concat(ClassNames::of(
                $compoundVariant['class']
                ?? $compoundVariant['className']
                ?? ''
            ));
        }

        return $classNames;
    }

    /**
     * @param array<string, string> $props
     * @param array<string, string> $compoundVariant
     * @return bool
     */
    private function matches(array $props, array $compoundVariant): bool
    {
        foreach ($compoundVariant as $key => $value) {
            if ($key === 'class' || $key === 'className') {
                continue;
            } elseif ($props[$key] !== $value) {
                return false;
            }
        }

        return true;
    }
}

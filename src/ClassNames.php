<?php

declare(strict_types=1);

namespace FeatureNinja\Cva;

final readonly class ClassNames
{
    private function __construct(
        private StringCollection $items = new StringCollection(),
    ) {
    }

    /**
     * @param string|array<int, string> $classNames
     */
    public static function of(string|array $classNames): self
    {
        if (is_string($classNames)) {
            $classNames = explode(' ', $classNames);
        }

        return new self(new StringCollection($classNames));
    }

    public static function empty(): self
    {
        return new self();
    }

    public function concat(ClassNames $classNames): self
    {
        return new self(
            $this->items->concat($classNames->items),
        );
    }

    public function toString(): string
    {
        return $this->items
            ->unique()
            ->filter(fn (string $value) => trim($value) !== '')
            ->implode(' ');
    }
}

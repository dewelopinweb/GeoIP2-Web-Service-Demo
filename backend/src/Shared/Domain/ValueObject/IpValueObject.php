<?php

declare(strict_types=1);

namespace App\Shared\Domain\ValueObject;

final class IpValueObject
{
    protected readonly string $value;

    public function __construct(string $value)
    {
        $this->validate($value);

        $this->value = $value;
    }

    public function value(): string
    {
        return $this->value;
    }

    protected function validate(string $value): void
    {
        if (false === filter_var($value, FILTER_VALIDATE_IP)) {
            throw new \InvalidArgumentException(
                sprintf('The ip <%s> is not valid', $value)
            );
        }
    }
}

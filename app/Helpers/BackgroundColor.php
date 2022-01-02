<?php

namespace App\Helpers;

use Endroid\QrCode\Color\ColorInterface;

class BackgroundColor implements ColorInterface
{
    public function getRed(): int
    {
        return 255;
    }

    public function getGreen(): int
    {
        return 255;

    }

    public function getBlue(): int
    {
        return 255;

    }

    public function getAlpha(): int
    {
        return 0;

    }

    public function getOpacity(): float
    {
        return 1;

    }

    public function toArray(): array
    {
        return [0, 0, 0, 1];
    }
}

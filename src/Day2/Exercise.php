<?php
declare(strict_types=1);

namespace SWW\AOC\Day2;

class Exercise
{
    private array $course;

    public function __construct(array $input = null)
    {
        $this->course = $input ?: $this->getInput();
    }

    public function part1(): int
    {
        $thing = collect($this->course)
            ->map(fn($value) => explode(' ', $value))
            ->reduce(function (array $acc, array $value) {
                return $this->convertInstruction($value, $acc);
            }, [0, 0]);

        return $thing[0] * $thing[1];
    }

    private function convertInstruction(array $value, $vector): array
    {
        [$direction, $distance] = $value;

        return match ($direction) {
            'forward' => [$vector[0] + (int) $distance, $vector[1]],
            'down' => [$vector[0], $vector[1] + (int) $distance,],
            'backward' => [$vector[0] - (int) $distance, $vector[1]],
            'up' => [$vector[0], $vector[1] - (int) $distance]
        };
    }

    public function part2(): int
    {
        $thing = collect($this->course)
            ->map(fn($value) => explode(' ', $value))
            ->reduce(function (array $acc, array $value) {
                return $this->convertInstructionWithAim($value, $acc);
            }, [0, 0, 0]);

        return $thing[0] * $thing[1];
    }

    private function convertInstructionWithAim(array $value, array $vector): array
    {
        [$direction, $distance] = $value;

        return match ($direction) {
            'forward' => [$vector[0] + (int) $distance, $vector[1] + ((int) $distance * $vector[2]), $vector[2]],
            'down' => [$vector[0], $vector[1], $vector[2] + (int) $distance],
            'background' => [$vector[0] - (int) $distance, $vector[1], $vector[2]],
            'up' => [$vector[0], $vector[1], $vector[2] - (int) $distance]
        };
    }

    private function getInput(): array
    {
        return file('./src/Day2/fixture.txt');
    }
}

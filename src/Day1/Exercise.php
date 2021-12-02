<?php
declare(strict_types=1);

namespace SWW\AOC\Day1;

use Illuminate\Support\Collection;

class Exercise
{
    private array $depths;
    private int $lastDepthValue;
    private int $depthIncreaseCount = 0;

    public function __construct(array $input = null)
    {
        $this->depths = $input ?: $this->getInput();

        // The first depth doesn't need to be compared against anything
        // so we can set it as the first depth value and 😱 mutate $depths.
        $this->lastDepthValue = (int) array_shift($this->depths);
    }

    public function part1(): int
    {
        collect($this->depths)
            ->pipe(fn($value) => $this->countDepths($value));

        return $this->depthIncreaseCount;
    }

    public function part2(): int
    {
        collect($this->depths)
            ->sliding(3)
            ->map(fn(Collection $value) => array_sum($value->toArray()))
            ->pipe(fn($value) => $this->countDepths($value));

        return $this->depthIncreaseCount;
    }

    private function countDepths(Collection $values): Collection
    {
        return $values
            ->each(function ($value, $key) {
                if ($value > $this->lastDepthValue) {
                    $this->depthIncreaseCount += 1;
                }

                $this->lastDepthValue = $value;
            });
    }

    private function getInput(): array
    {
        return file('./src/Day1/fixture.txt');
    }
}

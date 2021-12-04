<?php
declare(strict_types=1);

namespace SWW\AOC\Day1;

use Illuminate\Support\Collection;

class Exercise
{
    private array $depths;

    public function __construct(array $input = null)
    {
        $this->depths = $input ?: $this->getInput();
    }

    public function part1(): int
    {
        return $this->countDepths($this->depths);
    }

    public function part2(): int
    {
        return $this->countDepths($this->depths, 3);
    }

    private function countDepths(array $values, int|null $windowSize = null): int
    {
        $collection = collect($values);
        // The first depth doesn't need to be compared against anything
        // so we can set it as the first depth value and 😱 mutate $depths.
        $lastDepthValue = (int) $collection->shift();
        $depthIncreaseCount = 0;

        $collection
            ->when($windowSize, function ($value) {
                return $value
                    ->sliding(3)
                    ->map(fn(Collection $value) => array_sum($value->toArray()));
            })
            ->each(function ($value) use (&$lastDepthValue, &$depthIncreaseCount) {
                if ($value > $lastDepthValue) {
                    $depthIncreaseCount += 1;
                }

                $lastDepthValue = $value;
            });

        return $depthIncreaseCount;
    }

    private function getInput(): array
    {
        return file('./src/Day1/fixture.txt');
    }
}

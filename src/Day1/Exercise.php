<?php
declare(strict_types=1);

namespace SWW\AOC\Day1;

class Exercise
{
    private array $depths;
    private int $depthIncreaseCount = 0;
    private int $lastDepthValue = 0;

    public function __construct(array $input = null)
    {
        $this->depths = $input ?: $this->getInput();
    }

    public function run(): int
    {
        // The first depth doesn't need to be compared against anything
        // so we can set it as the first depth value and 😱 mutate $depths.
        $this->lastDepthValue = array_shift($this->depths);

        collect($this->depths)
            ->each(function ($value, $key) {
                if ($value > $this->lastDepthValue) {
                    $this->depthIncreaseCount += 1;
                }

                $this->lastDepthValue = $value;
            });

        return $this->depthIncreaseCount;
    }

    private function getInput(): array
    {
        return file('./src/Day1/fixture.txt');
    }
}

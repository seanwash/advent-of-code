<?php

use SWW\AOC\Day1\Exercise;

it('calculates the number of depth increases', function ($dataSet, $expectedCount) {
    $exercise = new Exercise($dataSet);
    expect($exercise->run())->toBe($expectedCount);
})->with([
    [[199, 200, 208, 210, 200, 207, 240, 269, 260, 263], 7],
    [[2, 1, 3, 4, 5], 3]
]);

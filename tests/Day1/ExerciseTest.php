<?php

use SWW\AOC\Day1\Exercise;

it('calculates the number of depth increases', function () {
    $input = [2, 1, 3];
    $exercise = new Exercise($input);

    expect($exercise->run())->toBe(1);

    $input = [2, 1, 3, 4, 5];
    $exercise = new Exercise($input);

    expect($exercise->run())->toBe(3);
});

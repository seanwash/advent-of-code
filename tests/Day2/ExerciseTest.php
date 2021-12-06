<?php

use SWW\AOC\Day2\Exercise;

it('part1 - calculates a position based on a given course', function ($dataSet, $expectedTotal) {
    $exercise = new Exercise($dataSet);
    expect($exercise->part1())->toBe($expectedTotal);
})->with([
    [
        [
            'forward 5',
            'down 5',
            'forward 8',
            'up 3',
            'down 8',
            'forward 2'
        ],
        150
    ],
    [
        [
            'forward 8',
            'down 4',
            'forward 2',
            'up 3',
            'up 8',
            'down 8',
            'forward 2'
        ],
        12
    ],
    [
        [
            'forward 8',
            'backward 2',
            'down 4',
            'forward 2',
            'up 3',
            'up 8',
            'down 8',
            'forward 2'
        ],
        10
    ],
]);

it('part2 - calculates a position based on a given course', function ($dataSet, $expectedTotal) {
    $exercise = new Exercise($dataSet);
    expect($exercise->part2())->toBe($expectedTotal);
})->with([
    [
        [
            'forward 5',
            'down 5',
            'forward 8',
            'up 3',
            'down 8',
            'forward 2'
        ],
        900
    ],
]);

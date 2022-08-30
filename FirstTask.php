<?php

$arr = [
    [
        'id' => 1,
        'parent_id' => null
    ],

    [
        'id' => 2,
        'parent_id' => 1
    ],

    [
        'id' => 3,
        'parent_id' => 1
    ],

    [
        'id' => 4,
        'parent_id' => null
    ],

    [
        'id' => 5,
        'parent_id' => 2
    ],

    [
        'id' => 6,
        'parent_id' => 4
    ]
];

function buildTree(array $elements, $parentId = 0) {
    $branch = array();

    foreach ($elements as $element) {
        if ($element['parent_id'] == $parentId) {
            $children = buildTree($elements, $element['id']);
            if ($children) {
                $element['childs'] = $children;
            }
            unset($element['parent_id']);
            $branch[$element['id']] = $element;
        }
    }
    return $branch;
}

print_r(buildTree($arr));
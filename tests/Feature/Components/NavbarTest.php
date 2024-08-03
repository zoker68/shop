<?php

use App\Models\Category;

it('renders navbar', function () {
    $category1 = Category::factory(['name' => 'Category 1', 'order' => 2])->create();
    $category2 = Category::factory(['name' => 'Category 2', 'order' => 1])->create();
    $child1Category1 = Category::factory(['name' => 'SubCategory 1', 'order' => 3])->create(['parent_id' => $category1->id]);
    $child2Category1 = Category::factory(['name' => 'SubCategory 2', 'order' => 4])->create(['parent_id' => $category1->id]);
    $child1Child1Category1 = Category::factory(['name' => 'SubSubCategory 1', 'order' => 5])->create(['parent_id' => $child1Category1->id]);
    $child2Child1Category1 = Category::factory(['name' => 'SubSubCategory 2', 'order' => 6])->create(['parent_id' => $child1Category1->id]);

    $this->get(route('index'))
        ->assertSeeTextInOrder([
            $category2->name,
            $category1->name,
            $child1Category1->name,
            $child1Child1Category1->name,
            $child2Child1Category1->name,
            $child2Category1->name,
        ])
        ->assertSeeInOrder([
            route('category', $category2->url),
            route('category', $child1Category1->url),
            route('category', $child1Child1Category1->url),
            route('category', $child2Child1Category1->url),
            route('category', $child2Category1->url),
        ], false);
});

<?php

namespace App\View\Components;
use Illuminate\View\Component;
use App\Models\Category;
class CategoryDropdown extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.category-dropdown',[
            'categories'=>Category::all(),
            'currentCategory'=>Category::firstWhere('slug', request('category'))
        ]);
    }
}

<?php

namespace Hunghbm\UI\Providers;

use Illuminate\Support\ServiceProvider;
use Webkul\Admin\Providers\EventServiceProvider;
use Webkul\Core\Tree;

class UIServiceProvider extends ServiceProvider {

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/../Http/routes.php');

        $this->publishes([
            __DIR__ . '/../../publishable/assets' => public_path('vendor/hunghbm/ui/assets'),
        ], 'public');

        $this->loadViewsFrom(__DIR__ . '/../Resources/views/admin', 'hunghbm-admin');

        $this->composeView();
    }

    /**
     * Bind the the data to the views
     *
     * @return void
     */
    protected function composeView()
    {
        view()->composer(['hunghbm-admin::users.roles.create', 'hunghbm-admin::users.roles.edit'], function ($view) {
            $view->with('acl', $this->createACL());
        });

        view()->composer(['hunghbm-admin::catalog.products.create'], function ($view) {
            $items = array();

            foreach (config('product_types') as $item) {
                $item['children'] = [];

                array_push($items, $item);
            }

            $types = core()->sortItems($items);

            $view->with('productTypes', $types);
        });
    }

    /**
     * Create acl tree
     *
     * @return mixed
     */
    public function createACL()
    {
        static $tree;

        if ($tree) {
            return $tree;
        }

        $tree = Tree::create();

        foreach (config('acl') as $item) {
            $tree->add($item, 'acl');
        }

        $tree->items = core()->sortItems($tree->items);

        return $tree;
    }
}

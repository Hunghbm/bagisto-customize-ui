<?php

Route::group(['middleware' => ['web']], function () {
    Route::prefix('admin')->group(function () {
        // Admin Routes
        Route::group(['middleware' => ['admin']], function () {
            // Catalog Routes
            Route::prefix('catalog')->group(function () {
                // Catalog Product Routes
                Route::get('/products/create', 'Webkul\Product\Http\Controllers\ProductController@create')->defaults('_config', [
                    'view' => 'hunghbm-admin::catalog.products.create'
                ])->name('admin.catalog.products.create');

                Route::get('/products/edit/{id}', 'Webkul\Product\Http\Controllers\ProductController@edit')->defaults('_config', [
                    'view' => 'hunghbm-admin::catalog.products.edit'
                ])->name('admin.catalog.products.edit');

                // Catalog Attribute Routes
                Route::get('/attributes/create', 'Webkul\Attribute\Http\Controllers\AttributeController@create')->defaults('_config', [
                    'view' => 'hunghbm-admin::catalog.attributes.create'
                ])->name('admin.catalog.attributes.create');

                Route::get('/attributes/edit/{id}', 'Webkul\Attribute\Http\Controllers\AttributeController@edit')->defaults('_config', [
                    'view' => 'hunghbm-admin::catalog.attributes.edit'
                ])->name('admin.catalog.attributes.edit');

                // Catalog Category Routes
                Route::get('/categories/create', 'Webkul\Category\Http\Controllers\CategoryController@create')->defaults('_config', [
                    'view' => 'hunghbm-admin::catalog.categories.create'
                ])->name('admin.catalog.categories.create');

                Route::get('/categories/edit/{id}', 'Webkul\Category\Http\Controllers\CategoryController@edit')->defaults('_config', [
                    'view' => 'hunghbm-admin::catalog.categories.edit'
                ])->name('admin.catalog.categories.edit');

                // Catalog Family Routes
                Route::get('/families/create', 'Webkul\Attribute\Http\Controllers\AttributeFamilyController@create')->defaults('_config', [
                    'view' => 'hunghbm-admin::catalog.families.create'
                ])->name('admin.catalog.families.create');

                Route::get('/families/edit/{id}', 'Webkul\Attribute\Http\Controllers\AttributeFamilyController@edit')->defaults('_config', [
                    'view' => 'hunghbm-admin::catalog.families.edit'
                ])->name('admin.catalog.families.edit');
            });

            // Sales Routes
            Route::prefix('sales')->group(function () {
                // Sales Order Routes
                Route::get('/orders/view/{id}', 'Webkul\Admin\Http\Controllers\Sales\OrderController@view')->defaults('_config', [
                    'view' => 'hunghbm-admin::sales.orders.view'
                ])->name('admin.sales.orders.view');

                // Sales Invoices Routes
                Route::get('/invoices/create/{order_id}', 'Webkul\Admin\Http\Controllers\Sales\InvoiceController@create')->defaults('_config', [
                    'view' => 'hunghbm-admin::sales.invoices.create'
                ])->name('admin.sales.invoices.create');

                Route::get('/invoices/view/{id}', 'Webkul\Admin\Http\Controllers\Sales\InvoiceController@view')->defaults('_config', [
                    'view' => 'hunghbm-admin::sales.invoices.view'
                ])->name('admin.sales.invoices.view');

                // Sales Shipments Routes
                Route::get('/shipments/create/{order_id}', 'Webkul\Admin\Http\Controllers\Sales\ShipmentController@create')->defaults('_config', [
                    'view' => 'hunghbm-admin::sales.shipments.create'
                ])->name('admin.sales.shipments.create');

                Route::get('/shipments/view/{id}', 'Webkul\Admin\Http\Controllers\Sales\ShipmentController@view')->defaults('_config', [
                    'view' => 'hunghbm-admin::sales.shipments.view'
                ])->name('admin.sales.shipments.view');

                // Sales Redunds Routes
                Route::get('/refunds/create/{order_id}', 'Webkul\Admin\Http\Controllers\Sales\RefundController@create')->defaults('_config', [
                    'view' => 'hunghbm-admin::sales.refunds.create'
                ])->name('admin.sales.refunds.create');

                Route::get('/refunds/view/{id}', 'Webkul\Admin\Http\Controllers\Sales\RefundController@view')->defaults('_config', [
                    'view' => 'hunghbm-admin::sales.refunds.view'
                ])->name('admin.sales.refunds.view');
            });

            //Customer Management Routes
            Route::get('customers/create', 'Webkul\Admin\Http\Controllers\Customer\CustomerController@create')->defaults('_config',[
                'view' => 'hunghbm-admin::customers.create'
            ])->name('admin.customer.create');

            Route::get('customers/edit/{id}', 'Webkul\Admin\Http\Controllers\Customer\CustomerController@edit')->defaults('_config',[
                'view' => 'hunghbm-admin::customers.edit'
            ])->name('admin.customer.edit');

            Route::get('customers/note/{id}', 'Webkul\Admin\Http\Controllers\Customer\CustomerController@createNote')->defaults('_config',[
                'view' => 'hunghbm-admin::customers.note'
            ])->name('admin.customer.note.create');

            // Customer's Addresses Routes
            Route::get('customers/{id}/addresses/create', 'Webkul\Admin\Http\Controllers\Customer\AddressController@create')->defaults('_config',[
                'view' => 'hunghbm-admin::customers.addresses.create'
            ])->name('admin.customer.addresses.create');

            Route::get('customers/addresses/edit/{id}', 'Webkul\Admin\Http\Controllers\Customer\AddressController@edit')->defaults('_config', [
                'view' => 'hunghbm-admin::customers.addresses.edit',
            ])->name('admin.customer.addresses.edit');

            // Reviews Routes
            Route::get('reviews/edit/{id}', 'Webkul\Product\Http\Controllers\ReviewController@edit')->defaults('_config', [
                'view' => 'hunghbm-admin::customers.reviews.edit',
            ])->name('admin.customer.review.edit');

            // Customer Groups Routes
            Route::get('groups/create', 'Webkul\Admin\Http\Controllers\Customer\CustomerGroupController@create')->defaults('_config', [
                'view' => 'hunghbm-admin::customers.groups.create',
            ])->name('admin.groups.create');

            Route::get('groups/edit/{id}', 'Webkul\Admin\Http\Controllers\Customer\CustomerGroupController@edit')->defaults('_config', [
                'view' => 'hunghbm-admin::customers.groups.edit',
            ])->name('admin.groups.edit');

            // Newsletter Subscription Routes
            Route::get('subscribers/edit/{id}', 'Webkul\Core\Http\Controllers\SubscriptionController@edit')->defaults('_config', [
                'view' => 'hunghbm-admin::customers.subscribers.edit',
            ])->name('admin.customers.subscribers.edit');

            // Velocity Content Routes
            Route::prefix('velocity')->group(function () {
                Route::get('/content/create', 'Webkul\Velocity\Http\Controllers\Admin\ContentController@create')->defaults('_config',[
                    'view' => 'hunghbm-admin::content.create'
                ])->name('velocity.admin.content.create');

                Route::get('/content/edit/{id}', 'Webkul\Velocity\Http\Controllers\Admin\ContentController@edit')->defaults('_config',[
                    'view' => 'hunghbm-admin::content.edit'
                ])->name('velocity.admin.content.edit');
            });

            Route::prefix('promotions')->group(function () {
                // Catalog Rules Routes
                Route::get('catalog-rules/create', 'Webkul\CatalogRule\Http\Controllers\CatalogRuleController@create')->defaults('_config', [
                    'view' => 'hunghbm-admin::promotions.catalog-rules.create',
                ])->name('admin.catalog-rules.create');

                Route::get('catalog-rules/edit/{id}', 'Webkul\CatalogRule\Http\Controllers\CatalogRuleController@edit')->defaults('_config', [
                    'view' => 'hunghbm-admin::promotions.catalog-rules.edit',
                ])->name('admin.catalog-rules.edit');

                // Cart Rules Routes
                Route::get('cart-rules/create', 'Webkul\CartRule\Http\Controllers\CartRuleController@create')->defaults('_config', [
                    'view' => 'hunghbm-admin::promotions.cart-rules.create',
                ])->name('admin.cart-rules.create');

                Route::get('cart-rules/copy/{id}', 'Webkul\CartRule\Http\Controllers\CartRuleController@copy')->defaults('_config', [
                    'view' => 'hunghbm-admin::promotions.cart-rules.edit',
                ])->name('admin.cart-rules.copy');

                Route::get('cart-rules/edit/{id}', 'Webkul\CartRule\Http\Controllers\CartRuleController@edit')->defaults('_config', [
                    'view' => 'hunghbm-admin::promotions.cart-rules.edit',
                ])->name('admin.cart-rules.edit');
            });

            // CMS Routes
            Route::prefix('cms')->group(function () {
                Route::get('create', 'Webkul\CMS\Http\Controllers\Admin\PageController@create')->defaults('_config', [
                    'view' => 'hunghbm-admin::cms.create',
                ])->name('admin.cms.create');

                Route::get('edit/{id}', 'Webkul\CMS\Http\Controllers\Admin\PageController@edit')->defaults('_config', [
                    'view' => 'hunghbm-admin::cms.edit',
                ])->name('admin.cms.edit');
            });

            // Locale Routes
            Route::get('/locales/create', 'Webkul\Core\Http\Controllers\LocaleController@create')->defaults('_config', [
                'view' => 'hunghbm-admin::settings.locales.create',
            ])->name('admin.locales.create');

            Route::get('/locales/edit/{id}', 'Webkul\Core\Http\Controllers\LocaleController@edit')->defaults('_config', [
                'view' => 'hunghbm-admin::settings.locales.edit',
            ])->name('admin.locales.edit');

            // Currency Routes
            Route::get('/currencies/create', 'Webkul\Core\Http\Controllers\CurrencyController@create')->defaults('_config', [
                'view' => 'hunghbm-admin::settings.currencies.create',
            ])->name('admin.currencies.create');

            Route::get('/currencies/edit/{id}', 'Webkul\Core\Http\Controllers\CurrencyController@edit')->defaults('_config', [
                'view' => 'hunghbm-admin::settings.currencies.edit',
            ])->name('admin.currencies.edit');

            // Exchange Rates Routes
            Route::get('/exchange_rates/create', 'Webkul\Core\Http\Controllers\ExchangeRateController@create')->defaults('_config', [
                'view' => 'hunghbm-admin::settings.exchange_rates.create',
            ])->name('admin.exchange_rates.create');

            Route::get('/exchange_rates/edit/{id}', 'Webkul\Core\Http\Controllers\ExchangeRateController@edit')->defaults('_config', [
                'view' => 'hunghbm-admin::settings.exchange_rates.edit',
            ])->name('admin.exchange_rates.edit');

            // Inventory Source Routes
            Route::get('/inventory_sources/create', 'Webkul\Inventory\Http\Controllers\InventorySourceController@create')->defaults('_config', [
                'view' => 'hunghbm-admin::settings.inventory_sources.create',
            ])->name('admin.inventory_sources.create');

            Route::get('/inventory_sources/edit/{id}', 'Webkul\Inventory\Http\Controllers\InventorySourceController@edit')->defaults('_config', [
                'view' => 'hunghbm-admin::settings.inventory_sources.edit',
            ])->name('admin.inventory_sources.edit');

            // Channel Routes
            Route::get('/channels/create', 'Webkul\Core\Http\Controllers\ChannelController@create')->defaults('_config', [
                'view' => 'hunghbm-admin::settings.channels.create',
            ])->name('admin.channels.create');

            Route::get('/channels/edit/{id}', 'Webkul\Core\Http\Controllers\ChannelController@edit')->defaults('_config', [
                'view' => 'hunghbm-admin::settings.channels.edit',
            ])->name('admin.channels.edit');

            // User Routes
            Route::get('/users/create', 'Webkul\User\Http\Controllers\UserController@create')->defaults('_config', [
                'view' => 'hunghbm-admin::users.users.create',
            ])->name('admin.users.create');

            Route::get('/users/edit/{id}', 'Webkul\User\Http\Controllers\UserController@edit')->defaults('_config', [
                'view' => 'hunghbm-admin::users.users.edit',
            ])->name('admin.users.edit');

            Route::get('/users/confirm/{id}', 'Webkul\User\Http\Controllers\UserController@confirm')->defaults('_config', [
                'view' => 'hunghbm-admin::customers.confirm-password',
            ])->name('super.users.confirm');

            // User Role Routes
            Route::get('/roles/create', 'Webkul\User\Http\Controllers\RoleController@create')->defaults('_config', [
                'view' => 'hunghbm-admin::users.roles.create',
            ])->name('admin.roles.create');

            Route::get('/roles/edit/{id}', 'Webkul\User\Http\Controllers\RoleController@edit')->defaults('_config', [
                'view' => 'hunghbm-admin::users.roles.edit',
            ])->name('admin.roles.edit');

            // Slider Routes
            Route::get('slider/create', 'Webkul\Core\Http\Controllers\SliderController@create')->defaults('_config', [
                'view' => 'hunghbm-admin::settings.sliders.create',
            ])->name('admin.sliders.create');

            Route::get('slider/edit/{id}', 'Webkul\Core\Http\Controllers\SliderController@edit')->defaults('_config', [
                'view' => 'hunghbm-admin::settings.sliders.edit',
            ])->name('admin.sliders.edit');

            // Tax Category Routes
            Route::get('/tax-categories/create', 'Webkul\Tax\Http\Controllers\TaxCategoryController@show')->defaults('_config', [
                'view' => 'hunghbm-admin::tax.tax-categories.create',
            ])->name('admin.tax-categories.show');

            Route::get('/tax-categories/edit/{id}', 'Webkul\Tax\Http\Controllers\TaxCategoryController@edit')->defaults('_config', [
                'view' => 'hunghbm-admin::tax.tax-categories.edit',
            ])->name('admin.tax-categories.edit');

            // Tax Rate
            Route::get('tax-rates/create', 'Webkul\Tax\Http\Controllers\TaxRateController@show')->defaults('_config', [
                'view' => 'hunghbm-admin::tax.tax-rates.create',
            ])->name('admin.tax-rates.show');

            Route::get('tax-rates/edit/{id}', 'Webkul\Tax\Http\Controllers\TaxRateController@edit')->defaults('_config', [
                'view' => 'hunghbm-admin::tax.tax-rates.edit',
            ])->name('admin.tax-rates.store');
        });
    });
});

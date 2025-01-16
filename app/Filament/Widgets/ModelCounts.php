<?php

namespace App\Filament\Widgets;

use App\Models\Customer;
use App\Models\Company;
use App\Models\User;
use App\Models\Promoter;
use App\Models\Category;
use App\Models\Product;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class ModelCounts extends BaseWidget
{
    protected ?string $heading = 'Overview Stats';

    protected function getCards(): array
    {
        return [
            Card::make('Customers', Customer::count())
                ->description('Total customers in the system')
                ->url(route('filament.admin.resources.customers.index')),

            Card::make('Companies', Company::count())
                ->description('Total companies in the system')
                ->url(route('filament.admin.resources.companies.index')),

            Card::make('Users', User::count())
                ->description('Total users in the system')
                ->url(route('filament.admin.resources.users.index')),

            Card::make('Promoters', Promoter::count())
                ->description('Total promoters in the system')
                ->url(route('filament.admin.resources.promoters.index')),

            Card::make('Categories', Category::count())
                ->description('Total categories in the system')
                ->url(route('filament.admin.resources.categories.index')),

            Card::make('Products', Product::count())
                ->description('Total products in the system')
                ->url(route('filament.admin.resources.products.index')),
        ];
    }
}

<?php

namespace MbCreditoCBO\Providers;

use Illuminate\Support\ServiceProvider;

class SeracademicoRepositoryProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {

        $this->app->bind(
            \MbCreditoCBO\Repositories\UserRepository::class,
            \MbCreditoCBO\Repositories\UserRepositoryEloquent::class
        );

        $this->app->bind(
            \MbCreditoCBO\Repositories\RoleRepository::class,
            \MbCreditoCBO\Repositories\RoleRepositoryEloquent::class
        );

        $this->app->bind(
            \MbCreditoCBO\Repositories\PermissionRepository::class,
            \MbCreditoCBO\Repositories\PermissionRepositoryEloquent::class
        );

		$this->app->bind(
			\MbCreditoCBO\Repositories\OperadorRepository::class,
			\MbCreditoCBO\Repositories\OperadorRepositoryEloquent::class
		);

		$this->app->bind(
			\MbCreditoCBO\Repositories\ContratoRepository::class,
			\MbCreditoCBO\Repositories\ContratoRepositoryEloquent::class
		);

		$this->app->bind(
			\MbCreditoCBO\Repositories\Repository::class,
			\MbCreditoCBO\Repositories\RepositoryEloquent::class
		);
	}
}
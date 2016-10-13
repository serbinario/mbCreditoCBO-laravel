<?php

namespace cboMbcredito\Providers;

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
            \cboMbcredito\Repositories\UserRepository::class,
            \cboMbcredito\Repositories\UserRepositoryEloquent::class
        );

        $this->app->bind(
            \cboMbcredito\Repositories\RoleRepository::class,
            \cboMbcredito\Repositories\RoleRepositoryEloquent::class
        );

        $this->app->bind(
            \cboMbcredito\Repositories\PermissionRepository::class,
            \cboMbcredito\Repositories\PermissionRepositoryEloquent::class
        );

		$this->app->bind(
			\cboMbcredito\Repositories\OperadorRepository::class,
			\cboMbcredito\Repositories\OperadorRepositoryEloquent::class
		);
	}
}
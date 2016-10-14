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
			\MbCreditoCBO\Repositories\TipoContratoRepository::class,
			\MbCreditoCBO\Repositories\TipoContratoRepositoryEloquent::class
		);

		$this->app->bind(
			\MbCreditoCBO\Repositories\ConvenioCallCenterRepository::class,
			\MbCreditoCBO\Repositories\ConvenioCallCenterRepositoryEloquent::class
		);

		$this->app->bind(
			\MbCreditoCBO\Repositories\ClienteRepository::class,
			\MbCreditoCBO\Repositories\ClienteRepositoryEloquent::class
		);

		$this->app->bind(
			\MbCreditoCBO\Repositories\TelefoneRepository::class,
			\MbCreditoCBO\Repositories\TelefoneRepositoryEloquent::class
		);

		$this->app->bind(
			\MbCreditoCBO\Repositories\AgenciaCallCenterRepository::class,
			\MbCreditoCBO\Repositories\AgenciaCallCenterRepositoryEloquent::class
		);

		$this->app->bind(
			\MbCreditoCBO\Repositories\ConvenioCallCenterRepository::class,
			\MbCreditoCBO\Repositories\ConvenioCallCenterRepositoryEloquent::class
		);

//		$this->app->bind(
//			\MbCreditoCBO\Repositories\UserRepository::class,
//			\MbCreditoCBO\Repositories\UserRepositoryEloquent::class
//		);
	}
}
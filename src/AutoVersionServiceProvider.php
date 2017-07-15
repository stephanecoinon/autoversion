<?php namespace Coinon\AutoVersion;

use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\AliasLoader;

class AutoVersionServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	public function boot()
	{
		// Laravel 4.*
		if (method_exists($this, 'package')) {
			$this->package('stephanecoinon/autoversion');
		}

		AliasLoader::getInstance()->alias('AutoVersion', 'Coinon\AutoVersion\AutoVersion');
		AutoVersion::setDocumentRoot(public_path());
	}

	public function register() { }

}

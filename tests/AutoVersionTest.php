<?php

use org\bovigo\vfs\vfsStream;
use Coinon\AutoVersion\AutoVersion;

class AutoVersionTest extends PHPUnit_Framework_TestCase {

	protected $fileSystem;

	public function setUp()
	{
		// Create web server document root
		$this->fileSystem = VfsStream::setup('doc_root', null, [
			'var' => [ 
				'www' => [ 
					'html' => [
						'public' => []
					]
				]
			]
		]);
		AutoVersion::setDocumentRoot(VfsStream::url('doc_root'));
	}

	/** @test */
	public function it_versions_an_existing_asset()
	{
		$asset = 'css/main.css';
		$timeStamp = time();
		$this->fileSystem->addChild(
			VfsStream::newFile($asset)
				->lastModified($timeStamp)
		);

		$this->assertEquals("$asset?$timeStamp", AutoVersion::asset($asset));
	}

	/** @test */
	public function it_does_not_version_a_missing_asset()
	{
		$asset = 'css/main.css';

		$this->assertEquals($asset, AutoVersion::asset($asset));
	}

}

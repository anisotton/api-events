<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthenticateTest extends TestCase
{
	/**
	 * Authenticate
	 *
	 * @return void
	 */
	public function testAuthenticateWithError()
	{
		$response = $this->json('POST', '/api/login', []);

		$response->assertStatus(400);

	}

	/**
	 * Authenticate
	 *
	 * @depends testAuthenticateWithError
	 * @return void
	 */
	public function testAuthenticate()
	{
		$response = $this->json('POST', '/api/login', []);

		$response->assertStatus(200);

	}

	/**
	 * Logout
	 *
	 * @depends testAuthenticate
	 * @return void
	 */
	public function testLogoutWithError()
	{
		$response = $this->json('POST', '/api/logout', []);

		$response->assertStatus(400);

	}

	/**
	 * Logout
	 *
	 * @depends testLogoutWithError
	 * @return void
	 */
	public function testLogout()
	{
		$response = $this->json('POST', '/api/logout', []);

		$response->assertStatus(200);

	}

	/**
	 * RefreshToken
	 *
	 * @depends testLogout
	 * @return void
	 */
	public function testRefreshTokenWithError()
	{
		$response = $this->json('POST', '/api/login-refresh', []);

		$response->assertStatus(400);

	}

	/**
	 * RefreshToken
	 *
	 * @depends testRefreshTokenWithError
	 * @return void
	 */
	public function testRefreshToken()
	{
		$response = $this->json('POST', '/api/login-refresh', []);

		$response->assertStatus(200);

	}

	/**
	 * GetAuthenticatedUser
	 *
	 * @depends testRefreshToken
	 * @return void
	 */
	public function testGetAuthenticatedUserWithError()
	{
		$response = $this->json('GET', '/api/me', []);

		$response->assertStatus(400);

	}

	/**
	 * GetAuthenticatedUser
	 *
	 * @depends testGetAuthenticatedUserWithError
	 * @return void
	 */
	public function testGetAuthenticatedUser()
	{
		$response = $this->json('GET', '/api/me', []);

		$response->assertStatus(200);

	}

}

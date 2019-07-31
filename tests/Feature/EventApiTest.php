<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EventApiTest extends TestCase
{
	/**
	 * AllEvents
	 *
	 * @return void
	 */
	public function testAllEventsWithError()
	{
		$response = $this->json('GET', '/api/all-events', []);

		$response->assertStatus(400);

	}

	/**
	 * AllEvents
	 *
	 * @depends testAllEventsWithError
	 * @return void
	 */
	public function testAllEvents()
	{
		$response = $this->json('GET', '/api/all-events', []);

		$response->assertStatus(200);

	}

	/**
	 * Index
	 *
	 * @depends testAllEvents
	 * @return void
	 */
	public function testIndexWithError()
	{
		$response = $this->json('GET', '/api/events', [], [
			'Authorization' => 'Bearer '
		]);

		$response->assertStatus(400);

	}

	/**
	 * Index
	 *
	 * @depends testIndexWithError
	 * @return void
	 */
	public function testIndex()
	{
		$response = $this->json('GET', '/api/events', [], [
			'Authorization' => 'Bearer '
		]);

		$response->assertStatus(200);

	}

	/**
	 * Store
	 *
	 * @depends testIndex
	 * @return void
	 */
	public function testStoreWithError()
	{
		$response = $this->json('POST', '/api/events', [], [
			'Authorization' => 'Bearer '
		]);

		$response->assertStatus(400);

	}

	/**
	 * Store
	 *
	 * @depends testStoreWithError
	 * @return void
	 */
	public function testStore()
	{
		$response = $this->json('POST', '/api/events', [], [
			'Authorization' => 'Bearer '
		]);

		$response->assertStatus(200);

	}

	/**
	 * Show
	 *
	 * @depends testStore
	 * @return void
	 */
	public function testShowWithError()
	{
		$response = $this->json('GET', '/api/events/{event}', [], [
			'Authorization' => 'Bearer '
		]);

		$response->assertStatus(400);

	}

	/**
	 * Show
	 *
	 * @depends testShowWithError
	 * @return void
	 */
	public function testShow()
	{
		$response = $this->json('GET', '/api/events/{event}', [], [
			'Authorization' => 'Bearer '
		]);

		$response->assertStatus(200);

	}

	/**
	 * Update
	 *
	 * @depends testShow
	 * @return void
	 */
	public function testUpdateWithError()
	{
		$response = $this->json('PUT', '/api/events/{event}', [], [
			'Authorization' => 'Bearer '
		]);

		$response->assertStatus(400);

	}

	/**
	 * Update
	 *
	 * @depends testUpdateWithError
	 * @return void
	 */
	public function testUpdate()
	{
		$response = $this->json('PUT', '/api/events/{event}', [], [
			'Authorization' => 'Bearer '
		]);

		$response->assertStatus(200);

	}

	/**
	 * Update
	 *
	 * @depends testUpdate
	 * @return void
	 */
	public function testUpdateWithError()
	{
		$response = $this->json('PATCH', '/api/events/{event}', [], [
			'Authorization' => 'Bearer '
		]);

		$response->assertStatus(400);

	}

	/**
	 * Update
	 *
	 * @depends testUpdateWithError
	 * @return void
	 */
	public function testUpdate()
	{
		$response = $this->json('PATCH', '/api/events/{event}', [], [
			'Authorization' => 'Bearer '
		]);

		$response->assertStatus(200);

	}

	/**
	 * Destroy
	 *
	 * @depends testUpdate
	 * @return void
	 */
	public function testDestroyWithError()
	{
		$response = $this->json('DELETE', '/api/events/{event}', [], [
			'Authorization' => 'Bearer '
		]);

		$response->assertStatus(400);

	}

	/**
	 * Destroy
	 *
	 * @depends testDestroyWithError
	 * @return void
	 */
	public function testDestroy()
	{
		$response = $this->json('DELETE', '/api/events/{event}', [], [
			'Authorization' => 'Bearer '
		]);

		$response->assertStatus(200);

	}

	/**
	 * Publish
	 *
	 * @depends testDestroy
	 * @return void
	 */
	public function testPublishWithError()
	{
		$response = $this->json('GET', '/api/event/{id}/publish', [], [
			'Authorization' => 'Bearer '
		]);

		$response->assertStatus(400);

	}

	/**
	 * Publish
	 *
	 * @depends testPublishWithError
	 * @return void
	 */
	public function testPublish()
	{
		$response = $this->json('GET', '/api/event/{id}/publish', [], [
			'Authorization' => 'Bearer '
		]);

		$response->assertStatus(200);

	}

	/**
	 * Unpublish
	 *
	 * @depends testPublish
	 * @return void
	 */
	public function testUnpublishWithError()
	{
		$response = $this->json('GET', '/api/event/{id}/unpublish', [], [
			'Authorization' => 'Bearer '
		]);

		$response->assertStatus(400);

	}

	/**
	 * Unpublish
	 *
	 * @depends testUnpublishWithError
	 * @return void
	 */
	public function testUnpublish()
	{
		$response = $this->json('GET', '/api/event/{id}/unpublish', [], [
			'Authorization' => 'Bearer '
		]);

		$response->assertStatus(200);

	}

}

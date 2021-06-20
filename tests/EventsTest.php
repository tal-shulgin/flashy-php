<?php

namespace Flashy\Tests;

use Flashy\Exceptions\FlashyAuthenticationException;
use Flashy\Exceptions\FlashyClientException;
use Flashy\Exceptions\FlashyException;
use Flashy\Exceptions\FlashyResponseException;

class EventsTest extends BaseTest
{

    /**
     * @test
     * @throws FlashyClientException
     * @throws FlashyResponseException
     * @throws FlashyException
     * @throws FlashyAuthenticationException
     */
    public function send_tracking_without_contact_info()
    {
        $this->init();

        $account = $this->api->events->track("Purchase", [
            "content_ids" => []
        ]);

        $this->assertFalse($account->success());
    }

    /**
     * @test
     * @throws FlashyClientException
     * @throws FlashyResponseException
     * @throws FlashyException|FlashyAuthenticationException
     */
    public function send_tracking_event()
    {
        $this->init();

        $account = $this->api->events->track("Purchase", [
            "content_ids" => [],
            "contact_id" => "123"
        ]);

        $this->assertTrue($account->success());
    }

    /**
     * @test
     * @throws FlashyClientException
     * @throws FlashyResponseException
     * @throws FlashyException|FlashyAuthenticationException
     */
    public function tracking_bulk_events()
    {
        $this->init();

        $account = $this->api->events->track("Purchase", [
            "content_ids" => [],
            "contact_id" => "123"
        ]);

        $this->assertTrue($account->success());
    }

}

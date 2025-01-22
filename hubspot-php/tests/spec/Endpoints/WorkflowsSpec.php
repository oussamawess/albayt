<?php

namespace spec\SevenShores\Hubspot\Endpoints;

use PhpSpec\ObjectBehavior;
use SevenShores\Hubspot\Http\Client;

class WorkflowsSpec extends ObjectBehavior
{
    public function let(Client $client)
    {
        $this->beConstructedWith('demo', $client);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType('SevenShores\Hubspot\Endpoints\Workflows');
    }
}

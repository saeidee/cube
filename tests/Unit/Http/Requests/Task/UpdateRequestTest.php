<?php

namespace Tests\Unit\Http\Requests\Task;

use Tests\TestCase;
use App\Http\Requests\Task\UpdateRequest;

/**
 * Class UpdateRequestTest
 * @package Tests\Unit\Http\Requests\Task
 * @coversDefaultClass \App\Http\Requests\Task\UpdateRequest
 */
class UpdateRequestTest extends TestCase
{
    /**
     * @return UpdateRequest
     */
    public function getRequest(): UpdateRequest
    {
        return new UpdateRequest();
    }

    /**
     * @test
     * @covers ::rules
     * @dataProvider rulesProvider
     * @param string $field
     * @param string $rule
     */
    function it_should_validate_rules(string $field, string $rule)
    {
        $this->assertSame($rule, $this->getRequest()->rules()[$field]);
    }

    /**
     * @test
     * @covers ::rules
     */
    function it_should_assert_count_validation_rules()
    {
        $this->assertCount(count($this->rulesProvider()), $this->getRequest()->rules());
    }

    /**
     * @return array
     */
    public function rulesProvider(): array
    {
        return [
            ['title', 'required|string|max:255'],
            ['description', 'string|max:1000'],
            ['due_at', 'date_format:Y-m-d H:i:s'],
        ];
    }
}

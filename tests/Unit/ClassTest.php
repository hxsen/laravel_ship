<?php

namespace Tests\Unit;

use Tests\TestCase;

class ClassTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {
        $instance = $this->mock(SubClass::class, function ($mock) {
            $mock->shouldReceive('getName')->andReturn('mock_test');
            // 未mock的方法，则调用他自身的实例
            $mock->makePartial();
        });
        // $instance = app(SubClass::class);

        // dd($instance->say(), $instance->getName(), $instance->show());

        // 强制指定某个方法需要mock
        $instance = $this->mock(TestClass::class . '[a,c]');
        $instance->shouldReceive('a')->andReturn('mock_a_test');
        $instance->shouldReceive('c')->andReturn('mock_c_test');
        // dd($instance->a(), $instance->b(), $instance->c());

        $instance = \Mockery::mock(new TestFinalClass);
        $instance->shouldReceive('b')->andReturn('mock_a_final_test');
        // dd($instance->a(), $instance->b(), $instance->c(), $instance->parent());

        $instance = \Mockery::namedMock('Tests\Unit\MyDateTime', DateTime::class);
        $instance->shouldReceive('date')->andReturn('mock_date');
        $instance->makePartial();
        // dd($instance->date());

        $mock = \Mockery::mock(ParamClass::class, ['param1', 'parma2']);
        // $mock->shouldReceive('get')->andReturn('get_param');
        $mock->shouldIgnoreMissing();
        // $mock->asUndefined();
        dd($mock->get());

        $this->assertTrue(true);
    }
}

class ParentClass
{
    protected function getFields()
    {
        return [];
    }

    public function getName()
    {
        return 'parent2';
    }
    public function show()
    {
        return $this->getFields();
    }
}

class SubClass extends ParentClass
{
    public function getFields()
    {
        return ['sub_field'];
    }

    public function getSelf()
    {
        return '2222';
    }
    public function say()
    {
        return 'say';
    }
}

class TestClass
{
    public function a()
    {
        return 'a_test';
    }

    public function b()
    {
        return 'b_test';
    }

    public function c()
    {
        return 'c_test';
    }
}


class ParentTestFinalClass
{
    public function a()
    {
        return 'parent_a';
    }

    public function parent()
    {
        return $this->a();
    }
}

final class TestFinalClass extends ParentTestFinalClass
{
    public function a()
    {
        return 'a_sub_test';
    }

    public function b()
    {
        return 'b_test';
    }

    public function c()
    {
        return 'c_test';
    }

}

class DateTime
{
    public function date()
    {
        return 'date';
    }
}

class ParamClass
{
    protected $p1;
    protected $p2;

    public function __construct($p1, $p2)
    {
        $this->p1 = $p1;
        $this->p2 = $p2;
    }

    public function get(): array
    {
        return [$this->p1, $this->p2];
    }
}

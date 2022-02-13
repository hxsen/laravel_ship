<?php

namespace Tests\Unit;

use Mockery\MockInterface;
use Tests\TestCase;

class MockTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {
        $instance = $this->mock(Apple::class, function (MockInterface $mock) {
            $mock->shouldReceive('name')->andReturn('mock.name');
            $mock->shouldNotReceive('price');
        });

        // 仅仅模拟给定'a', 'b'参数值的函数
        $instance = $this->mock(Apple2::class, function (MockInterface $mock) {
            $mock->shouldNotReceive(['price' => 'mock_price'])->with('a', 'b');
        });
        // dd($instance->price('a', 'b'));


        // 根据参数设定返回值
        $instance = $this->mock(Student::class, function (MockInterface $mock) {
            // 闭包根据返回值计算返回类型
            $mock->shouldReceive('say')->andReturnUsing(function($args1, $args2) {
                return $args1 . ':' . $args2;
            });
            // 返回一个返回值
            $mock->shouldReceive('read')->andReturnArg(0);

            // 跟随该方法一起设置公共属性，当前运行该方法后，属性被设置成blue
            // 如果该方法的作用是更改一个公共属性的华，此方法会很有用
            $mock->shouldReceive('getColor')->set('color', 'blue')->andReturn('mock_color');
            $mock->shouldReceive('born')->once()->andReturn('mock_born');
            // $mock->makePartial();
        });

        // dd($instance->say('a', 'b'), $instance->read('english', 33), $instance->color, $instance->getColor(), $instance->color);
        // dd($instance->born());

        // arrange
        $mock = \Mockery::mock('MyDependency');
        $sut = new MyClass($mock);

        // expect
        $mock->shouldReceive('foo')
            ->once()
            ->with('bar');

        // act
        dd($sut->foo('ba'));


        $this->assertTrue(true);
    }
}

class apple
{
    public function name()
    {
        return 'apple.name';
    }

    public function price($name, $size)
    {
        return 'apple.price{' . $name . '}' .$size;
    }
}

class apple2
{
    public function name()
    {
        return 'apple.name';
    }

    public function price($name, $size = '')
    {
        return 'apple.price{' . $name . '}' .$size;
    }
}

class Student
{
    public $color = 'red';

    public function say($word, $word2)
    {
        return 'say_something: ' . $word . ', ' . $word2;
    }
    public function read($book, $line)
    {
        return 'say_something: ' . $book . ', ' . $line;
    }
    public function getColor()
    {
        return $this->color;
    }
    public function twice()
    {
        return $this->born() . $this->born();
    }
    public function born()
    {
        // $this->born();
        return '出生了一次';
    }
}

class MyDependency
{
    public function foo($a)
    {
        return 'class_' . $a;
    }
}

class MyClass extends MyDependency
{

}

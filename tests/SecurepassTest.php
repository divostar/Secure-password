<?php


/**
 * Class SecurepassTest
 *
 * as tests use facade and random string method
 * to generate password they should be run from app directory
 * to allow access to laravel Testcase
 */
class SecurepassTest extends TestCase {


    /**
     *
     */
    public function setUp()
    {
        parent::setUp();
    }

    /** @test */
    public function it_generates_a_random_string()
    {
        $string = Securepass::generate();

        $this->assertNotNull($string,'String is null');
    }

    /** @test */
    public function it_generates_a_string_of_the_required_length()
    {
        $string = Securepass::generate(5);

        $length = strlen($string);

        $this->assertEquals(5,$length,'Generator returns wrong length string');
    }

    /** @test */
    public function it_does_not_contain_special_characters_if_not_requested()
    {
        $string = Securepass::generate(8,false);

        //$check = preg_match('/[$-:-?{-~!"^_`\[\]]/',$string);
        $check = preg_match('[\W]', $string);

        $this->assertEquals(0,$check);
    }

    /** @test */
    public function it_contains_at_least_one_special_character()
    {
        $string = Securepass::generate(8,true);

        $check  = preg_match('[\W]', $string);

        $this->assertEquals(1,$check);
    }



}
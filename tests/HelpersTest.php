<?php

namespace Bfg\Text\Test;

class HelpersTest extends TestCase
{
    public function testIsJson()
    {
        $this->assertTrue(
            is_json(json_encode(['test' => 1]))
        );
    }
    public function testLangInText()
    {
        $this->assertTrue(
            lang_in_text("Text: @validation.accepted") === 'Text: The :attribute must be accepted.'
        );
    }
    public function testTagReplace()
    {
        $this->assertTrue(
            tag_replace("Hello, {user.name} {user.lastname}. You phone: {phone}", [
                'user' => ['name' => 'Ivan', 'lastname' => 'Petrov'],
                'phone' => '123456789'
            ]) === "Hello, Ivan Petrov. You phone: 123456789"
        );
    }
    public function testFileLinesGetContents()
    {
        $this->assertTrue(
            file_lines_get_contents(__DIR__ . '/../LICENSE.md', 3, 3) === "Copyright (c) 2021 BFG <bfg.script@gmail.com>\n"
        );
    }
}

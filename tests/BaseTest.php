<?php
namespace SuggestTest;

use Illuminate\Console\Command;
use Symfony\Component\Console\Output\ConsoleOutput;

class baseTestCommand extends Command
{
    protected $name = "suggest test";
    protected $description = "suggest console";

    public function __construct()
    {
        parent::__construct();
        $this->output = new ConsoleOutput();
    }
}

class baseTest extends \PHPUnit_Framework_TestCase
{
    private $command;

    public function __construct()
    {
        parent::__construct();

        $this->command = new baseTestCommand();
    }

    public function __call($method, $args)
    {
        $this->command->$method($args[0]);
    }
}


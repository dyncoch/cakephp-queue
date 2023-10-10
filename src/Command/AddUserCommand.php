<?php

declare(strict_types=1);

namespace App\Command;

use App\Job\AddUserJob;
use Cake\Command\Command;
use Cake\Console\Arguments;
use Cake\Console\ConsoleIo;
use Cake\Console\ConsoleOptionParser;
use Cake\Queue\QueueManager;

/**
 * AddUser command.
 */
class AddUserCommand extends Command
{
    /**
     * Hook method for defining this command's option parser.
     *
     * @see https://book.cakephp.org/4/en/console-commands/commands.html#defining-arguments-and-options
     * @param \Cake\Console\ConsoleOptionParser $parser The parser to be defined
     * @return \Cake\Console\ConsoleOptionParser The built parser.
     */
    public function buildOptionParser(ConsoleOptionParser $parser): ConsoleOptionParser
    {
        $parser = parent::buildOptionParser($parser);

        return $parser->addArguments([
            'email' => [
                'help' => 'Enter an email e.g. jdoe@foo.com',
                'required' => true,
            ],
            'full_name' => [
                'help' => 'Enter a full name e.g. John Doe',
                'required' => true,
            ],
        ]);
    }

    /**
     * Implement this method with your command's logic.
     *
     * @param \Cake\Console\Arguments $args The command arguments.
     * @param \Cake\Console\ConsoleIo $io The console io
     * @return null|void|int The exit code or null for success
     */
    public function execute(Arguments $args, ConsoleIo $io)
    {
        // [$email, $fullName] = $args->getArguments();
        // dd(compact('email', 'fullName'));

        QueueManager::push(
            AddUserJob::class,
            [
                'email' => $args->getArgument('email'),
                'full_name' => $args->getArgument('full_name'),
            ],
            [
                'config' => 'add_user',
            ]
        );
    }
}

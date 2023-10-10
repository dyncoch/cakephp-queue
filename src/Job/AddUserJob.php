<?php

declare(strict_types=1);

namespace App\Job;

use Cake\Mailer\MailerAwareTrait;
use Cake\ORM\Locator\LocatorAwareTrait;
use Cake\Queue\Job\JobInterface;
use Cake\Queue\Job\Message;
use Cake\Utility\Hash;
use Cake\Utility\Text;
use Interop\Queue\Processor;

/**
 * AddUser job
 */
class AddUserJob implements JobInterface
{

    use LocatorAwareTrait;
    use MailerAwareTrait;
    /**
     * Executes logic for AddUserJob
     *
     * @param \Cake\Queue\Job\Message $message job message
     * @return string|null
     */
    public function execute(Message $message): ?string
    {
        $table = $this->fetchTable('Users');

        $data = $message->getArgument();

        $user = $table->newEntity($data);

        if ($table->save($user) === false) {
            $errors = Text::toList(array_values(Hash::flatten($user->getErrors())));

            /**
             * @var \App\Mailer\NotifyMailer $mailer
             */
            $mailer = $this->getMailer('Notify');
            $mailer->push(
                'failed',
                [
                    $data['email'],
                    $data['full_name'],
                    $errors,
                ],
                ['X-Add-User-Failed' => 'true'],
                ['config' => 'default']
            );



            return Processor::REJECT;
        }
        return Processor::ACK;
    }
}

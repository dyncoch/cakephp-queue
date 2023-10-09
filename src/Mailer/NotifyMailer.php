<?php

declare(strict_types=1);

namespace App\Mailer;

use Cake\Mailer\Mailer;
use Cake\Queue\Mailer\QueueTrait;

/**
 * Notify mailer.
 */
class NotifyMailer extends Mailer
{

    use QueueTrait;

    /**
     * Mailer's name.
     *
     * @var string
     */
    public static $name = 'Notify';

    public function notify(string $emailAddress, string $username, array $data): void
    {
        $this
            ->setTo($emailAddress)
            ->setViewVars($data)
            ->setEmailFormat('both')
            ->setSubject(sprintf('Welcome %s', $username));
    }
}

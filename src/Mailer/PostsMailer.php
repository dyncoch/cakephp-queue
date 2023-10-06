<?php
declare(strict_types=1);

namespace App\Mailer;

use Cake\Mailer\Mailer;

/**
 * Posts mailer.
 */
class PostsMailer extends Mailer
{
    /**
     * Mailer's name.
     *
     * @var string
     */
    public static $name = 'Posts';
}

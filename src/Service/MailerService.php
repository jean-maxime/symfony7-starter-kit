<?php

namespace App\Service;

use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Address;

class MailerService
{
    const FROM = 'mailer@your-domain.com';
    const NAME = 'Your Domain';


    public function __construct (private readonly MailerInterface $mailer) {}

    public function send (
        string $to,
        string $subject,
        string $template,
        array $context): void
    {
        $email = (new TemplatedEmail())->from(new Address(self::FROM, self::NAME))
            ->to($to)
            ->subject($subject)
            ->htmlTemplate($template)
            ->context($context);

        $this->mailer->send($email);
    }
}

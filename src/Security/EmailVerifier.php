<?php

namespace App\Security;

use App\Service\MailerService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\User\UserInterface;
use SymfonyCasts\Bundle\VerifyEmail\Exception\VerifyEmailExceptionInterface;
use SymfonyCasts\Bundle\VerifyEmail\VerifyEmailHelperInterface;

class EmailVerifier
{
    public function __construct (
        private readonly VerifyEmailHelperInterface $verifyEmailHelper,
        private readonly MailerService $mailer,
        private readonly EntityManagerInterface $em) {}

    public function sendEmailConfirmation (string $verifyEmailRouteName, UserInterface $user): void
    {
        $signatureComponents = $this->verifyEmailHelper->generateSignature($verifyEmailRouteName, $user->getId(), $user->getEmail(), ['id' => $user->getId()]);

        $context['signedUrl'] = $signatureComponents->getSignedUrl();
        $context['expiresAtMessageKey'] = $signatureComponents->getExpirationMessageKey();
        $context['expiresAtMessageData'] = $signatureComponents->getExpirationMessageData();

        $this->mailer->send($user->getEmail(), 'Confirmez votre adresse email', 'mail/confirmation_email.html.twig', $context);
    }

    /**
     * @throws VerifyEmailExceptionInterface
     */
    public function handleEmailConfirmation (Request $request, UserInterface $user): void
    {
        $this->verifyEmailHelper->validateEmailConfirmation($request->getUri(), $user->getId(), $user->getEmail());

        $user->setIsVerified(true);

        $this->em->persist($user);
        $this->em->flush();
    }
}

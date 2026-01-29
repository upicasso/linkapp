<?php

namespace App\Controller;

use App\Controller\Admin\LinkCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;


class SecurityController extends AbstractController
{
    /**
     * @var AdminUrlGenerator
     */
    private AdminUrlGenerator $adminUrlGenerator;

    /**
     * @param AdminUrlGenerator $adminUrlGenerator
     */
    public function __construct(AdminUrlGenerator $adminUrlGenerator)
    {
        $this->adminUrlGenerator = $adminUrlGenerator;
    }

    /**
     * @return Response
     */
    #[Route('/', name: 'homepage')]
    public function homepage(): Response
    {
        $url = $this->adminUrlGenerator->setController(LinkCrudController::class)->generateUrl();

        return $this->redirect($url);
    }

    /**
     * @param AuthenticationUtils $authenticationUtils
     * @return Response
     */
    #[Route(path: '/login', name: 'app_login')]
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        $error = $authenticationUtils->getLastAuthenticationError();
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('@EasyAdmin/page/login.html.twig', [
            'error' => $error,
            'last_username' => $lastUsername,
            'page_title' => 'Login to Link app',
            'csrf_token_intention' => 'authenticate',
            'target_path' => $this->generateUrl('admin'),
            'username_label' => 'Your username',
            'password_label' => 'Your password',
            'sign_in_label' => 'Log in',
            'forgot_password_enabled' => false,
            'remember_me_enabled' => true,
            'remember_me_checked' => false,
            'remember_me_label' => 'Remember me',
        ]);
    }

    /**
     * @return void
     */
    #[Route(path: '/logout', name: 'app_logout')]
    public function logout(): void
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }
}

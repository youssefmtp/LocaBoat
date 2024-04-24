<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\User;
use App\Entity\Location;


class UserController extends AbstractController
{

    private $managerRegistry;

    public function __construct(ManagerRegistry $managerRegistry)
    {
        $this->managerRegistry = $managerRegistry;
    }

    #[Route('/connexion', name: 'app_login')]
    public function login(AuthenticationUtils $authenticationUtils, SessionInterface $session): Response
    {
            
        
        $error = $authenticationUtils->getLastAuthenticationError();
        $lastUsername = '';

        if ($error) {
            $lastUsername = $authenticationUtils->getLastUsername();
        }

        if (!$error && !$session->isEmpty()) {
            
            $user = $this->getUser();
   
            $session->set('utilisateurId', $user->getId());
            $session->set('utilisateurNom', $user->getNom());
            $session->set('utilisateurPrenom', $user->getPrenom());
            $session->set('utilisateurEmail', $user->getEmail());
            $session->set('utilisateurAdresse', $user->getAdresse());
            $session->set('utilisateurVille', $user->getVille());
            $session->set('utilisateurCp', $user->getCp());
            $session->set('utilisateurIdRole', $user->getIdRole());
            
        }

        return $this->render('user/index.html.twig', [
            'last_username' => $lastUsername,
            'error' => $error,
        ]);
    }

    #[Route('/deconnexion', name: 'app_logout')]
    public function logout()
    {
        // gére l'action de deconnexion
    }

    #[Route('/moncompte/{id}', name:'moncompte')]
    public function moncompte($id): Response {

        $user = $this->getUser();

        // Vérifier si l'utilisateur est connecté
        if (!$user) {
            return $this->redirectToRoute('app_login');
        }

        $entityManager = $this->managerRegistry->getManager();
        $repo = $entityManager->getRepository(Location::class);
        $lesLocationsByUtilisateur = $repo->findBy(['idUser' => $id]);


        return $this->render('user/user.html.twig', [
            'lesLocationsByUtilisateur' => $lesLocationsByUtilisateur,
        ]);
    }
}

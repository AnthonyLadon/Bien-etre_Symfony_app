<?php

namespace App\Controller\Admin;

use App\Entity\Abus;
use App\Entity\Images;
use App\Entity\Newsletter;
use App\Entity\Utilisateur;
use App\Entity\CategorieService;
use App\Controller\Admin\AbusCrudController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Controller\Admin\NewsletterCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

class DashboardController extends AbstractDashboardController
{

    public function __construct(
        private AdminUrlGenerator $adminUrlGenerator
    ){}

    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
         //return parent::index();

         // Genere une route pour afficher la page d'administration
         $url = $this->adminUrlGenerator
         ->setController(UtilisateurCrudController::class)
         ->generateUrl();
         return $this->redirect($url);

        // Option 1. You can make your dashboard redirect to some common page of your backend
        //
        //$adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        //return $this->redirect($adminUrlGenerator->setController(CategorieServiceCrudController::class)->generateUrl());

        // Option 2. You can make your dashboard redirect to different pages depending on the user
        //
        // if ('jane' === $this->getUser()->getUsername()) {
        //     return $this->redirect('...');
        // }

        // Option 3. You can render some custom template to display a proper dashboard with widgets, etc.
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        //
        // return $this->render('some/path/my-dashboard.html.twig');


    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Admin Bien-Être');
    }

    // Gestion des onglets qui seront visibles dans l'interface d'admin
    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoRoute('Retour sur le site', 'fas fa-home', 'home');
        yield MenuItem::linkToCrud('Utilisateurs', 'fa fa-tags', Utilisateur::class);
        yield MenuItem::linkToCrud('Catégories', 'fa fa-tags', CategorieService::class);
        yield MenuItem::linkToCrud('Abus', 'fa fa-tags',Abus::class);
        yield MenuItem::linkToCrud('Newsletter', 'fa fa-tags', Newsletter::class);
    }
}

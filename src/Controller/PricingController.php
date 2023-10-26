<?php

namespace App\Controller;

use App\Entity\PricingPlan;
use App\Entity\PricingPlanFeature;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PricingController extends AbstractController
{
    #[Route('/pricing', name: 'app_pricing')]
    public function index(): Response
    {
        $pricingPlans = $this->getDoctrine()
        ->getRepository(PricingPlan::class)
        ->findAll();
        
        $features = $this->getDoctrine()
        ->getRepository(PricingPlanFeature::class)
        ->findAll();
        

        return $this->render('pricing/index.html.twig', [
            'pricing_plans' => $pricingPlans,
            'features' => $features
        ]);
    }
}

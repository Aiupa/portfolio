<?php

namespace App\Controller\BackOffice;

use App\Entity\Skill;
use App\Form\SkillType;
use App\Repository\SkillRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @package App\Controller\BackOffice
 * @Route("/admin/skills")
 */
class SkillController extends AbstractController
{
    /**
     * @Route(name="skill_manage")
     * @param SkillRepository $skillRepository
     */
    public function manage(SkillRepository $skillRepository): Response
    {
        $skills = $skillRepository->findAll();

        return $this->render("back_office/skill/manage.html.twig", [
            "skills" => $skills
        ]);
    }

    /**
     * @Route("/create", name="skill_create")
     * @param Request $request
     */
    public function create(Request $request): Response
    {
        $skill = new Skill();
        $form = $this->createForm(SkillType::class, $skill)->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->persist($skill);
            $this->getDoctrine()->getManager()->flush();
            $this->addFlash("success", "Succès ! La compétence est ajoutée.");

            return $this->redirectToRoute("skill_manage");
        }
        
        return $this->render("back_office/skill/create.html.twig", [
            "form" => $form->createView()
        ]);
    }

    public function update()
    {
    }

    public function delete()
    {
    }
}

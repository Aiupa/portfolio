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

    public function create()
    {

    }

    public function update()
    {

    }

    public function delete()
    {

    }
}
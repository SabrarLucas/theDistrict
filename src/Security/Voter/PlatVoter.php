<?php

namespace App\Security\Voter;
use App\Entity\Plat;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;
use Symfony\Component\Security\Core\User\UserInterface;

class PlatVoter extends Voter
{
    const EDIT = 'PLAT_EDIT';
    const DELETE = 'PLAT_DELETE';

    private $security;

    public function __construct(Security $security)
    {
        $this->security = $security;
    }

    protected function supports(string $attribute, $plat): bool
    {
        if(!in_array($attribute, [self::EDIT, self::DELETE])) {
            return false;
        }
        if(!$plat instanceof Plat) {
            return false;
        }
        return true;
    }

    protected function voteOnAttribute($attribute, $plat, TokenInterface $token): bool
    {
        // On recupere l'user a partir du toke
        $user = $token->getUser();

        if(!$user instanceof UserInterface) {
            return false;
        } 

        // On verifie si l'user est admin
        if($this->security->isGranted('ROLE_ADMIN')) {
            return true;
        }

        // On verifi les permissions
        switch($attribute) {
            case self::EDIT:
                // Si l'user peut editer
                return $this->canEdit();
                break;
            case self::DELETE:
                // Si l'user peut supprimer
                return $this->canDelete();
                break;
        }
    }

    private function canEdit()
    {
        return $this->security->isGranted('ROLE_PRODUCT_ADMIN');
    }
    private function canDelete()
    {
        return $this->security->isGranted('ROLE_PRODUCT_ADMIN');
    }
}
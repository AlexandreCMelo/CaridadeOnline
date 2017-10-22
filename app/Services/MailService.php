<?php

namespace Charis\Service;

use Charis\Models\Organization;
use Charis\Models\OrganizationRole;
use Illuminate\Database\Eloquent\Collection;
use Mail;
use Charis\Models\User;
use Charis\Mail\Welcome;
use Charis\Mail\DefaultMessage;
use Charis\Repositories\Organization\OrganizationRepository;
use Charis\Repositories\User\UserRepository;
use Illuminate\Mail\Mailable;

/**
 * Class MailService
 * @package Charis\Service
 */
class MailService extends AbstractService
{

    /**
     * @var UserRepository
     */
    protected $userRepository = null;

    /**
     * @var OrganizationRepository
     */
    protected $organizationRepository = null;

    /**
     * Sends the message using the object content and subject
     *
     * @param User $user
     * @param $subject
     * @param $content
     * @param User|null $from
     * @return mixed
     */
    protected function send(User $user, $subject, $content, User $from = null)
    {
        $from = isset($from) ? env('MAIL_FROM_ADDRESS') : $from->{User::EMAIL};

        return Mail::to($user)->send(new DefaultMessage($from, $subject, $content));
    }

    /**
     * Sends the an email to the user using an template instance
     *
     * @param User $user
     * @param Mailable $template
     * @return mixed
     */
    public function sendFromTemplateToUser(User $user, Mailable $template)
    {
        return Mail::to(
            $user->{User::EMAIL}
        )->send($template);
    }

    /**
     * Sends the welcome email template
     *
     * @param User $user
     * @return mixed
     */
    public function sendUserWelcomeMail(User $user)
    {
        return $this->sendFromTemplateToUser($user, New Welcome($user));
    }

    /**
     * Sends the an email to the user using the default template and setting the subject and content
     *
     * @param User $to
     * @param $subject
     * @param $content
     * @param bool $fromAddress
     * @param bool $fromName
     * @return mixed
     */
    public function sendToUser(User $to, $subject, $content, $fromAddress = false, $fromName = false)
    {
        return Mail::to($to->{User::EMAIL})->send(
            New DefaultMessage(
                empty($from) ? env('MAIL_FROM_ADDRESS') : $fromAddress,
                $subject,
                $content,
                $fromName)
        );
    }

    /**
     * Sends the an email to the userId using the default template and setting the subject and content
     *
     * @param $users
     * @param $subject
     * @param $content
     * @param User|null $from
     * @return mixed
     */
    public function sendToUserId($users, $subject, $content, User $from = null)
    {
        if (empty($users)) {
            return false;
        }

        if(!$users instanceof Collection) {
            $users = $this->getUserRepository()->findMany(
                is_array($users) ? $users : [$users]
            );
        }

        foreach ($users as $user) {
            $this->send($user, $subject, $content, $from);
        }
    }

    /**
     * @param Organization $organization
     * @param User $from
     * @param $subject
     * @param $content
     */
    public function sendToOrganization(Organization $organization, User $from, $subject, $content)
    {
        $allowedOrganizationRoles = [
            OrganizationRole::ID_ORGANIZATION_MANAGER,
            OrganizationRole::ID_ORGANIZATION_FOLLOWER
        ];


        foreach ($allowedOrganizationRoles as $organizationRole) {
            $this->sendToOrganizationRoleUsers($organization, $organizationRole, $subject, $content, $from);
        }
    }

    /**
     * @param Organization $organization
     * @param $organizationRole
     * @param $subject
     * @param $content
     * @param User|null $from
     * @return bool
     */
    public function sendToOrganizationRoleUsers(
        Organization $organization,
        $organizationRole,
        $subject,
        $content,
        User $from = null
    ) {
        switch ($organizationRole) {
            case OrganizationRole::ID_ORGANIZATION_FOLLOWER:
                $users = $organization->followers();
                break;
            case OrganizationRole::ID_ORGANIZATION_MANAGER:
                $users = $organization->managers();
                break;
            case OrganizationRole::ID_ORGANIZATION_PARTNER:
                $users = $organization->users();
                break;
        }
        return $this->sendToUserId($users, $subject, $content, $from);
    }

    /**
     * @param Organization $organization
     * @param $subject
     * @param $content
     * @param User|null $from
     * @return bool
     */
    public function sendToOrganizationManagers(Organization $organization, $subject, $content, User $from = null)
    {
        return $this->sendToOrganizationRoleUsers($organization, OrganizationRole::ID_ORGANIZATION_MANAGER, $subject, $content, $from);
    }

    /**
     * @param Organization $organization
     * @param $subject
     * @param $content
     * @param User|null $from
     * @return bool
     */
    public function sendToOrganizationPartners(Organization $organization, $subject, $content, User $from = null)
    {
        return $this->sendToOrganizationRoleUsers($organization, OrganizationRole::ID_ORGANIZATION_PARTNER, $subject, $content, $from);
    }

    /**
     * @param Organization $organization
     * @param $subject
     * @param $content
     * @param User|null $from
     * @return bool
     */
    public function sendToOrganizationFollowers(Organization $organization, $subject, $content, User $from = null)
    {
        return $this->sendToOrganizationRoleUsers($organization, OrganizationRole::ID_ORGANIZATION_FOLLOWER, $subject, $content, $from);
    }

    /**
     * @return UserRepository
     */
    protected function getUserRepository()
    {
        if (null === $this->userRepository) {
            $this->userRepository = new UserRepository();
        }
        return $this->userRepository;
    }


    /**
     * @return OrganizationRepository
     */
    protected function getOrganizationRepository()
    {
        if (null === $this->organizationRepository) {
            $this->organizationRepository = new OrganizationRepository();
        }
        return $this->organizationRepository;
    }
}

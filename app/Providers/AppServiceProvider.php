<?php

namespace Charis\Providers;

use Charis\Http\ViewComposers\MenuComposer;
use Charis\Models\Country;
use Charis\Models\File;
use Charis\Models\OrganizationRole;
use Charis\Repositories\Activity\ActivityRepository;
use Charis\Repositories\Activity\IActivityRepository;
use Charis\Repositories\Category\CategoryRepository;
use Charis\Repositories\Comment\ICommentRepository;
use Charis\Repositories\Comment\ICommentTypeRepository;
use Charis\Repositories\Comment\TypeRepository;
use Charis\Repositories\Document\DocumentRepository;
use Charis\Repositories\Document\IDocumentRepository;
use Charis\Repositories\Document\IDocumentTypeRepository;
use Charis\Repositories\File\FileRepository;
use Charis\Repositories\File\IFileRepository;
use Charis\Repositories\Organization\IOrganizationRepository;
use Charis\Repositories\Organization\IRoleRepository;
use Charis\Repositories\Organization\RoleRepository;
use Charis\Repositories\System\ICountryRepository;
use Charis\Repositories\System\ILocaleRepository;
use Charis\Repositories\System\ITimezoneRepository;
use Charis\Repositories\System\LocaleRepository;
use Charis\Repositories\System\TimezoneRepository;
use Charis\Repositories\Target\ITargetRepository;
use Charis\Repositories\Target\TargetRepository;
use Charis\Repositories\User\ISocialRepository;
use Charis\Repositories\User\IUserRepository;
use Charis\Repositories\User\SocialRepository;
use Charis\Repositories\User\UserRepository;
use Charis\Service\AbstractService;
use Charis\Service\FileService;
use Charis\Service\SocialService;
use Illuminate\Support\ServiceProvider;
use \Charis\Repositories\Comment\CommentRepository;
use Charis\Repositories\Category\ICategoryRepository;
use View;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('nav', MenuComposer::class);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

        $this->app->bind(
            AbstractService::class,
            FileService::class
        );

        $this->app->bind(
            AbstractService::class,
            SocialService::class
        );

        $this->app->bind(
            ICategoryRepository::class,
            CategoryRepository::class
        );

        $this->app->bind(
            IActivityRepository::class,
            ActivityRepository::class
        );

        $this->app->bind(
            ITargetRepository::class,
            TargetRepository::class
        );

        $this->app->bind(
            ICommentRepository::class,
            CommentRepository::class
        );

        $this->app->bind(
            ICommentTypeRepository::class,
            TypeRepository::class
        );

        $this->app->bind(
            IDocumentRepository::class,
            DocumentRepository::class
        );

        $this->app->bind(
            IDocumentTypeRepository::class,
            \Charis\Repositories\Document\TypeRepository::class
        );

        $this->app->bind(
            IFileRepository::class,
            FileRepository::class
        );

        $this->app->bind(
            IOrganizationRepository::class,
            OrganizationRole::class
        );

        $this->app->bind(
            IRoleRepository::class,
            RoleRepository::class
        );

        $this->app->bind(
            ICountryRepository::class,
            Country::class
        );

        $this->app->bind(
            ILocaleRepository::class,
            LocaleRepository::class
        );

        $this->app->bind(
            ITimezoneRepository::class,
            TimezoneRepository::class
        );

        $this->app->bind(
            ITargetRepository::class,
            TargetRepository::class
        );

        $this->app->bind(
            IUserRepository::class,
            UserRepository::class
        );

        $this->app->bind(
            ISocialRepository::class,
            SocialRepository::class
        );

        $this->app->bind(
            AbstractService::class,
            FileService::class
        );

    }
}

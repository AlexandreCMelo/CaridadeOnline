<?php

namespace Charis\Console\Commands;

use Charis\Repositories\Organization\OrganizationRepository;
use Illuminate\Console\Command;
use MAbadir\ElasticLaravel\ElasticClient;

class IndexIntializationCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'es:start';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates organization Indexes';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $elasticClient = null;
    protected $organizationRepository = null;

    /**
     * Settings
     * @var array
     */
    protected $params = [
        'index' => 'charis',
        'body' => [
            'settings' => [
                'number_of_shards' => 3,
                'number_of_replicas' => 2
            ],
            'mappings' => [
                'organizations' => [
                    '_source' => [
                        'enabled' => true
                    ],
                    'properties' => [
                        'name' => [
                            'type' => 'string',
                            'analyzer' => 'standard'
                        ],
                        'description' => [
                            'type' => 'string',
                            'analyzer' => 'standard'
                        ]
                    ]
                ]
            ]
        ]
    ];


    /**
     * IndexIntializationCommand constructor.
     * @param ElasticClient $elasticClient
     */
    public function __construct(ElasticClient $elasticClient, OrganizationRepository $organizationRepository)
    {
        parent::__construct();

        $this->elasticClient = $elasticClient;
        $this->organizationRepository = $organizationRepository;
    }



    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->elasticClient->dropIndex(
            ['index' => 'charis']
        );

        $this->elasticClient->createIndex(
            $this->params
        );

        foreach($this->organizationRepository->findAll() as $organization) {
            $this->elasticClient->index([
               'index'=>'charis',
               'type'=>'organization',
               'id'=>$organization->id,
               'body'=>[
                   'name' => $organization->name,
                   'description' => $organization->description,
               ],
            ]);
        }
    }
}

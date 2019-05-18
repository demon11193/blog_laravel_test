<?php

namespace App\Console\Commands;

use App\Blog\Post;
use App\Blog\Revision;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Database\Eloquent\Collection;

class RemoveOldRevisions extends Command
{

    private const DATE_LIMIT = 30;
    private const REVISIONS_LIMIT = 5;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'blog:remove_old_revisions';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Удаляет ревизии старше 30 дней, но оставляет минимум 5 последних';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $posts = $this->getFilteredPosts();
        $revisionIdsForDelete = $this->filterRevisionIdsForDelete($posts);
        if (!empty($revisionIdsForDelete)) {
            Revision::destroy($revisionIdsForDelete);
        }
    }

    private function getFilteredPosts() {
        return Post::has('revisions', '>', self::REVISIONS_LIMIT)
            ->select(['id', 'actual_revision_id'])
            ->with([
                'revisions' => function($query) {
                    $query
                        ->select(['id', 'created_at', 'post_id'])
                        ->orderBy('created_at', 'DESC');
                }
            ])
            ->get();
    }

    private function filterRevisionIdsForDelete(Collection $posts):array {
        $revisionIdsForDelete = [];
        $date = Carbon::now()->subDays(self::DATE_LIMIT);
        foreach ($posts as $post) {
            $i = 1;
            foreach ($post->revisions as $revision) {
                if ($post->actual_revision_id == $revision->id) {
                    continue;
                }
                $i++;
                if ($i <= self::REVISIONS_LIMIT) {
                    continue;
                }
                if ($revision->created_at > $date) {
                    continue;
                }
                $revisionIdsForDelete[] = $revision->id;
            }
        }
        return $revisionIdsForDelete;
    }
}

<?php

namespace App\Console\Commands;

use App\News;
use Illuminate\Console\Command;

class InsertDummyNews extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'news:dummy';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        app()->setLocale('en');

        $news1 = new News();
        $news1->title = 'My Awesome Post';
        $news1->description = 'This is some cool paragraph';
        $news1->save();

        $news2 = new News();
        $news2->title = 'The Second Amazing Subject';
        $news2->description = 'A very nice text about how things work somewhere';
        $news2->save();

        app()->setLocale('tr');

        $news1->title = 'Mon Super Article';
        $news1->description = 'Ceci est le contenu stylé de mon article';
        $news1->save();

        $news2->title = 'Le Deuxième sujet génial';
        $news2->description = 'Un chouette texte qui vous raconte des choses';
        $news2->save();
    }
}
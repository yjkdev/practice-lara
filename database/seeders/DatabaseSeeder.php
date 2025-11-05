<?php
namespace Database\Seeders;

use App\Models\Author;
use App\Models\Book;
use App\Models\BookDetail;
use App\Models\Publisher;

// use App\Models\User;
// use App\Models\Article;
// use App\Models\Comment;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        /* $this->call([
            AuthorSeeder::class,
            PublisherSeeder::class,
        ]); */

        Author::factory(10)->create();

        Publisher::factory(5)->create();
        
        Book::factory(30)->create()->each(function ($book) {
            BookDetail::factory()->create(['book_id' => $book->id]);
        });

        /* // 10명의 사용자를 생성
        User::factory(10)->create()->each(function ($user) {
            // 각 사용자는 1~3개의 게시글을 작성
            Article::factory(rand(1, 3))->create(['user_id' => $user->id])
                ->each(function ($article) {
                    // 각 게시글에는 0~5개의 댓글이 달림
                    Comment::factory(rand(0, 5))->create(['article_id' => $article->id]);
                });
        }); */
    }
}

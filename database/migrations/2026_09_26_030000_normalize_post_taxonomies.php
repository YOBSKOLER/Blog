<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

return new class extends Migration
{
    public function up(): void
    {
        DB::table('post')->select('id', 'category', 'tag')->orderBy('id')->chunkById(100, function ($posts): void {
            foreach ($posts as $post) {
                if (filled($post->category)) {
                    $category = DB::table('categories')->where('slug', Str::slug($post->category))->first();
                    $categoryId = $category?->id ?? DB::table('categories')->insertGetId([
                        'name' => $post->category,
                        'slug' => Str::slug($post->category) ?: 'category-'.$post->id,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);

                    DB::table('category_post')->updateOrInsert([
                        'post_id' => $post->id,
                        'category_id' => $categoryId,
                    ]);
                }

                if (filled($post->tag)) {
                    $tag = DB::table('tags')->where('slug', Str::slug($post->tag))->first();
                    $tagId = $tag?->id ?? DB::table('tags')->insertGetId([
                        'name' => $post->tag,
                        'slug' => Str::slug($post->tag) ?: 'tag-'.$post->id,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);

                    DB::table('post_tag')->updateOrInsert([
                        'post_id' => $post->id,
                        'tag_id' => $tagId,
                    ]);
                }
            }
        });

        Schema::table('post', function (Blueprint $table): void {
            $table->dropColumn(['category', 'tag']);
        });
    }

    public function down(): void
    {
        Schema::table('post', function (Blueprint $table): void {
            $table->string('category')->nullable();
            $table->string('tag')->nullable();
        });

        DB::table('post')->select('id')->orderBy('id')->chunkById(100, function ($posts): void {
            foreach ($posts as $post) {
                $category = DB::table('category_post')
                    ->join('categories', 'categories.id', '=', 'category_post.category_id')
                    ->where('category_post.post_id', $post->id)
                    ->value('categories.name');
                $tag = DB::table('post_tag')
                    ->join('tags', 'tags.id', '=', 'post_tag.tag_id')
                    ->where('post_tag.post_id', $post->id)
                    ->value('tags.name');

                DB::table('post')->where('id', $post->id)->update([
                    'category' => $category,
                    'tag' => $tag,
                ]);
            }
        });
    }
};

<x-layout>
    <!-- Page content here -->
    <div class="p-8">
        <header class="uppercase text-3xl text-justify text-semibold">
            new post
        </header>

        <form action="{{ route('dashboard.store.post') }}" method="POST">
            @csrf
            <fieldset
                class="fieldset grid gap-4 bg-base-200 border-base-300 rounded-box w-full max-w-3xl border p-4 md:grid-cols-2"
            >
                <legend class="fieldset-legend uppercase">Post details</legend>

                <div>
                    <label class="label">Title</label>
                    <input
                        id="title"
                        type="text"
                        name="title"
                        class="input w-full"
                        placeholder="Post Title"
                        value="{{ old('title') }}"
                    />
                    @error('title')<p class="text-error">{{ $message }}</p>@enderror
                </div>

                <div class="row-span-2">
                    <label class="label">Slug</label>
                    <input
                        id="slug"
                        type="text"
                        name="slug"
                        class="input w-full"
                        placeholder="my-post-slug"
                        value="{{ old('slug') }}"
                    />
                    @error('slug')<p class="text-error">{{ $message }}</p>@enderror
                </div>

                <div class="col-span-2">
                    <label for="content" class="label">Content</label>
                    <textarea
                        id="content"
                        name="content"
                        class="textarea rounded-md h-60.75 w-full"
                        placeholder="Write your content here..."
                    >{{ old('content') }}</textarea>
                    @error('content')<p class="text-error">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="label">Author</label>
                    <p class="input w-full">{{ auth()->user()?->name ?? 'Guest author' }}</p>
                </div>
                <div>
                    <label for="category" class="label">Post Category</label>
                    <select
                        id="category"
                        name="category_ids[]"
                        multiple
                        class="select select-neutral w-full"
                    >
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" @selected(in_array($category->id, old('category_ids', [])))>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('category_ids')<p class="text-error">{{ $message }}</p>@enderror
                    @error('category_ids.*')<p class="text-error">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label for="Publishing_date">Publishing Date</label>
                    <input
                        id=""
                        type="date"
                        name="published_at"
                        class="input w-full"
                        value="{{ old('published_at') }}"
                    />
                    @error('published_at')<p class="text-error">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label for="tag">Tag</label>
                    <select
                        id="tag"
                        name="tag_ids[]"
                        multiple
                        class="select select-neutral w-full"
                    >
                        @foreach ($tags as $tag)
                            <option value="{{ $tag->id }}" @selected(in_array($tag->id, old('tag_ids', [])))>
                                {{ $tag->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('tag_ids')<p class="text-error">{{ $message }}</p>@enderror
                    @error('tag_ids.*')<p class="text-error">{{ $message }}</p>@enderror
                </div>
            </fieldset>
            <div class="mt-4 flex justify-start gap-6">
                <a href="{{ route('dashboard.posts') }}" class="btn btn-outline">Cancel</a>
                <button type="submit" class="btn btn-primary">Publish</button>
            </div>
        </form>
    </div>
</x-layout>

<x-layout>

    <!-- Page content here -->
    <div class="p-8">
        <header class="uppercase text-3xl text-justify text-semibold">
            new post
        </header>

        <form action="{{ route('dashboard.create.post') }}" method="POST">
            @csrf
            <fieldset
                class="fieldset grid gap-4 bg-base-200 border-base-300 rounded-box w-full max-w-3xl border p-4 md:grid-cols-2">
                <legend class="fieldset-legend uppercase">
                    Post details
                </legend>

                <div>
                    <label class="label">Title</label>
                    <input id="title" type="text" name="title" class="input w-full" placeholder="Post Title" />
                </div>

                <div class="row-span-2">
                    <label class="label">Slug</label>
                    <input id="slug" type="text" name="slug" class="input w-full" placeholder="my-post-slug" />
                </div>

                <div class="col-span-2">
                    <label for="content" class="label">Content</label>
                    <textarea id="content" name="content" class="textarea rounded-md h-60.75 w-full" placeholder="Write your content here..."></textarea>
                </div>
                <div>
                    <label class="label">Author</label>
                    <input id="" type="text" name="Author" class="input w-full" placeholder="Name" />
                </div>
                <div>
                    <label for="category" class="label">Post Category</label>
                    <select id="category" name="category" class="select select-neutral w-full">
                        <option disabled selected>Choose a category</option>
                        <option>Technology</option>
                        <option>Design</option>
                        <option>Business</option>
                    </select>
                </div>
                <div>
                    <label for="Publishing_date">Publishing Date</label>
                    <input id="" type="date" name="published_at" id="Publishing_date" class="input w-full" />
                </div>
                <div>
                    <label for="tag">Tag</label>
                    <input id="" type="text" name="tag" id="tag" class="input w-full" placeholder="Enter tags..." />
                </div>
            </fieldset>
            <div class="mt-4 flex justify-start gap-6">
                <button type="submit" form="" class="btn btn-outline">Cancel</button>
                <button type="submit" class="btn btn-primary">Publish</button>
            </div>
        </form>
    </div>


</x-layout>

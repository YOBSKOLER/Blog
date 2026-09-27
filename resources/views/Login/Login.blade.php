@vite ('resources/css/app.css')
<main class="mx-auto max-w-md p-8">
    <h1 class="mb-6 text-2xl font-bold">Sign in</h1>
    <form action="{{ route('login.store') }}" method="POST" class="grid gap-4">
        @csrf
        <label class="form-control">
            <span class="label">Email</span>
            <input class="input input-bordered" type="email" name="email" value="{{ old('email') }}" required
                autofocus />
            @error('email')
                <span class="text-error">{{ $message }}</span>
            @enderror
        </label>
        <label class="form-control">
            <span class="label">Password</span>
            <input class="input input-bordered" type="password" name="password" required />
            @error('password')
                <span class="text-error">{{ $message }}</span>
            @enderror
        </label>
        <button class="btn btn-primary" type="submit">Sign in</button>
    </form>
    <p class="mt-4">New here? <a class="link" href="{{ route('register') }}">Create an account</a></p>
</main>

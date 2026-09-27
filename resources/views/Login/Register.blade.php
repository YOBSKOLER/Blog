@vite ('resources/css/app.css')
<main class="mx-auto max-w-md p-8">
    <h1 class="mb-6 text-2xl font-bold">Create an account</h1>
    <form action="{{ route('register.store') }}" method="POST" class="grid gap-4">
        @csrf
        <label class="form-control">
            <span class="label">Name</span>
            <input class="input input-bordered" type="text" name="name" value="{{ old('name') }}" required />
            @error('name')
                <span class="text-error">{{ $message }}</span>
            @enderror
        </label>
        <label class="form-control">
            <span class="label">Email</span>
            <input class="input input-bordered" type="email" name="email" value="{{ old('email') }}" required />
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
        <label class="form-control">
            <span class="label">Confirm password</span>
            <input class="input input-bordered" type="password" name="password_confirmation" required />
        </label>
        <button class="btn btn-primary" type="submit">Create account</button>
    </form>
    <p class="mt-4">Already registered? <a class="link" href="{{ route('login') }}">Sign in</a></p>
</main>

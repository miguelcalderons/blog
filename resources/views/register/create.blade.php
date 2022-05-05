<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10 bg-gray-200 p-6 rounded-xl">
            <h1 class="text-center font-bold text-xl">Register</h1>
            <form method="post" class="mt-10" action="/register">
                @csrf

                <x-form.input name="name"></x-form.input>
                <x-form.input name="username"></x-form.input>
                <x-form.input name="email" type="email"></x-form.input>
                <x-form.input name="password" type="password" autocomplete="new-password" ></x-form.input>

                <x-form.button>Submit</x-form.button>
            </form>
        </main>
    </section>
</x-layout>

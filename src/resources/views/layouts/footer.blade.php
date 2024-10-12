<footer class="z-20 grid bg-bc px-4">
    <div class="-mt-1 flex items-center">
        <h1 class="pt-1 text-2xl font-bold"><a href="/"><img class="h-auto w-12" src="{{ asset('images/logo.png') }}"
                    alt="Logo"></a></h1>
        <div class="ml-auto hidden items-center gap-4 md:flex">
            <x-users.user-nav-dropdown />
            <x-posts.post-form-modal-icon />
        </div>
    </div>

</footer>

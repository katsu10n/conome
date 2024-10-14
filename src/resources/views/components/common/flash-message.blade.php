@if (session('success') || session('error'))
    <div class="fixed left-0 right-0 top-0 z-50 text-center font-bold transition-opacity duration-300" id="flash-message">
        @if (session('success'))
            <div class="rounded bg-green-500 py-2 text-white shadow">
                {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div class="rounded bg-red-500 py-2 text-white shadow">
                {{ session('error') }}
            </div>
        @endif
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const flashMessage = document.getElementById('flash-message');
            if (flashMessage) {
                setTimeout(function() {
                    flashMessage.style.opacity = '0';
                    setTimeout(function() {
                        flashMessage.remove();
                    }, 300); // フェードアウト
                }, 3000); // 3秒後に消え始める
            }
        });
    </script>
@endif

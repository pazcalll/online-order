<!-- Back to top button -->
<div class="back-to-top"></div>

<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-white wow fadeInDown">
        <div class="container">
            <a href="javascript:void(0)" class="navbar-brand">Penghitung <span class="text-primary">Pesanan Online</span></a>

            <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-collapse collapse" id="navbarContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active" id="home-a">
                        <a class="nav-link" href="javascript:void(0)">Beranda</a>
                    </li>
                    <li class="nav-item" id="history-a">
                        <a class="nav-link" href="javascript:void(0)">Riwayat</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>

<script>
    $('#history-a').on('click', function () {
        $('.nav-item').removeClass('active')
        $('#history-a').addClass('active')
        $('.main-page').html(`
        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="width:100%;margin:auto;background:#fff;" width="50px" height="50px" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid">
            <circle cx="50" cy="50" fill="none" stroke="#00d5ff" stroke-width="10" r="35" stroke-dasharray="164.93361431346415 56.97787143782138">
                <animateTransform attributeName="transform" type="rotate" repeatCount="indefinite" dur="1s" values="0 50 50;360 50 50" keyTimes="0;1"></animateTransform>
            </circle>
        </svg>
        `)
        $.ajax({
            url: "{{ route('get-history-page') }}",
            type: "GET",
            success: function(res) {
                $('.main-page').html(res)
            }
        })
    })
    $('#home-a').on('click', function () {
        $('.nav-item').removeClass('active')
        $('#home-a').addClass('active')
        $('.main-page').html(`
        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="width:100%; margin:auto;background:#fff;" width="50px" height="50px" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid">
            <circle cx="50" cy="50" fill="none" stroke="#00d5ff" stroke-width="10" r="35" stroke-dasharray="164.93361431346415 56.97787143782138">
                <animateTransform attributeName="transform" type="rotate" repeatCount="indefinite" dur="1s" values="0 50 50;360 50 50" keyTimes="0;1"></animateTransform>
            </circle>
        </svg>
        `)
        $.ajax({
            url: "{{ route('get-home-page') }}",
            type: "GET",
            success: function (res) {
                $('.main-page').html(res)
            }
        })
    })
</script>
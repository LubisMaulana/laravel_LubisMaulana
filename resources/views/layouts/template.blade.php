<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.min.css" rel="stylesheet">
    <title>{{ $title }}</title>
    <style>
        @media (max-width: 991.7px){
            .navbar-nav {
                margin-top: 10px;
                margin-left: 0px!important;
            }

            .nav-item a{
                padding-left: 15px;
            }
            .nav-item button{
                padding-left: 15px;
            }
            .form-control{
                margin: 15px!important;
            }
        }
    </style>
    @yield('css')
</head>
<body>
    <h1 class="m-5" style="text-align: center">{{ $page }}</h1>

    <nav class="navbar navbar-expand-lg bg-body-tertiary mb-3">
        <div class="container-fluid p-0" style="background-color: rgb(59, 213, 213);">
            <button class="navbar-toggler ms-3 mt-2 mb-2" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 gap-3 ms-3">
                    <li class="nav-item" style="{{ $page == 'Administrasi Rumah Sakit' || $page == 'Add Rumah Sakit' || $page == 'Edit Rumah Sakit' ? 'background-color: rgb(63, 187, 187);' : '' }}">
                        <a href="/rumah-sakit" class="nav-link active text-light fs-5 fw-bold" aria-current="page">Rumah Sakit</a>
                    </li>
                    <li class="nav-item">
                        <a href="/pasien" class="nav-link active text-light fs-5 fw-bold" style="{{ $page == 'Administrasi Pasien' || $page == 'Add Pasien' || $page == 'Edit Pasien' ? 'background-color: rgb(63, 187, 187);' : '' }}" aria-current="page">Pasien</a>
                    </li>
                    <li class="nav-item">
                        <form action="/logout" method="post">
                            @csrf
                            <button type="submit" class="nav-link text-light fs-5 fw-bold">Logout</button>
                        </form>
                    </li>
                </ul>
                <div class="d-flex" role="search">
                    <input class="form-control me-4" type="search" id="keyword-search" placeholder="Search" aria-label="Search" onkeyup="searchItem()" {{ ($page == 'Administrasi Rumah Sakit' || $page == 'Administrasi Pasien') ? '' : 'hidden' }}>
                </div>
            </div>
        </div>
    </nav>
    
    <div class="header mb-3" style="display: flex;justify-content: center;align-items: center;gap: 20px;">
        <h4>{{ $titleHeader }}</h4>
        <a href="{{ $page == 'Administrasi Rumah Sakit' ? '/rumah-sakit/add' : 
        (
            $page == 'Add Rumah Sakit' || $page == 'Edit Rumah Sakit' ? '/rumah-sakit' : 
            (
                $page == 'Administrasi Pasien' ? '/pasien/add' : 
                (
                    $page == 'Add Pasien' || $page == 'Edit Pasien' ? '/pasien' : ''
                )
            )
        ) }}" class="btn-tambah" style="
            padding: 10px;
            font-size: 20px;
            border-style: none;
            border-radius: 10px;
            background-color:rgb(59, 213, 213);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            gap: 15px;
        ">{{ $aksi }}</a>
        @if ($page == 'Administrasi Pasien')
            <select class="form-select form-select-lg border-dark" id="selectRS" style="width: 150px">
                <option value="" selected>Pilih...</option>
                @foreach ($listRS as $rs)
                    <option value="{{ $rs->nama }}">{{ $rs->nama }}</option>
                @endforeach
            </select>
        @endif
    </div>

    <div class="container">
        @yield('container')
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script>
        const searchItem = () =>{
            const keyword = document.getElementById('keyword-search').value.trim();

            const itemsTabel = document.getElementsByClassName('row-items');
            for (let item of itemsTabel){
                let status = false;

                const rows = item.getElementsByTagName('td');

                for (let i = 0; i < rows.length; i++) {
                    if (rows[i].innerText.toLowerCase().includes(keyword.toLowerCase())) {
                        status = true;
                    }
                }

                if(!status){
                    item.hidden = true;
                }else{
                    item.hidden = false;
                }
            }
        }

        $('#selectRS').on('change', function(){
            $('.row-items').each(function() {
                let status = false;
                const rows = $(this).find('td');
                
                rows.each(function() {
                    if ($(this).text().toLowerCase() === $('#selectRS').val().toLowerCase()) {
                        status = true;
                        return false;
                    }
                });

                if (!status) {
                    $(this).hide();
                } else {
                    $(this).show();
                }
            });
        });
    </script>
    @yield('js')
</body>
</html>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/balanceInfo.css') }}">
    <title>Informasi Saldo</title>
</head>
<body>
    <div class="header">
        <p class="logo">INTERNET BANKING SEJAHTERA</p>
        <ul>
            <li><a href="{{ route('home', ['id' => $account->id]) }}">Home</a></li>
            <li><a href="{{ url('/customer-service') }}" target="_blank">Customer Service</a></li>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="logOut">Log Out</button>
            </form>
        </ul>
    </div>

    <div class="main-content">
        <div class="sidebar">
            <ul class="menu">
                <li>
                    <a href="#" class="menu-item" onclick="toggleSubMenu('account-info')">Informasi Rekening</a>
                    <ul class="sub-menu" id="account-info">
                        <li><a href="{{ route('balanceInfo', ['id' => $account->id]) }}">Informasi Saldo</a></li>
                        <li><a href="{{ route('mutation', ['id' => $account->id]) }}">Mutasi Rekening</a></li>
                    </ul>
                </li>

                <li>
                    <a href="#" class="menu-item" onclick="toggleSubMenu('transfer')">Transfer Dana</a>
                    <ul class="sub-menu" id="transfer">
                        <li><a href="{{ route('accountList', ['id' => $account->id]) }}">Daftar Rekening Tujuan</a></li>     
                        <li><a href="{{ route('transfer', ['id' => $account->id]) }}">Transfer</a></li>
                    </ul> 
                </li>
                
                <li>
                    <a href="#" class="menu-item" onclick="toggleSubMenu('administration')">Administrasi</a>
                    <ul class="sub-menu" id="administration">
                        <li><a href="{{ route('changePin', ['id' => $account->id]) }}">Ganti PIN</a></li>
                        <li><a href="{{ route('changeEmail', ['id' => $account->id]) }}">Ubah Alamat Email</a></li>
                        <li><a href="{{ route('changePhone', ['id' => $account->id]) }}">Ubah Nomor Telepon</a></li>
                        <li><a href="{{ route('updateProfile', ['id' => $account->id]) }}">Pembaruan Data Diri</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="content">
            <h2>Informasi Rekening - Informasi Saldo</h2>
            <div class="table">
                <div class="column1">
                    <P class="row1">No Rekening</P>
                    <p class="row2">{{ $balanceInfo->accountNumber }}</p>
                </div>
                <div class="column2">
                    <P class="row1">Saldo Efektif</P>
                    <p class="row2">Rp{{ number_format($balanceInfo->balance, 0, ',', '.') }}</p>   
                </div>
            </div>
        </div>
        
    </div>

    <div class="footer">
        <p>Copyright &#169 2024 Bank Sejahtera (Persero) tbk</p>
    </div>

    <script>
        function toggleSubMenu(id) {
            var subMenu = document.getElementById(id);
            if (subMenu.style.display === "block") {
                subMenu.style.display = "none";
            } else {
                subMenu.style.display = "block";
            }
        }
    </script>
</body>
</html>


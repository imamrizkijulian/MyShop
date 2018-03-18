<nav class="navbar-default navbar-static-side" role="navigation">
            <!-- sidebar-collapse -->
            <div class="sidebar-collapse">
                <!-- side-menu -->
                <ul class="nav" id="side-menu">
                    <li>
                        <!-- user image section-->
                        <div class="user-section">
                            <div class="user-section-inner">
                                <img src="{{ url('siminta/assets/img/user.jpg') }}" alt="">
                            </div>
                            <div class="user-info">
                                <div><strong>{{ Auth::user()->name }}</strong></div>
                                <div class="user-text-online">
                                    <span class="user-circle-online btn btn-success btn-circle "></span>&nbsp;Online
                                </div>
                            </div>
                        </div>
                        <!--end user image section-->
                    </li>
                    <li class="btn btn-primary">
                        <!-- sidebar section-->
                        <div class="sidebar-brand">
                            <center><strong>SIDEBAR MENU</strong></center>
                        </div>
                        <!--end sidebar section-->
                    </li>
                    <li>
                        <a href="{{ url('simintatemp') }}"><i class="fa fa-dashboard fa-fw"></i>  Dashboard</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i>  Transaksi<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{ route('transaksi.index') }}">Trx Penjualan</a>
                            </li>
                            <li>
                                <a href="{{ route('trxbeli.index') }}">Trx Pembelian</a>
                            </li>
                        </ul>
                        <!-- second-level-items -->
                    </li>
                     <li>
                        <a href="{{ route('barang.index')}}"><i class="fa fa-list fa-fw"></i>  Barang</a>
                    </li>
                    <li>
                        <a href="{{ route('suplier.index')}}"><i class="fa fa-users fa-fw"></i>  Supplier</a>
                    </li>
                    @role('admin')
                    <li>
                        <a href="#"><i class="fa fa-file fa-fw"></i>  Laporan Transaksi<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{ url('/admin/laporan/penjualan')}}">Trx Penjualan</a>
                            </li>
                            <li>
                                <a href="{{ url('/admin/laporan2/pembelian')}}">Trx Pembelian</a>
                            </li>
                        </ul>
                        <!-- second-level-items -->
                    </li>
                    <li>
                        <a href="{{ route('petugas.index')}}"><i class="fa fa-user fa-fw"></i>  Daftar Pegawai</a>
                    </li>
                    @endrole
                <!-- end side-menu -->
            </div>
            <!-- end sidebar-collapse -->
        </nav>
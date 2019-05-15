		<div id="sidebar-nav" class="sidebar">
			<div class="sidebar-scroll">
				<nav>
					<ul class="nav">
					<li><a href="index.html" class="active"><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>

				    @if(auth()->user()->role == 'admin')
					<li><a href="{{ route('menu.index') }}" class=""><i class="lnr lnr-code"></i> <span>MENU  </span></a></li>
						
					<li><a href="{{ route('pelanggan.index') }}" class=""><i class="lnr lnr-code"></i> <span>PELANGGAN  </span></a></li>

					<li><a href="{{ route('meja.index') }}" class=""><i class="lnr lnr-code"></i> <span>MEJA  </span></a></li>
					@endif



					@if(auth()->user()->role == 'waiter')		
					<li><a href="{{ route('menu.index') }}" class=""><i class="lnr lnr-code"></i> <span>MENU  </span></a></li>

					<li><a href="{{ route('pesanan.index') }}" class=""><i class="lnr lnr-code"></i> <span>PESANAN </span></a></li>

					
					@endif




					@if(auth()->user()->role =='kasir')									
					<li><a href="{{ route('pesanan.index') }}" class=""><i class="lnr lnr-code"></i> <span>PESANAN </span></a></li>

					<li><a href="{{ route('transaksi.index') }}" class=""><i class="lnr lnr-code"></i> <span>TRANSAKSI  </span></a></li>
					@endif
				

					@if(auth()->user()->role == 'owner')


					<li><a href="{{ route('transaksi.index') }}" class=""><i class="lnr lnr-code"></i> <span>TRANSAKSI  </span></a></li>
					@endif




					</ul>
				</nav>
			</div>
		</div>
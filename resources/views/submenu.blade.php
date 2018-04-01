	<div class="sidebar-nav navbar-collapse">

	    <ul class="nav" id="side-menu">

	        <li>
	            <a href="admin/loaiSP/danhsach">Linh kiện - Phụ kiện</a>
	        </li>
	        <li>
	            <a href="#"><i class="fa fa-cube fa-fw"></i> Loại sản phẩm <span class="fa arrow"></span></a>
	            <ul class="nav nav-second-level">
	                <li>
	                    <a href="admin/loaiSP/danhsach">Danh sách loại</a>
	                </li>
	                <li>
	                    <a href="admin/loaiSP/them">Thêm loại sản phẩm</a>
	                </li>
	            </ul>
	            <!-- /.nav-second-level -->
	        </li>
	        <li>
	            <a href="#"><i class="fa fa-cube fa-fw"></i> Sản Phẩm<span class="fa arrow"></span></a>
	            <ul class="nav nav-second-level">
	                <li>
	                    <a href="admin/sanpham/danhsach">Danh sách sản phẩm</a>
	                </li>
	                <li>
	                    <a href="admin/sanpham/them">Thêm sản phẩm</a>
	                </li>
	            </ul>
	            <!-- /.nav-second-level -->
	        </li>
	         <li>
	            <a href="#"><i class="fa fa-cube fa-fw"></i> Slide<span class="fa arrow"></span></a>
	            <ul class="nav nav-second-level">
	                <li>
	                    <a href="admin/slide/danhsach"">Danh sách slide</a>
	                </li>
	                <li>
	                    <a href="admin/slide/them"">Thêm slide</a>
	                </li>
	            </ul>
	            <!-- /.nav-second-level -->
	        </li>
	        <li>
	            <a href="#"><i class="fa fa-cube fa-fw"></i> News<span class="fa arrow"></span></a>
	            <ul class="nav nav-second-level">
	                <li>
	                    <a href="admin/news/danhsach">Danh sách News</a>
	                </li>
	                <li>
	                    <a href="admin/news/them">Thêm News</a>
	                </li>
	            </ul>
	            <!-- /.nav-second-level -->
	        </li>
	        <!--    <li>
	            <a href="#"><i class="fa fa-cube fa-fw"></i> Khách Hàng<span class="fa arrow"></span></a>
	            <ul class="nav nav-second-level">
	                <li>
	                    <a href="admin/khachhang/danhsach">Danh sách khách hàng</a>
	                </li>
	               
	            </ul>
	            /.nav-second-level -->
	      <!--   </li> --> 
	        <li>
	            <a href="#"><i class="fa fa-cube fa-fw"></i>Đơn hàng<span class="fa arrow"></span></a>
	            <ul class="nav nav-second-level">
	                <li>
	                    <a href="admin/hoadon/danhsach">Đơn hàng chờ xử lý</a>
	                </li>
	                 <li>
	                    <a href="admin/hoadon/hoadonduyet">Đơn hàng</a>
	                </li>
	                 <li>
	                    <a href="admin/hoadon/hoadonkhongduyet">Đơn hàng Không duyệt</a>
	                </li>
	                
	            </ul>
	            <!-- /.nav-second-level -->
	        </li>
	      @if(Auth::user()->quyen==1)
	      	<li>
	            <a href="#"><i class="fa fa-users fa-fw"></i> User<span class="fa arrow"></span></a>
	            <ul class="nav nav-second-level">
	                <li>
	                    <a href="admin/user/danhsach">Danh sách User</a>
	                </li>
	                <li>
	                    <a href="admin/user/them">Thêm User</a>
	                </li>
	            </ul>
	            <!-- /.nav-second-level -->
	        </li>
	       @endif
	    </ul>
	</div>
	<!-- /.sidebar-collapse -->
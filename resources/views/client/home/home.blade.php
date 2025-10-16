@extends('client.layouts.master')
@section('content')



	
	
	
	<script src='../ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js'/> <script> checkCtrl=false $(&#39;*&#39;).keydown(function(e){ if(e.keyCode==&#39;17&#39;){ checkCtrl=false  } }).keyup(function(ev){ if(ev.keyCode==&#39;17&#39;){ checkCtrl=false } }).keydown(function(event){ if(checkCtrl){ if(event.keyCode==&#39;85&#39;){ return false; } } }) </script>
	
<div id="fb-root"></div>

<div class="p-pageWrapper" id="top" >



<header class="p-header" id="header" >
	<div class="p-header-inner" >
		<div class="p-header-content">

			<div class="p-header-logo p-header-logo--image">
				<a href="index.html">
					<img src="css/styles/vipcorel.png"
						alt="VIPcorel.com - Thư viện mẫu thiết kế đồ họa CorelDRAW (CDR)."
						 />
				</a>
			</div>
			
			 <div class="search-header">
                <form action="https://vipcorel.com/google-search" method="post"
                      class="form-inline"
                      data-xf-init="quick-search">
                    <input type="text" class="input form-control" name="keywords" placeholder="Tìm kiếm" aria-label="Tìm kiếm" data-menu-autofocus="true" id="keywords" />
                    <input type="hidden" name="_xfToken" value="1758127904,e24985162e1ffbca7ea31396c69430cc" />
                    <input type="submit" class="nut-tk" value="Tìm kiếm">
                </form>
            </div>

		

			
			

			
		</div>
	</div>
</header>




	<div class="p-navSticky p-navSticky--primary" data-xf-init="sticky-header">
		
	<nav class="p-nav">
		<div class="p-nav-inner">
			<a class="p-nav-menuTrigger" data-xf-click="off-canvas" data-menu=".js-headerOffCanvasMenu" role="button" tabindex="0">
				<i aria-hidden="true"></i>
				<span class="p-nav-menuText">Menu</span>
			</a>

			<div class="p-nav-smallLogo">
				<a href="index.html">
					<img src="styles/vipcorel.png"
						alt="VIPcorel.com - Thư viện mẫu thiết kế đồ họa CorelDRAW (CDR)."
					 />
				</a>
			</div>

			<div class="p-nav-scroller hScroller" data-xf-init="h-scroller" data-auto-scroll=".p-navEl.is-selected">
				<div class="hScroller-scroll">
					<ul class="p-nav-list js-offCanvasNavSource">
					
						<li>
							
	<div class="p-navEl " data-has-children="true">
		

			
	
	
			
		
			<div class="menu menu--structural" data-menu="menu" aria-hidden="true">
				<div class="menu-content">
					
	

	

					
				</div>
			</div>
		
	</div>

						</li>
					
						<li>
							
	<div class="p-navEl " >
		

			
	
	<a href="{{route('home')}}"
		class="p-navEl-link "
		
		data-xf-key="2"
		data-nav-id="home">Trang chủ</a>


			

		
		
	</div>

						</li>
					
						<li>
							
	<div class="p-navEl is-selected" data-has-children="true">
		

			
	
	<a href="index.html"
		class="p-navEl-link p-navEl-link--splitMenu "
		
		
		data-nav-id="forums">Diễn đàn</a>


			<a data-xf-key="3"
				data-xf-click="menu"
				data-menu-pos-ref="< .p-navEl"
				class="p-navEl-splitTrigger"
				role="button"
				tabindex="0"
				aria-label="Toggle expanded"
				aria-expanded="false"
				aria-haspopup="true"></a>

		
		
			<div class="menu menu--structural" data-menu="menu" aria-hidden="true">
				<div class="menu-content">
					
						
	
	
	<a href="whats-new/posts/index.html"
		class="menu-linkRow u-indentDepth0 js-offCanvasCopy "
		
		
		data-nav-id="newPosts">Bài viết mới</a>

	

					
						
	
	
	<a href="search/index4009.html?type=post"
		class="menu-linkRow u-indentDepth0 js-offCanvasCopy "
		
		
		data-nav-id="searchForums">Tìm chủ đề</a>

	

					
				</div>
			</div>
		
	</div>

						</li>
					
						<li>
							
	<div class="p-navEl " data-has-children="true">
		

			
	
	<a href="whats-new/index.html"
		class="p-navEl-link p-navEl-link--splitMenu "
		
		
		data-nav-id="whatsNew">Có gì mới</a>


			<a data-xf-key="4"
				data-xf-click="menu"
				data-menu-pos-ref="< .p-navEl"
				class="p-navEl-splitTrigger"
				role="button"
				tabindex="0"
				aria-label="Toggle expanded"
				aria-expanded="false"
				aria-haspopup="true"></a>

		
		
			<div class="menu menu--structural" data-menu="menu" aria-hidden="true">
				<div class="menu-content">
					
						
	
	
	<a href="whats-new/posts/index.html"
		class="menu-linkRow u-indentDepth0 js-offCanvasCopy "
		 rel="nofollow"
		
		data-nav-id="whatsNewPosts">Bài viết mới</a>

	

					
						
	
	
	<a href="whats-new/profile-posts/index.html"
		class="menu-linkRow u-indentDepth0 js-offCanvasCopy "
		 rel="nofollow"
		
		data-nav-id="whatsNewProfilePosts">Bài mới trên hồ sơ</a>

	

					
						
	
	
	<a href="whats-new/latest-activity.html"
		class="menu-linkRow u-indentDepth0 js-offCanvasCopy "
		 rel="nofollow"
		
		data-nav-id="latestActivity">Hoạt động mới nhất</a>

	

					
				</div>
			</div>
		
	</div>

						</li>
					
						<li>
							
	<div class="p-navEl " data-has-children="true">
		

			
	
	<a href="members/index.html"
		class="p-navEl-link p-navEl-link--splitMenu "
		
		
		data-nav-id="members">Thành viên</a>


			<a data-xf-key="5"
				data-xf-click="menu"
				data-menu-pos-ref="< .p-navEl"
				class="p-navEl-splitTrigger"
				role="button"
				tabindex="0"
				aria-label="Toggle expanded"
				aria-expanded="false"
				aria-haspopup="true"></a>

		
		
			<div class="menu menu--structural" data-menu="menu" aria-hidden="true">
				<div class="menu-content">
					
						
	
	
	<a href="members/list/index.html"
		class="menu-linkRow u-indentDepth0 js-offCanvasCopy "
		
		
		data-nav-id="registeredMembers">Đăng ký</a>

	

					
						
	
	
	<a href="online/index.html"
		class="menu-linkRow u-indentDepth0 js-offCanvasCopy "
		
		
		data-nav-id="currentVisitors">Thành viên trực tuyến</a>

	

					
						
	
	
	<a href="whats-new/profile-posts/index.html"
		class="menu-linkRow u-indentDepth0 js-offCanvasCopy "
		 rel="nofollow"
		
		data-nav-id="newProfilePosts">Bài mới trên hồ sơ</a>

	

					
						
	
	
	<a href="search/indexf925.html?type=profile_post"
		class="menu-linkRow u-indentDepth0 js-offCanvasCopy "
		
		
		data-nav-id="searchProfilePosts">Tìm trong hồ sơ cá nhân</a>

	

					
				</div>
			</div>
		
	</div>

						</li>
					
					</ul>
				</div>
			</div>

			<div class="p-nav-opposite">
				  <div class="p-navgroup p-account">
        
        {{-- Nếu chưa đăng nhập --}}
        @guest
            <a href="{{ route('login.show') }}" 
               class="p-navgroup-link p-navgroup-link--textual p-navgroup-link--logIn">
                <span class="p-navgroup-linkText">Đăng nhập</span>
            </a>

            <a href="{{ route('register.perform') }}" 
               class="p-navgroup-link p-navgroup-link--textual p-navgroup-link--register">
                <span class="p-navgroup-linkText">Đăng ký</span>
            </a>
        @endguest

        {{-- Nếu đã đăng nhập --}}
        @auth
            <span class="p-navgroup-link p-navgroup-link--textual">
                Xin chào, {{ Auth::user()->name }}
            </span>

            <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                @csrf
                <button type="submit" 
                        class="p-navgroup-link p-navgroup-link--textual p-navgroup-link--logOut"
                        style="background:none; border:none; cursor:pointer;">
                    Đăng xuất
                </button>
            </form>
        @endauth

    </div>

				<div class="p-navgroup p-discovery">
					<a href="whats-new/index.html"
						class="p-navgroup-link p-navgroup-link--iconic p-navgroup-link--whatsnew"
						aria-label="Có gì mới?"
						title="Có gì mới?">
						<i aria-hidden="true"></i>
						<span class="p-navgroup-linkText">Có gì mới?</span>
					</a>

					
						<a href="search/index.html"
							class="p-navgroup-link p-navgroup-link--iconic p-navgroup-link--search"
							data-xf-click="menu"
							data-xf-key="/"
							aria-label="Tìm kiếm"
							aria-expanded="false"
							aria-haspopup="true"
							title="Tìm kiếm">
							<i aria-hidden="true"></i>
							<span class="p-navgroup-linkText">Tìm kiếm</span>
						</a>
						<div class="menu menu--structural menu--wide" data-menu="menu" aria-hidden="true">
							<form action="https://vipcorel.com/search/search" method="post"
								class="menu-content"
								data-xf-init="quick-search">

								<h3 class="menu-header">Tìm kiếm</h3>
								
								<div class="menu-row">
									
										<input type="text" class="input" name="keywords" placeholder="Tìm kiếm…" aria-label="Tìm kiếm" data-menu-autofocus="true" />
									
								</div>

								
								<div class="menu-row">
									<label class="iconic"><input type="checkbox"  name="c[title_only]" value="1" /><i aria-hidden="true"></i><span class="iconic-label">Chỉ tìm trong tiêu đề</span></label>

								</div>
								
								<div class="menu-row">
									<div class="inputGroup">
										<span class="inputGroup-text" id="ctrl_search_menu_by_member">Bởi:</span>
										<input type="text" class="input" name="c[users]" data-xf-init="auto-complete" placeholder="Thành viên" aria-labelledby="ctrl_search_menu_by_member" />
									</div>
								</div>
								<div class="menu-footer">
									<span class="menu-footer-controls">
										<div class="buttonGroup">
	<button type="submit" class="button--primary button button--icon button--icon--search"><span class="button-text">Tìm</span></button>
	<button type="submit" class="button--primary google-search-button button button--icon button--icon--fabfa-google" formaction="/google-search/" data-xf-init="tooltip" title="Search using Google" style="min-width: 40px;"><span class="button-text">
			<i class="fa--xf fab fa-google" aria-hidden="true"></i>
	</span></button>
</div>
										<a href="search/index.html" class="button"><span class="button-text">Tìm kiếm nâng cao…</span></a>
									</span>
								</div>

								<input type="hidden" name="_xfToken" value="1758127904,e24985162e1ffbca7ea31396c69430cc" />
							</form>
						</div>
					
				</div>
			</div>
		</div>
	</nav>

	</div>
	
	
		<div class="p-sectionLinks">
			<div class="p-sectionLinks-inner hScroller" data-xf-init="h-scroller">
				<div class="hScroller-scroll">
					<ul class="p-sectionLinks-list">
					
						<li>
							
	<div class="p-navEl " >
		

			
	
	<a href="whats-new/posts/index.html"
		class="p-navEl-link "
		
		data-xf-key="alt+1"
		data-nav-id="newPosts">Bài viết mới</a>


			

		
		
	</div>

						</li>
					
						<li>
							
	<div class="p-navEl " >
		

			
	
	<a href="search/index4009.html?type=post"
		class="p-navEl-link "
		
		data-xf-key="alt+2"
		data-nav-id="searchForums">Tìm chủ đề</a>


			

		
		
	</div>

						</li>
					
					</ul>
				</div>
			</div>
		</div>
	



<div class="offCanvasMenu offCanvasMenu--nav js-headerOffCanvasMenu" data-menu="menu" aria-hidden="true" data-ocm-builder="navigation">
	<div class="offCanvasMenu-backdrop" data-menu-close="true"></div>
	<div class="offCanvasMenu-content">
		<div class="offCanvasMenu-header">
			Menu
			<a class="offCanvasMenu-closer" data-menu-close="true" role="button" tabindex="0" aria-label="Đóng"></a>
		</div>
		
			<div class="p-offCanvasRegisterLink">
				<div class="offCanvasMenu-linkHolder">
					<a href="login/index.html" class="offCanvasMenu-link" data-xf-click="overlay" data-menu-close="true">
						Đăng nhập
					</a>
				</div>
				<hr class="offCanvasMenu-separator" />
				
					<div class="offCanvasMenu-linkHolder">
						<a href="register/index.html" class="offCanvasMenu-link" data-xf-click="overlay" data-menu-close="true">
							Đăng ký
						</a>
					</div>
					<hr class="offCanvasMenu-separator" />
				
			</div>
		
		<div class="js-offCanvasNavTarget"></div>
	</div>
</div>

<div class="p-body">
	<div class="p-body-inner">
		<!--XF:EXTRA_OUTPUT-->



		
	<noscript><div class="blockMessage blockMessage--important blockMessage--iconic u-noJsOnly">JavaScript is disabled. For a better experience, please enable JavaScript in your browser before proceeding.</div></noscript>

		
	<div class="blockMessage blockMessage--important blockMessage--iconic js-browserWarning" style="display: none">You are using an out of date browser. It  may not display this or other websites correctly.<br />You should upgrade or use an <a href="https://www.google.com/chrome/browser/" target="_blank">alternative browser</a>.</div>


		
			<div class="p-body-header">
			
				
					<div class="p-title ">
					
						
							<h1 class="p-title-value">VIPcorel.com - Thư viện mẫu thiết kế đồ họa CorelDRAW (CDR).</h1>
						
						
							<div class="p-title-pageAction">
	
		<a href="whats-new/posts/index.html" class="button button--icon button--icon--bolt"><span class="button-text">
			Bài viết mới
		</span></a>
	
	
</div>
						
					
					</div>
				

				
			
			</div>
		

		<div class="p-body-main p-body-main--withSidebar ">
			

			<div class="p-body-content">
				
				<div class="p-body-pageContent">








	
	
	
		
	
	
	


	
	
	
	
		
	
	
	


	
	

<marquee direction="left" style ="border:green 0px SOLID" scrollamount="3" align="baseline" width="100%" loop="10000" scrolldelay="60" behavior="scroll" onmouseover="this.stop()" onmouseout="this.start()"><span style="margin-left :50px"><font color="red">Download toàn bộ website chỉ với 150k/tháng đăng ký tài khoản VIP</font></span><span style="margin-left :50px"><font color="white">Forum cập nhật file mới hàng ngày</font></span><span style="margin-left :50px"><font color="green">đăng ký tài khoản vip 1 năm chỉ với 450k</font></span></marquee>





	



<div class="porta-forumlist-above-split porta-widgets-split">
	
</div>

	
	
	
	@foreach ($posts as $pot)
<div class="block">
		<div class="porta-articles-widget block-container">
			
			<ul class="block-body"  data-widget-id="17" data-widget-key="HOME" data-widget-definition="EWRporta_articles">
			
					<ul class="---meta listInline listInline--bullet contentRow-minor">
						<li>
		<li class="block-row porta-article-item">
		<article class="porta-article-container">
			<a href="{{route('detail')}}" class="v-grid">
				<div class="--figure">
					
						<div class="---thumb" style="background-image: url('{{Storage::url($pot->image)}}');background-size: cover;background-position: center center;">
							<img src="">
						</div>
					
				</div>
				<div class="--main">
					<h3 class="---title">
						
						{{$pot->title}}
					</h3>
					<div class="bbWrapper">{{$pot->content}}</div>
					<ul class="---meta listInline listInline--bullet contentRow-minor">
						<li>
							<i class="fa--xf far fa-user" aria-hidden="true"></i>
							<span class="username " dir="auto" itemprop="name" data-user-id="1" itemprop="name"><span class="username--staff username--moderator username--admin">vipcorel.com</span></span>
						</li>
						<li>
							<i class="fa--xf far fa-clock" aria-hidden="true"></i>
							<time  class="u-dt" dir="auto" datetime="2025-08-04T13:57:00+0700" data-time="1754290620" data-date-string="04/08/2025" data-time-string="13:57" title="04/08/2025 lúc 13:57" data-full-old-date="true">04/08/2025</time>
						</li>
						<li>2.200 Lượt xem</li>
						
					</ul>
				</div>
			</a>
		</article>
	</li>
			</ul>
		</div>
	</div>

	@endforeach

<div class="sectionMain" id="VNXF_Stats">
	<div class="blockbody">
		
		
		
			<div class="VNXF_Stats" style="width:100%; display: inline-block;">
				<div class="blocksubhead" align="left">
					<img src="{{asset('css/styles/VNXF/Statistics/comment.png')}}" border="0"><b>Bài viết mới</b>
				</div>
				
					<div class="rows bold" style="
    padding: 1px 0;
    border-top: 1px solid rgb(86 86 86);
">
	
						<div class="thumb" style="
    margin-left: 7px;
">
			
							<img src="favicon.ico" onError="this.onerror=null;this.src='styles/VNXF/Statistics/lastpost.gif';" align="absmiddle" border="0" style="width: 80%;">
						</div>
						<a class="PreviewTooltip" data-previewurl="/threads/market-festival-tinh-hoa-tay-bac-phu-tho.16679/preview" title="Posted by: vipcorel.com | Last post by: vipcorel.com | Replies: 0 | Views: 58 | Attachment: " href="threads/market-festival-tinh-hoa-tay-bac-phu-tho.16679/index.html">Market Festival tinh hoa Tây Bắc - Phú Thọ</a>
					</div>
			</div>
	  	
		
	  	
        <div style="clear:both"></div>
	</div>
</div>



	
	
		
	
	
	
		
	<div class="block">
		<div class="block-container">
			<div class="block-body">
				

	<div class="node node--id151 node--depth1 node--forum node--unread">
		<div class="node-body">
			<span class="node-icon" aria-hidden="true">
				<i class="fa--xf far fa-comments" aria-hidden="true"></i>
			</span>
			<div class="node-main js-nodeMain">
				

				
				<h3 class="node-title">
					<a href="forums/phan-mem-huong-dan.151/index.html" data-xf-init="element-tooltip" data-shortcut="node-description">PHẦN MỀM - HƯỚNG DẪN</a>
				</h3>
				

				<div class="node-meta">
					
						<div class="node-statsMeta">
							<dl class="pairs pairs--inline">
								<dt>Chủ đề</dt>
								<dd>32</dd>
							</dl>
							<dl class="pairs pairs--inline">
								<dt>Bài viết</dt>
								<dd>49</dd>
							</dl>
						</div>
					

					
				</div>

				

				
			</div>

			
				<div class="node-stats">
					<dl class="pairs pairs--rows">
						<dt>Chủ đề</dt>
						<dd>32</dd>
					</dl>
					<dl class="pairs pairs--rows">
						<dt>Bài viết</dt>
						<dd>49</dd>
					</dl>
				</div>
			

			<div class="node-extra">
				
					<div class="node-extra-icon">



<div class="threadThumbnailWrapper" id="thread-thumbnail-14790">
    
        
        
            
            
	
						
							<a href="members/duong-duc-duong.17369/index.html" class="avatar avatar--xs avatar--default avatar--default--dynamic" data-user-id="17369" data-xf-init="member-tooltip" style="background-color: #333399; color: #9f9fdf">
			<span class="avatar-u17369-s" role="img" aria-label="Dương Đức Dương">D</span> 
		</a>
						
					

            
    
</div>

</div>
					<div class="node-extra-row">
						
							<a href="threads/download-phan-mem-coreldraw-2023-full-vinh-vien.14790/%23post-16807.html" class="node-extra-title" title="Download phần mềm CorelDraw 2023 Full Vĩnh Viễn">Download phần mềm CorelDraw 2023 Full Vĩnh Viễn</a>
						
					</div>
					<div class="node-extra-row">
						<ul class="listInline listInline--bullet">
							<li><time  class="node-extra-date u-dt" dir="auto" datetime="2025-09-10T07:51:46+0700" data-time="1757465506" data-date-string="10/09/2025" data-time-string="07:51" title="10/09/2025 lúc 07:51">10/09/2025</time></li>
							
								<li class="node-extra-user"><a href="members/duong-duc-duong.17369/index.html" class="username " dir="auto" itemprop="name" data-user-id="17369" data-xf-init="member-tooltip">Dương Đức Dương</a></li>
							
						</ul>
					</div>
				
			</div>
		</div>
	</div>

	
		
	
	

	

			</div>
		</div>
	</div>


//  Phần cắt 	
	
	<div class="block block--category block--category127">
		<span class="u-anchorTarget" id="chu-de-tranh.127"></span>
		<div class="block-container">
			<h2 class="block-header">
				<a href="index.html#chu-de-tranh.127">CHỦ ĐỀ TRANH</a>
				
			</h2>
			<div class="block-body">
				
	
	
		
	
	
	
		
	
// căt 2

	

	<div class="node node--id8 node--depth2 node--forum node--read">
		<div class="node-body">
			<span class="node-icon" aria-hidden="true">
				<i class="fa--xf far fa-comments" aria-hidden="true"></i>
			</span>
			<div class="node-main js-nodeMain">
				

				
				<h3 class="node-title">
					<a href="forums/tranh-dong-luc-treo-tuong.8/index.html" data-xf-init="element-tooltip" data-shortcut="node-description">TRANH ĐỘNG LỰC TREO TƯỜNG</a>
				</h3>
				

				<div class="node-meta">
					
						<div class="node-statsMeta">
							<dl class="pairs pairs--inline">
								<dt>Chủ đề</dt>
								<dd>484</dd>
							</dl>
							<dl class="pairs pairs--inline">
								<dt>Bài viết</dt>
								<dd>486</dd>
							</dl>
						</div>
					

					
						
	
	

					
				</div>

				

				
			</div>

			
				<div class="node-stats">
					<dl class="pairs pairs--rows">
						<dt>Chủ đề</dt>
						<dd>484</dd>
					</dl>
					<dl class="pairs pairs--rows">
						<dt>Bài viết</dt>
						<dd>486</dd>
					</dl>
				</div>
			

			<div class="node-extra">
				
					<div class="node-extra-icon">



<div class="threadThumbnailWrapper" id="thread-thumbnail-7081">
    
        
        
            
            
	
						
							<a href="members/quang-cao-cuong-ngan.29696/index.html" class="avatar avatar--xs avatar--default avatar--default--dynamic" data-user-id="29696" data-xf-init="member-tooltip" style="background-color: #5233cc; color: #cbc2f0">
			<span class="avatar-u29696-s" role="img" aria-label="Quảng Cáo Cường Ngân">Q</span> 
		</a>
						
					

            
    
</div>

</div>
					<div class="node-extra-row">
						
							<a href="threads/tong-hop-tranh-treo-tuong-quan-tra-sua-file-pdf.7081/%23post-14403.html" class="node-extra-title" title="Tổng hợp tranh treo tường quán trà sữa file PDF">Tổng hợp tranh treo tường quán trà sữa file PDF</a>
						
					</div>
					<div class="node-extra-row">
						<ul class="listInline listInline--bullet">
							<li><time  class="node-extra-date u-dt" dir="auto" datetime="2024-11-30T11:54:10+0700" data-time="1732942450" data-date-string="30/11/2024" data-time-string="11:54" title="30/11/2024 lúc 11:54">30/11/2024</time></li>
							
								<li class="node-extra-user"><a href="members/quang-cao-cuong-ngan.29696/index.html" class="username " dir="auto" itemprop="name" data-user-id="29696" data-xf-init="member-tooltip">Quảng Cáo Cường Ngân</a></li>
							
						</ul>
					</div>
				
			</div>
		</div>
	</div>

	/// Hết

	
			</div>
		</div>
	</div>

	

	


<div class="porta-forumlist-below-split porta-widgets-split">
	
</div>














</div>
				
			</div>

			
				<div class="p-body-sidebar">
					
					
						<form action="https://vipcorel.com/members/" method="post" class="block"
				 data-widget-id="1" data-widget-key="member_wrapper_find_member" data-widget-definition="find_member"
			>
				
	<div class="block-container">
		<h3 class="block-minorHeader">Tìm thành viên</h3>
		<div class="block-body block-row">
			<input type="text" class="input" data-xf-init="auto-complete" data-single="true" name="username" data-autosubmit="true" maxlength="50" placeholder="Tên…" />
		</div>
	</div>

				<input type="hidden" name="_xfToken" value="1758127904,e24985162e1ffbca7ea31396c69430cc" />
				
			</form>
		

	<div class="block" data-widget-id="2" data-widget-key="member_wrapper_newest_members" data-widget-definition="newest_members">
		<div class="block-container">
			<h3 class="block-minorHeader">Thành viên mới</h3>
			<div class="block-body block-row">
				<ul class="listHeap">
					
							
						@isset($newestMembers)

                        @foreach($newestMembers as $newestMember)
                          <li>
							<a href="" class="avatar avatar--s avatar--default avatar--default--dynamic" data-user-id="42375" data-xf-init="member-tooltip" img="true" style="background-color: #cccc66; color: #606020">
			<span class="avatar-u42375-s" role="img" aria-label="HHT118">{{ strtoupper(substr($newestMember->name,0, 1))}}</span> 
		</a>
						</li>
						@endforeach
						@endisset
					
				</ul>
			</div>
		</div>
	</div>


	
	
	
	<div class="block">
		<div class="porta-articles-widget block-container">
			
			<ul class="block-body"  data-widget-id="17" data-widget-key="HOME" data-widget-definition="EWRporta_articles">

// cắt 3
				<li class="block-row porta-article-item">
		<article class="porta-article-container">
			<a href="threads/bang-ron-kinh-mung-dai-le-vu-lan-2025-file-corel.16632/index.html" class="v-grid">
				<div class="--figure">
					
						<div class="---thumb" style="background-image: url('css/data/attachments/29/29488-e196f004d7fd74207bbc807e316eca67.jpg');background-size: cover;background-position: center center;">
							<img src="data/attachments/29/29488-e196f004d7fd74207bbc807e316eca67.jpg">
						</div>
					
				</div>
				<div class="--main">
					<h3 class="---title">
						
						Băng rôn Kính mừng đại lễ Vu Lan 2025 file corel
					</h3>
					<div class="bbWrapper">Băng rôn Kính mừng đại lễ Vu Lan báo hiếu 2025 file coreldraw x7     Vu lan yêu thương cùng khắp biến ơn vạn loài     bông hồng cài áo cảm niệm vu lan     Download:   File corel x7: Google Drive...</div>
					<ul class="---meta listInline listInline--bullet contentRow-minor">
						<li>
							<i class="fa--xf far fa-user" aria-hidden="true"></i>
							<span class="username " dir="auto" itemprop="name" data-user-id="1" itemprop="name"><span class="username--staff username--moderator username--admin">vipcorel.com</span></span>
						</li>
						<li>
							<i class="fa--xf far fa-clock" aria-hidden="true"></i>
							<time  class="u-dt" dir="auto" datetime="2025-09-04T09:44:00+0700" data-time="1756953840" data-date-string="04/09/2025" data-time-string="09:44" title="04/09/2025 lúc 09:44" data-full-old-date="true">04/09/2025</time>
						</li>
						<li>838 Lượt xem</li>
						
					</ul>
				</div>
			</a>
		</article>
	</li>

// end cắt 3
			</ul>
		</div>
	</div>


	<div class="block" data-widget-id="7" data-widget-key="forum_overview_new_posts" data-widget-definition="new_posts">
		<div class="block-container">
			
				<h3 class="block-minorHeader">
					<a href="whats-new/posts/indexc806.html?skip=1" rel="nofollow">Bài mới nhất</a>
				</h3>
				<ul class="block-body">
					

// Cắt 4
							
						
							
						
						
							<li class="block-row">
								
	<div class="contentRow">
		<div class="contentRow-figure">


<div class="threadThumbnailWrapper" id="thread-thumbnail-16675">
    
        
        
            <a href="members/vipcorel-com.1/index.html" class="avatar avatar--xxs" data-user-id="1" data-xf-init="member-tooltip">
			<img src="data/avatars/s/0/17f94.jpg?1750068560"  alt="vipcorel.com" class="avatar-u1-s" width="48" height="48" loading="lazy" /> 
		</a>
            
        
    
</div>

</div>
		<div class="contentRow-main contentRow-main--close">
			
				<a href="threads/vector-gia-dinh-file-thiet-ke-corel.16675/%23post-16851.html">Vector gia đình file thiết kế corel</a>
			

			<div class="contentRow-minor contentRow-minor--hideLinks">
				<ul class="listInline listInline--bullet">
					<li>Mới nhất: vipcorel.com</li>
					<li><time  class="u-dt" dir="auto" datetime="2025-09-15T22:00:51+0700" data-time="1757948451" data-date-string="15/09/2025" data-time-string="22:00" title="15/09/2025 lúc 22:00">Lúc 22:00, Thứ hai </time></li>
				</ul>
			</div>
			<div class="contentRow-minor contentRow-minor--hideLinks">
				<a href="forums/vector-khac.122/index.html">VECTOR KHÁC</a>
			</div>
		</div>
	</div>

							</li>
						
					
				</ul>
			
		</div>
	</div>


	
	
// cắt 5


<div class="block" data-widget-id="9" data-widget-key="forum_overview_forum_statistics" data-widget-definition="forum_statistics">
	<div class="block-container">
		<h3 class="block-minorHeader">Thống kê diễn đàn</h3>
		<div class="block-body block-row">
			<dl class="pairs pairs--justified">
				<dt>Chủ đề</dt>
				<dd>16.651</dd>
			</dl>

			<dl class="pairs pairs--justified">
				<dt>Bài viết</dt>
				<dd>16.803</dd>
			</dl>

			<dl class="pairs pairs--justified">
				<dt>Thành viên</dt>
				<dd>10.042</dd>
			</dl>

			<dl class="pairs pairs--justified">
				<dt>Thành viên mới nhất</dt>
				<dd><a href="members/thaivanthinh-adv.42456/index.html" class="username " dir="auto" itemprop="name" data-user-id="42456" data-xf-init="member-tooltip">thaivanthinh.adv</a></dd>
			</dl>
		</div>
	</div>
</div>
					
					
				</div>
			
		</div>

		
		
	
		<ul class="p-breadcrumbs p-breadcrumbs--bottom"
			itemscope itemtype="https://schema.org/BreadcrumbList">
		
			

			
			
				
				
	<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
		<a href="whats-new/index.html" itemprop="item">
			<span itemprop="name">Có gì mới</span>
		</a>
		<meta itemprop="position" content="1" />
	</li>

			

			
			

		
		</ul>
	

		
	</div>
</div>


    
 

@endsection